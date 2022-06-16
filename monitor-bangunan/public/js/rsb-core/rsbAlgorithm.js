function rsbAlgorithm(dataset) {
	//calculate eigenvector
	let G = new window.lib.graph()

	dataset.criterias.map(criteria => G.add_node(criteria.id))
	dataset.respondents.map(respondent => {
		G.add_node(respondent.id)
		return respondent.responses.map(criteria => G.add_edge(respondent.id, criteria.criteriaId))
	})

	const eigenvectorResuts = window.lib.eigenvector_centrality(G)


	// calculate weight
	let tempTotal = 0

	dataset.criterias.map(criteria => tempTotal += eigenvectorResuts[criteria.id])
	dataset.criterias.map(criteria => criteria.weight = eigenvectorResuts[criteria.id] / tempTotal)

	tempTotal = 0
	dataset.respondents.map(respondent => tempTotal += eigenvectorResuts[respondent.id])
	dataset.respondents.map(respondent => respondent.weight = eigenvectorResuts[respondent.id] / tempTotal)

	let results = []
	let criteriaWeightMatrix = []
	dataset.criterias.map(criteria => {
		criteriaWeightMatrix.push(criteria.weight || 0)
		results[criteria.id] = {
			gap: null,
			expectationTotal: null,
			expectationDetail: [null, null, null, null, null], //likert 5 scale
			realityTotal: null,
			realityDetail: [null, null, null, null, null] //likert 5 scale
		}
	})

	// sum weight based on their likert val
	dataset.respondents.map(respondent =>
		respondent.responses.map(response => {
			results[response.criteriaId].expectationDetail[response.expectation - 1] += respondent.weight
			results[response.criteriaId].realityDetail[response.reality - 1] += respondent.weight
		})
	)

	// normalisasi and total calc
	let criteriaExpectationMatrix = []
	let criteriaRealityMatrix = []

	for (let criteriaId in results) {
		const expectationTotal = results[criteriaId].expectationDetail.reduce((a, b) => a + b, 0)
		const realityTotal = results[criteriaId].realityDetail.reduce((a, b) => a + b, 0)

		results[criteriaId].expectationDetail.map((v, i) => results[criteriaId].expectationDetail[i] = v === null ? 0 : v / expectationTotal)
		results[criteriaId].realityDetail.map((v, i) => results[criteriaId].realityDetail[i] = v === null ? 0 : v / realityTotal)

		criteriaExpectationMatrix.push(results[criteriaId].expectationDetail)
		criteriaRealityMatrix.push(results[criteriaId].realityDetail)

		results[criteriaId].expectationTotal = window.lib.multiply(results[criteriaId].expectationDetail, [1, 2, 3, 4, 5]) // calc total score = detail * likert 5
		results[criteriaId].realityTotal = window.lib.multiply(results[criteriaId].realityDetail, [1, 2, 3, 4, 5]) // calc total score = detail * likert 5

		results[criteriaId].gap = results[criteriaId].expectationTotal - results[criteriaId].realityTotal
	}


	// save criteria score
	dataset.criterias.map(criteria => criteria.score = results[criteria.id])


	// survey's score calculation
	dataset.score = {
		expectationDetail: window.lib.multiply(criteriaWeightMatrix, criteriaExpectationMatrix),
		realityDetail: window.lib.multiply(criteriaWeightMatrix, criteriaRealityMatrix)
	}

	dataset.score.expectationTotal = window.lib.multiply(dataset.score.expectationDetail, [1, 2, 3, 4, 5])
	dataset.score.realityTotal = window.lib.multiply(dataset.score.realityDetail, [1, 2, 3, 4, 5])
	dataset.score.gap = dataset.score.expectationTotal - dataset.score.realityTotal

	return dataset
}