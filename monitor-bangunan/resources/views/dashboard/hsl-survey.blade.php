<style>
    #chartkategori,
    #chartpendidikan,
    #chartusia,
    #chartpengetahuan {
        width: 100%;
        /* max-height: 300px; */
        height: 200px;
    }

    .section {
        margin-top: 75px;
        margin-bottom: 75px;
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
    <div class="container section">
        <div class="row" style="margin-bottom: 120px;">
            <div class="col-md-6">
                <h4>Kategori</h4>
                <div id="chartkategori"></div>
            </div>
            <div class="col-md-6">
                <h4>Pendidikan</h4>
                <div id="chartpendidikan"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Usia</h4>
                <div id="chartusia"></div>
            </div>
            <div class="col-md-6">
                <h4>Pengetahuan</h4>
                <div id="chartpengetahuan"></div>
            </div>
        </div>
    </div>

    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

<script>
    let id = "{{ $id }}";
    console.log('id');

    am4core.useTheme(am4themes_animated);
    //Chart kategori
    var kategori = am4core.create("chartkategori", am4charts.PieChart);
    var series_kategori = kategori.series.push(new am4charts.PieSeries());
    series_kategori.dataFields.value = "total";
    series_kategori.dataFields.category = "kategori";

    // this creates initial animation
    series_kategori.hiddenState.properties.opacity = 1;
    series_kategori.hiddenState.properties.endAngle = -90;
    series_kategori.hiddenState.properties.startAngle = -90;

    kategori.legend = new am4charts.Legend();
    kategori.dataSource.url = "http://127.0.0.1:8000/api/getkategori/" + id;

    //Chart pendidikan
    var pend = am4core.create("chartpendidikan", am4charts.PieChart);
    var series_pend = pend.series.push(new am4charts.PieSeries());
    series_pend.dataFields.value = "total";
    series_pend.dataFields.category = "pendidikan";

    // this creates initial animation
    series_pend.hiddenState.properties.opacity = 1;
    series_pend.hiddenState.properties.endAngle = -90;
    series_pend.hiddenState.properties.startAngle = -90;

    pend.legend = new am4charts.Legend();
    pend.dataSource.url = "http://127.0.0.1:8000/api/getpendidikan/" + id;

    //Chart usia
    var usia = am4core.create("chartusia", am4charts.PieChart);
    var series_usia = usia.series.push(new am4charts.PieSeries());
    series_usia.dataFields.value = "total";
    series_usia.dataFields.category = "usia";

    // this creates initial animation
    series_usia.hiddenState.properties.opacity = 1;
    series_usia.hiddenState.properties.endAngle = -90;
    series_usia.hiddenState.properties.startAngle = -90;

    usia.legend = new am4charts.Legend();
    usia.dataSource.url = "http://127.0.0.1:8000/api/getusia/" + id;

    //Chart pengetahuan
    var pengetahuan = am4core.create("chartpengetahuan", am4charts.PieChart);
    var series_pengetahuan = pengetahuan.series.push(new am4charts.PieSeries());
    series_pengetahuan.dataFields.value = "total";
    series_pengetahuan.dataFields.category = "pengetahuan";

    // this creates initial animation
    series_pengetahuan.hiddenState.properties.opacity = 1;
    series_pengetahuan.hiddenState.properties.endAngle = -90;
    series_pengetahuan.hiddenState.properties.startAngle = -90;

    pengetahuan.legend = new am4charts.Legend();
    pengetahuan.dataSource.url = "http://127.0.0.1:8000/api/getpengetahuan/" + id;
</script>

</html>
