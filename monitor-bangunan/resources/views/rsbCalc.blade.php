<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <script src="/js/rsb-core/bundle.js"></script>
	<script src="/js/rsb-core/rsbAlgorithm.js"></script>
</head>

<body>
	<script>
		const dataset = <?= json_encode($dataset) ?>;
		console.log(dataset);

		const result = rsbAlgorithm(dataset)
		console.log(result);

		document.location.href=  "/rsbcalc/store/{{$surveyId}}/?result=" + JSON.stringify(result)
	</script>
</body>

</html>
