<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div id="networkGraphChart" style="border: 1px; width: 100%; height: 75vh; font-family: monospace"></div>

	<script src="//cdn.amcharts.com/lib/4/core.js"></script>
	<script src="//cdn.amcharts.com/lib/4/charts.js"></script>
	<script src="//cdn.amcharts.com/lib/4/plugins/forceDirected.js"></script>

	<script>
		const networkGraphDataFormat = RSBScoreJSON => {

			const getColor = (gap) => {
				let color = '#9e9e9e'

				if (gap > 0) {
					color = '#ff1744'
				} else if (gap < 0) {
					color = '#26a69a'
				}

				return color
			}

			let data = []

			RSBScoreJSON.criterias.map(criteria => {
				let lineIndex = 0;
				let text = ''
				const score = criteria.score && criteria.score.expectationTotal ? 5 - criteria.score.gap : 0

				for (let i = 0; i < criteria.isiVariabel.length; i++) {

					if (lineIndex > 20 && criteria.isiVariabel.charAt(i) === ' ') {
						text += '\n'
						lineIndex = 0
					} else {
						text += criteria.isiVariabel.charAt(i)
					}

					lineIndex++
				}

				return data.push({
					id: criteria.id,
					name: criteria.id,
					text: text + '\n\nSkor: [bold]' + (score ? score.toFixed(2) : '-') + '[/]',
					impact: criteria.weight * criteria.score.gap * (criteria.score.gap < 0 ? -1 : 1),
					impactPure: criteria.weight * criteria.score.gap,
					color: getColor(criteria.score.gap),
					childrens: [],

					//for ranking
					gap: criteria.score.gap,
					weight: criteria.weight,
				})
			})


			data.sort((a, b) => (a.impactPure < b.impactPure) ? 1 : ((b.impactPure < a.impactPure) ? -1 : 0))
			data.map((d, i) => {
				d.rank = i + 1
				return d.text = '[bold]#' + d.rank + '[/]\n\n' + d.text
			})

			// #b2102f
			// #ff1744
			// #ff4569

			// #2a3eb1
			// #3d5afe
			// #637bfe

			// #1a746b
			// #26a69a
			// #51b7ae

			// #9e9e9e

			RSBScoreJSON.respondents.map(respondent => {

				let lineIndex = 0;
				let role = ''

				// ROLE IS UNDEFINED

				// for (var i = 0; i < respondent.role.length; i++) {

				// 	if (lineIndex > 20 && respondent.role.charAt(i) === ' ') {
				// 		role += '\n'
				// 		lineIndex = 0
				// 	} else {
				// 		role += respondent.role.charAt(i)
				// 	}

				// 	lineIndex++
				// }

				return respondent.responses.map(res => {

					const text = 'Ekspektasi: [bold]' + res.expectation + '[/]\nRealita: [bold]' + res.reality + '[/]';

					const temp = data.find(d => d.id === res.criteriaId);

					return temp ? data.find(d => d.id === res.criteriaId).childrens.push({
						text: respondent.id + '\n\n' + text,
						name: respondent.id,
						color: res.expectation === res.reality ? '#9e9e9e' : res.expectation > res.reality ? '#ff1744' : '#26a69a'
					}) : 0
				})
			})

			return data
		}

		const chartxx = (chartId) => {
			const chart = am4core.create(chartId, am4plugins_forceDirected.ForceDirectedTree);
			// chart.strokeWidth=1
			// chart.background.fiil='#AAA'
			// chart.background.opacity = 0.5
			chart.zoomable = true
			// chart.legend = new am4charts.Legend();

			const series = chart.series.push(new am4plugins_forceDirected.ForceDirectedSeries());

			// series.data = data

			// Set up data fields
			series.dataFields.value = "impact";
			series.dataFields.name = "name";
			// series.dataFields.hiddenInLegend = false
			series.dataFields.id = "name";
			series.dataFields.children = "childrens";
			series.minRadius = 15;
			series.maxRadius = 50;
			series.dataFields.color = "color"
			series.centerStrength = 1;
			series.maxLevels = 1;




			// Add labels
			let nodeTemplate = series.nodes.template;
			nodeTemplate.label.text = "{name}";
			nodeTemplate.tooltipText = "{text}";

			return chart
		}

		const chart = chartxx("networkGraphChart");
		chart.data = networkGraphDataFormat(<?= $rsb_score ?>)
	</script>
</body>

</html>