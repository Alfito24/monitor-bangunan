<style>
    #chartdiv {
        width: 100%;
        max-height: 600px;
        height: 100vh;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="chartdiv"></div>
    {{-- <script src="../../../core.js"></script>
    <script src="../../../charts.js"></script>
    <script src="../../../themes/animated.js"></script>
    <script src="index.js"></script> --}}
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

</body>


{{-- <script src="../../index.js"></script>
<script src="../../percent.js"></script> --}}
<script>
    am4core.useTheme(am4themes_animated);

    var chart = am4core.create("chartdiv", am4charts.PieChart);


    // chart.data = [{
    //     "country": "Lithuania",
    //     "litres": 501.9
    // }, {
    //     "country": "Czech Republic",
    //     "litres": 301.9
    // }, {
    //     "country": "Ireland",
    //     "litres": 201.1
    // }, {
    //     "country": "Germany",
    //     "litres": 165.8
    // }, {
    //     "country": "Australia",
    //     "litres": 139.9
    // }, {
    //     "country": "Austria",
    //     "litres": 128.3
    // }, {
    //     "country": "UK",
    //     "litres": 99
    // }, {
    //     "country": "Belgium",
    //     "litres": 60
    // }, {
    //     "country": "The Netherlands",
    //     "litres": 50
    // }];

    var series = chart.series.push(new am4charts.PieSeries());
    series.dataFields.value = "total";
    series.dataFields.category = "kategori";

    // this creates initial animation
    series.hiddenState.properties.opacity = 1;
    series.hiddenState.properties.endAngle = -90;
    series.hiddenState.properties.startAngle = -90;


    let id = "{{ $id }}";
    console.log('id');

    chart.legend = new am4charts.Legend();
    chart.dataSource.url = "http://127.0.0.1:8000/api/getdata/" + id;
</script>

</html>
