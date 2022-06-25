<style>
    #chartkategori,
    #chartpendidikan,
    #chartusia,
    #chartpengetahuan {
        width: 100%;
        /* max-height: 300px; */
        height: 200px;
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
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <span class="navbar-brand mb-0 h1">
            <a href="" style="color: white">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                    <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
                  </svg>
            </a>
            Residential Survey</span>
        </div>
      </nav>
    <div class="container mt-3">
        <h2 class="text-center mt-3">Hasil Survey</h2>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Ringkasan</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Demografi Responden</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Skor Kriteria</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Relasi Kriteria-Responden</button>
          <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Rincian</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
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
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>V1</td>
                                        <td>Bangunan menyediakan kemudahan akses terhadap fasilitas publik
                                            (transportasi umum, pendidikan, rekreasi, tempat kerja, pusat
                                            perbelanjaan, olahraga, dll).</td>
                                        <td>5.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>V2</td>
                                        <td>Bangunan tidak merusak nilai budaya masyarakat/warga sekitar.</td>
                                        <td>5.00</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>V3</td>
                                        <td>Tertatanya alur keluar masuk kendaraan pada bangunan.</td>
                                        <td>5.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a role="tab" data-toggle="tab" href="#rincian"
                            class="btn btn-dark text-light">Lihat rincian...</a>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <div class="col-12 box2">
                                <div class="row">
                                    <div class="col-8 align-middle d-flex">
                                        <p class="align-self-center" style="font-size: 1.2rem">Jumlah Kriteria
                                        </p>
                                    </div>
                                    <div class="col-4 d-flex">
                                        <h1 style="font-size: 60px" class="align-self-center">5</h1>
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
                                        <h1 style="font-size: 60px" class="align-self-center">5</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 box2">
                                <h4>Skor Keseluruhan : </h4>
                                <p><span class="" style="font-size: 60px;color:green">5.00</span><span
                                        style="font-size: 1.5rem">/5</span></p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 box2">
                                <div class="row">
                                    <div class="col-3 d-flex">
                                        <h1 style="font-size: 60px" class="align-self-center">5</h1>
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
                                <div class="row">
                                    <div class="col-3 d-flex">
                                        <h1 style="font-size: 60px" class="align-self-center">5</h1>
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
                                    <div class="col-3 d-flex">
                                        <h1 style="font-size: 60px" class="align-self-center">5</h1>
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
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"><div class="container section">
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
        </div></div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
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
