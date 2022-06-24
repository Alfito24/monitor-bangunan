    let id = "{{ $id }}";
    console.log('id');

    am4core.useTheme(am4themes_animated);
    //Chart kategori
    var chart = am4core.create("chartdiv", am4charts.PieChart);
    var series = chart.series.push(new am4charts.PieSeries());
    series.dataFields.value = "total";
    series.dataFields.category = "kategori";

    // this creates initial animation
    series.hiddenState.properties.opacity = 1;
    series.hiddenState.properties.endAngle = -90;
    series.hiddenState.properties.startAngle = -90;

    chart.legend = new am4charts.Legend();
    chart.dataSource.url = "http://127.0.0.1:8000/api/getdata/" + id;

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
