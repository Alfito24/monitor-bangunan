<style>
    #chartkategori,
    #chartpendidikan,
    #chartusia,
    #chartpengetahuan {
        width: 100%;
        /* max-height: 300px; */
        height: 200px;
    }

    #chartdiv,
    #chartall {
        width: 100%;
        height: 500px;
    }

    .box2 {
        width: 90%;
        max-height: 130px;
        box-shadow: 10px 10px 5px -3px rgba(0, 0, 0, 0.24);
        -webkit-box-shadow: 10px 10px 5px -3px rgba(0, 0, 0, 0.24);
        -moz-box-shadow: 10px 10px 5px -3px rgba(0, 0, 0, 0.24);
    }

    .section {
        margin-top: 75px;
        margin-bottom: 75px;
    }

    .survey-seluruh {
        box-shadow: 0px 2px 5px 10px rgba(138, 138, 138, 0.19);
        -webkit-box-shadow: 0px 2px 5px 10px rgba(138, 138, 138, 0.19);
        -moz-box-shadow: 0px 2px 5px 10px rgba(138, 138, 138, 0.19);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">
                <a href="/dashboard/menu_utama/{{ Auth::user()->id }}" style="color: black">
            </a>
             Residential Survey</span>
        </div>
    </nav>
    <div class="container mt-3">
        <a href="/dashboard/menu_utama/{{ Auth::user()->id }}" class="btn btn-dark">Kembali ke Dashboard</a>
        <h2 class="text-center mt-3">Hasil Survey</h2>
        <div class="survey-seluruh mt-4">
            <h3 class="ms-5 mt-3">Skor Keseluruhan</h3>
            <div id="rsbGraphChart" style="border: 1px; width: 100%; height: 75vh; font-family: monospace"></div>
        </div>
    </div>
    <div class="container survey-seluruh">
        <nav class="mt-5">
            <div class="nav nav-tabs mt-3" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">Ringkasan</button>
                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Demografi
                Responden</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#criteria-graph"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Skor
                Kriteria</button>
                <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#network-graph"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Relasi
                Kriteria-Responden</button>
                <button class="nav-link" id="rincian" data-bs-toggle="tab" data-bs-target="#rincian"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Rincian</button>
            </div>
        </nav>
        <div class="tab-content mt-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-9">
                            <div class="box">
                                <div class="container mt-3">
                                    <h3 class="mb-3">Rekomendasi Prioritas</h3>
                                </div>
                                <table class="table table-kriteria mt-3">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="nomor">#</th>
                                            <th scope="col" class="simbol">Simbol</th>
                                            <th scope="col" class="kriteria">Kriteria</th>
                                            <th scope="col" class="skor">Skor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                        $indexrow = 1;
                                        @endphp
                                        @foreach ($criterias as $criteria)
                                        @if ($criteria->score->realityTotal != 0)
                                        <tr>
                                            <td scope="row">{{ $indexrow }}</td>
                                            <td>{{ $criteria->id }}</td>
                                            <td>{{ $criteria->isiVariabel }}</td>
                                            <td>{{ $criteria->score->realityTotal }}</td>
                                        </tr>
                                        @php
                                        $indexrow++;
                                        @endphp
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a role="tab" data-toggle="tab" href="#rincian" class="btn btn-dark text-light">Lihat
                                rincian...</a>
                            </div>
                            <div class="col-3">
                                <div class="row">
                                    <div class="col-12 box2">
                                        <div class="row">
                                            <div class="col-8 align-middle d-flex">
                                                <p class="align-self-center" style="font-size: 1.2rem">Jumlah Kriteria
                                                </p>
                                            </div>
                                            @php
                                            $jumlahkriteria = 0;
                                            @endphp
                                            @foreach ($criterias as $criteria)
                                            @if ($criteria->weight != 0)
                                            @php
                                            $jumlahkriteria++;
                                            @endphp
                                            @endif
                                            @endforeach
                                            <div class="col-4 d-flex">
                                                <h1 style="font-size: 60px" class="align-self-center">
                                                    {{ $jumlahkriteria }}</h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 box2">
                                            <div class="row">
                                                <div class="col-8 align-middle d-flex">
                                                    <p class="align-self-center" style="font-size: 1.2rem">Jumlah Responden
                                                    </p>
                                                </div>
                                                <div class="col-4 d-flex">
                                                    <h1 style="font-size: 60px" class="align-self-center">{{ $respondents }}
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-12 box2">
                                            <h4>Skor Keseluruhan : </h4>
                                            <p><span class=""
                                                style="font-size: 60px;color:green">{{ $score->realityTotal }}</span><span
                                                style="font-size: 1.5rem">/5</span></p>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-12 box2">
                                                <div class="row">
                                                    @php
                                                    $kriteriabawah = 0;
                                                    @endphp
                                                    @foreach ($criterias as $criteria)
                                                    @if ($criteria->score->gap > 0)
                                                    @php
                                                    $kriteriabawah++;
                                                    @endphp
                                                    @endif
                                                    @endforeach
                                                    <div class="col-3 d-flex">
                                                        <h1 style="font-size: 60px" class="align-self-center">
                                                            {{ $kriteriabawah }}
                                                        </h1>
                                                    </div>
                                                    <div class="col-9 align-middle d-flex">
                                                        <p class="align-self-center" style="font-size: 1.1rem">kriteria <span
                                                            style="color:red;font-weight:bold" class="fw-bold">belum
                                                            mencapai</span> ekspektasi responden</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-12 box2">
                                                    @php
                                                    $kriteriasama = 0;
                                                    @endphp
                                                    @foreach ($criterias as $criteria)
                                                    @if ($criteria->weight != 0)
                                                    @if ($criteria->score->gap = 0)
                                                    @php
                                                    $kriteriasama++;
                                                    @endphp
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                    <div class="row">
                                                        <div class="col-3 d-flex">
                                                            <h1 style="font-size: 60px" class="align-self-center">
                                                                {{ $kriteriasama }}
                                                            </h1>
                                                        </div>
                                                        <div class="col-9 align-middle d-flex">
                                                            <p class="align-self-center" style="font-size: 1.1rem">kriteria <span
                                                                style="font-weight:bold" class="fw-bold">sesuai dengan</span>
                                                                ekspektasi responden</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-12 box2">
                                                        <div class="row">
                                                            @php
                                                            $kriteriaup = 0;
                                                            @endphp
                                                            @foreach ($criterias as $criteria)
                                                            @if ($criteria->score->gap < 0)
                                                            @php
                                                            $kriteriaup++;
                                                            @endphp
                                                            @endif
                                                            @endforeach
                                                            <div class="col-3 d-flex">
                                                                <h1 style="font-size: 60px" class="align-self-center">{{ $kriteriaup }}
                                                                </h1>
                                                            </div>
                                                            <div class="col-9 align-middle d-flex">
                                                                <p class="align-self-center" style="font-size: 1.1rem">kriteria <span
                                                                    style="color:green;font-weight:bold"
                                                                    class="fw-bold">melebihi</span> ekspektasi responden</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
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
                                    </div>
                                    <div class="tab-pane fade" id="criteria-graph" role="tabpanel" aria-labelledby="nav-contact-tab">...
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div id="criteriaGraphChart"
                                                style="border: 1px; width: 100%; height: 75vh; font-family: monospace"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="network-graph" role="tabpanel" aria-labelledby="nav-contact-tab">...
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div id="networkGraphChart"
                                                style="border: 1px; width: 100%; height: 75vh; font-family: monospace"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="rincian" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="box">
                                                        <div class="container">
                                                            <a class="btn btn-primary text-light fw-bold">Cetak</a>
                                                        </div>
                                                        <table class="table table-kriteria mt-3">
                                                            <thead>
                                                                <tr>
                                                                    <th rowspan="2" scope="col" class="nomor">Rekomendasi
                                                                        Prioritas</th>
                                                                        <th scope="col" class="simbol">Simbol</th>
                                                                        <th scope="col" class="kriteria">Kriteria</th>
                                                                        <th colspan="3" class="skor">Responden</th>
                                                                        <th>Pengaruh Kriteria</th>
                                                                        <th>Skor Kriteria</th>
                                                                        <th>Kesesuaian Kriteria</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row"></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th>Simbol</th>
                                                                        <th>Ekspektasi</th>
                                                                        <th>Realita</th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                        <th></th>
                                                                    </tr>
                                                                    @foreach ($criterias as $criteria)
                                                                    @if ($criteria->weight != 0)
                                                                    <tr>
                                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                                        <td>{{ $criteria->id }}</td>
                                                                        <td>{{ $criteria->isiVariabel }}</td>

                                                                        @foreach ($respondents2 as $r)
                                                                        @foreach ($r->responses as $res)
                                                                        @if ($res->criteriaId == $criteria->id)
                                                                        <td>{{ $r->id }}</td>
                                                                        @endif
                                                                        @endforeach
                                                                        @endforeach

                                                                        @foreach ($respondents2 as $r)
                                                                        @foreach ($r->responses as $res)
                                                                        @if ($res->criteriaId == $criteria->id)
                                                                        <td>{{ $res->expectation }}</td>
                                                                        @endif
                                                                        @endforeach
                                                                        @endforeach

                                                                        @foreach ($respondents2 as $r)
                                                                        @foreach ($r->responses as $res)
                                                                        @if ($res->criteriaId == $criteria->id)
                                                                        <td>{{ $res->reality }}</td>
                                                                        @endif
                                                                        @endforeach
                                                                        @endforeach
                                                                        <td>{{ $criteria->weight * 100 }}%</td>
                                                                        <td>{{ $criteria->score->realityTotal * 10 }}%</td>
                                                                        <td>
                                                                            @if ($criteria->score->realityTotal >= $criteria->score->expectationTotal)
                                                                            Sesuai
                                                                            @else
                                                                            Tidak Sesuai
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                {{-- //script sumber amchart versi 4 --}}
                                <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
                                <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>

                                <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
                                integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
                            </script>
                            <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
                            <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
                            <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

                            {{-- //script source network graph --}}
                            <script src="//cdn.amcharts.com/lib/4/plugins/forceDirected.js"></script>
                        </body>

                        {{-- chart to skor keseluruhan --}}
                        {{-- <script>
                            var chartall = am4core.create("chartall", am4charts.XYChart);
                            chartall.dataSource.url = "http://127.0.0.1:8000/api/getskorkeseluruhan/";

                            var categoryAxis = chartall.xAxes.push(new am4charts.CategoryAxis());
                            categoryAxis.dataFields.category = "date";
                            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

                            //create series
                            var seriesall = chartall.series.push(new am4charts.LineSeries());
                            seriesall.dataFields.valueY = "score";
                            seriesall.dataFields.categoryX = "date";
                            seriesall.name = "Skors";
                            seriesall.strokeWidth = 3;
                            seriesall.tensionX = 0.7;
                            seriesall.bullets.push(new am4charts.CircleBullet());

                            seriesall.legend = new am4charts.Legend();
                        </script> --}}


                        <script> //scrpit untuk skor keseluruhan
                            const rsbGraphDataFormat = surveys =>{
                                const data = [{
                                    date: new Date(this.date),
                                    score: 0,
                                    bulletTooltip: 0
                                }]

                                surveys.slice(0).reverse().map(sur => {
                                    score_json = JSON.parse(sur.rsb_score);

                                    const score = score_json.score ? 5 - score_json.score.gap : 0

                                    return data.push({
                                        date: new Date(sur.tanggal_dibuat),
                                        score: score,
                                        bulletTooltip: score ? score.toFixed(2) : 0
                                    })
                                })

                                return data
                            }

                            const charty = (chartId) => {
                                const chart = am4core.create(chartId, am4charts.XYChart)
                                chart.legend = new am4charts.Legend();
                                chart.cursor = new am4charts.XYCursor();
                                chart.topAxesContainer.paddingTop = 30;


                                // Create axes
                                const dateAxis = chart.xAxes.push(new am4charts.DateAxis());
                                dateAxis.renderer.grid.template.location = 0.5;
                                dateAxis.tooltipDateFormat = "yyyy-MM-dd";
                                dateAxis.title.text = 'Survei'



                                /* Decorate axis tooltip content */
                                dateAxis.adapter.add("getTooltipText", (text, target) => {
                                    if (new Date(text).getTime() === chart.data[0].date.getTime()) {
                                        text += '\n\nAwal Proyek'
                                    }

                                    return text;
                                });




                                // Create series
                                const valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                                valueAxis.max = 9
                                valueAxis.min = 0
                                valueAxis.title.text= 'Skor'


                                const range2 = valueAxis.axisRanges.create();
                                range2.value = 5;
                                // range2.endValue = 10;
                                range2.grid.stroke = am4core.color("green");
                                range2.grid.strokeWidth = 2;
                                range2.grid.strokeOpacity = 0.2;
                                range2.label.inside = true;
                                range2.label.text = "Ekspektasi";
                                range2.label.fill = range2.grid.stroke;
                                range2.label.align = "center";


                                const series = chart.series.push(new am4charts.LineSeries());
                                series.dataFields.valueY = "score";
                                series.dataFields.dateX = "date";
                                series.name = 'Realita'
                                series.strokeWidth = 2;
                                // series.tooltipXField = "bulletTooltip"

                                const interfaceColors = new am4core.InterfaceColorSet();
                                const bullet = series.bullets.push(new am4charts.CircleBullet());
                                bullet.circle.stroke = interfaceColors.getFor("background");
                                bullet.fill = series.stroke
                                bullet.tooltipText = '{bulletTooltip}';

                                bullet.adapter.add("fill", function (fill, target) {
                                    return target.dataItem.valueY >= 5 ? am4core.color('green') : am4core.color('red');
                                })

                                return chart
                            };
                            const rsbchart = charty("rsbGraphChart");
                            rsbchart.data = rsbGraphDataFormat(<?= $surveys ?>);

                        </script>
                        <script>
                            //script untuk criteria graph
                            const criteriaGraphDataFormat = RSBScoreJSON => {

                                const data = RSBScoreJSON.criterias.map(cr => {
                                    let lineIndex = 0;
                                    let desc = ''

                                    for (var i = 0; i < cr.isiVariabel.length; i++) {

                                        if (lineIndex > 20 && cr.isiVariabel.charAt(i) === ' ') {
                                            desc += '\n'
                                            lineIndex = 0
                                        } else {
                                            desc += cr.isiVariabel.charAt(i)
                                        }

                                        lineIndex++
                                    }

                                    const score = (cr.score && cr.score.expectationTotal ? 5 - cr.score.gap : 0)

                                    return {
                                        symbol: cr.id,
                                        desc: desc,
                                        score: score,
                                        bulletTooltip: score.toFixed(2),
                                        // ...cr.score
                                    }
                                })

                                return data
                            }

                            const chartx = (chartId) => {
                                const chart = am4core.create(chartId, am4charts.XYChart)

                                // Create axes
                                const categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
                                categoryAxis.dataFields.category = "symbol";
                                categoryAxis.tooltipText = "{desc}"
                                categoryAxis.renderer.minGridDistance = 30;


                                const valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
                                valueAxis.max = 9
                                valueAxis.min = 0

                                var range2 = valueAxis.axisRanges.create();
                                range2.value = 5;
                                range2.grid.stroke = am4core.color("green");
                                range2.grid.strokeWidth = 2;
                                range2.grid.strokeOpacity = 0.2;
                                range2.label.inside = true;
                                range2.label.text = "Ekspektasi";
                                range2.label.fill = range2.grid.stroke;
                                range2.label.align = "center";


                                const GapSeries = chart.series.push(new am4charts.LineSeries());
                                GapSeries.dataFields.categoryX = "symbol";
                                GapSeries.dataFields.valueY = "score";
                                GapSeries.name = "Realita"
                                GapSeries.strokeWidth = 2;

                                const interfaceColors = new am4core.InterfaceColorSet();
                                const bullet = GapSeries.bullets.push(new am4charts.CircleBullet());
                                bullet.circle.stroke = interfaceColors.getFor("background");
                                bullet.fill = GapSeries.stroke
                                bullet.tooltipText = '{bulletTooltip}'

                                bullet.adapter.add("fill", function(fill, target) {
                                    return target.dataItem.valueY === 0 ? am4core.color('gray') : target.dataItem.valueY >= 5 ?
                                    am4core.color('green') : am4core.color('red');
                                })

                                chart.legend = new am4charts.Legend();
                                chart.cursor = new am4charts.XYCursor();

                                return chart
                            };
                            const criteriachart = chartx("criteriaGraphChart");
                            criteriachart.data = criteriaGraphDataFormat(<?= $rsb_score ?>);
                        </script>


                        <script>
                            //script untuk network graph
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

                                                    const text = 'Ekspektasi: [bold]' + res.expectation + '[/]\nRealita: [bold]' + res
                                                    .reality + '[/]';

                                                    const temp = data.find(d => d.id === res.criteriaId);

                                                    return temp ? data.find(d => d.id === res.criteriaId).childrens.push({
                                                        text: respondent.id + '\n\n' + text,
                                                        name: respondent.id,
                                                        color: res.expectation === res.reality ? '#9e9e9e' : res.expectation >
                                                        res.reality ? '#ff1744' : '#26a69a'
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
                                    //
                                    <script>
                                        //     am5.ready(function() {

                                            //         // Create root element
                                            //         // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                                            //         var root = am5.Root.new("chartdiv");

                                            //         // Set themes
                                            //         // https://www.amcharts.com/docs/v5/concepts/themes/
                                            //         root.setThemes([
                                            //             am5themes_Animated.new(root)
                                            //         ]);

                                            //         root.dateFormatter.setAll({
                                                //             dateFormat: "yyyy",
                                                //             dateFields: ["valueX"]
                                                //         });

                                                //         root.dataSource.url = "http://127.0.0.1:8000/api/getskorkeseluruhan/";

                                                //         // Create chart
                                                //         // https://www.amcharts.com/docs/v5/charts/xy-chart/
                                                //         var chart = root.container.children.push(
                                                //             am5xy.XYChart.new(root, {
                                                    //                 focusable: true,
                                                    //                 panX: true,
                                                    //                 panY: true,
                                                    //                 wheelX: "panX",
                                                    //                 wheelY: "zoomX",
                                                    //                 pinchZoomX: true
                                                    //             })
                                                    //         );

                                                    //         var easing = am5.ease.linear;

                                                    //         // Create axes
                                                    //         // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                                                    //         var xAxis = chart.xAxes.push(
                                                    //             am5xy.DateAxis.new(root, {
                                                        //                 maxDeviation: 0.5,
                                                        //                 groupData: false,
                                                        //                 baseInterval: {
                                                            //                     timeUnit: "day",
                                                            //                     count: 1
                                                            //                 },
                                                            //                 renderer: am5xy.AxisRendererX.new(root, {
                                                                //                     pan: "zoom",
                                                                //                     minGridDistance: 50
                                                                //                 }),
                                                                //                 tooltip: am5.Tooltip.new(root, {})
                                                                //             })
                                                                //         );

                                                                //         var yAxis = chart.yAxes.push(
                                                                //             am5xy.ValueAxis.new(root, {
                                                                    //                 maxDeviation: 1,
                                                                    //                 renderer: am5xy.AxisRendererY.new(root, {
                                                                        //                     pan: "zoom"
                                                                        //                 })
                                                                        //             })
                                                                        //         );

                                                                        //         // Add series
                                                                        //         // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                                                                        //         var series = chart.series.push(
                                                                        //             am5xy.LineSeries.new(root, {
                                                                            //                 minBulletDistance: 10,
                                                                            //                 xAxis: xAxis,
                                                                            //                 yAxis: yAxis,
                                                                            //                 valueYField: "rsb_score",
                                                                            //                 valueXField: "tanggal_dibuat",
                                                                            //                 tooltip: am5.Tooltip.new(root, {
                                                                                //                     pointerOrientation: "horizontal",
                                                                                //                     labelText: "{valueY}"
                                                                                //                 })
                                                                                //             })
                                                                                //         );

                                                                                //         // Set up data processor to parse string dates
                                                                                //         // https://www.amcharts.com/docs/v5/concepts/data/#Pre_processing_data
                                                                                //         series.data.processor = am5.DataProcessor.new(root, {
                                                                                    //             dateFormat: "yyyy-MM-dd",
                                                                                    //             dateFields: ["tanggal_dibuat"]
                                                                                    //         });

                                                                                    //         series.data.setAll(data);

                                                                                    //         series.bullets.push(function() {
                                                                                        //             var circle = am5.Circle.new(root, {
                                                                                            //                 radius: 4,
                                                                                            //                 fill: series.get("fill"),
                                                                                            //                 stroke: root.interfaceColors.get("background"),
                                                                                            //                 strokeWidth: 2
                                                                                            //             });

                                                                                            //             return am5.Bullet.new(root, {
                                                                                                //                 sprite: circle
                                                                                                //             });
                                                                                                //         });

                                                                                                //         createTrendLine(
                                                                                                //             [{
                                                                                                    //                     date: "2012-01-02",
                                                                                                    //                     value: 10
                                                                                                    //                 },
                                                                                                    //                 {
                                                                                                        //                     date: "2012-01-11",
                                                                                                        //                     value: 19
                                                                                                        //                 }
                                                                                                        //             ],
                                                                                                        //             root.interfaceColors.get("positive")
                                                                                                        //         );

                                                                                                        //         createTrendLine(
                                                                                                        //             [{
                                                                                                            //                     date: "2012-01-17",
                                                                                                            //                     value: 16
                                                                                                            //                 },
                                                                                                            //                 {
                                                                                                                //                     date: "2012-01-22",
                                                                                                                //                     value: 10
                                                                                                                //                 }
                                                                                                                //             ],
                                                                                                                //             root.interfaceColors.get("negative")
                                                                                                                //         );

                                                                                                                //         function createTrendLine(data, color) {
                                                                                                                    //             var series = chart.series.push(
                                                                                                                    //                 am5xy.LineSeries.new(root, {
                                                                                                                        //                     xAxis: xAxis,
                                                                                                                        //                     yAxis: yAxis,
                                                                                                                        //                     valueXField: "tanggal_dibuat",
                                                                                                                        //                     stroke: color,
                                                                                                                        //                     valueYField: "rsb_score"
                                                                                                                        //                 })
                                                                                                                        //             );

                                                                                                                        //             series.data.processor = am5.DataProcessor.new(root, {
                                                                                                                            //                 dateFormat: "yyyy-MM-dd",
                                                                                                                            //                 dateFields: ["tanggal_dibuat"]
                                                                                                                            //             });

                                                                                                                            //             series.data.setAll(data);
                                                                                                                            //             series.appear(1000, 100);
                                                                                                                            //         }

                                                                                                                            //         // Add cursor
                                                                                                                            //         // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                                                                                                                            //         var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                                                                                                                                //             xAxis: xAxis
                                                                                                                                //         }));
                                                                                                                                //         cursor.lineY.set("visible", false);

                                                                                                                                //         // add scrollbar
                                                                                                                                //         chart.set("scrollbarX", am5.Scrollbar.new(root, {
                                                                                                                                    //             orientation: "horizontal"
                                                                                                                                    //         }));

                                                                                                                                    //         // Make stuff animate on load
                                                                                                                                    //         // https://www.amcharts.com/docs/v5/concepts/animations/
                                                                                                                                    //         series.appear(1000, 100);
                                                                                                                                    //         chart.appear(1000, 100);

                                                                                                                                    //     }); // end am5.ready()
                                                                                                                                    //
                                                                                                                                </script>

                                                                                                                                </html>
