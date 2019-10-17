<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultados</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Chart.min.css') }}">
</head>
<body>
    {{-- Cabecera --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Resultados</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li> --}}
            </ul>
            {{-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form> --}}
        </div>
    </nav>

    {{-- Contenedor --}}
    <div class="container text-center">
        <hr>
        <h1>Elecciones Generales 2019</h1>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="width: 100%;">
                    <canvas id="presidente" width="100%" height="100%"></canvas>
                    <div class="card-body">
                        <h5 class="card-title">Presidente</h5>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style="width: 100%;">
                    <canvas id="uninominal" width="100%" height="100%"></canvas>
                    <div class="card-body">
                        <h5 class="card-title">Uninominales</h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <h2>Provincias</h2>
        <hr>
        <div class="row">
            @foreach($provincias as $provincia)
            <div class="col-sm-6">
                <div class="card" style="width: 100%;">
                    <canvas id="{{ $provincia->provincia.'p' }}" width="100%" height="100%"></canvas>
                    <div class="card-body">
                        <h5 class="card-title">{{ $provincia->provincia }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <hr>
        <h2>Municipios</h2>
        <hr>
        <div class="row">
            @foreach($municipios as $municipio)
            <div class="col-sm-6">
                <div class="card" style="width: 100%;">
                    <canvas id="{{ $municipio->municipio.'m' }}" width="100%" height="100%"></canvas>
                    <div class="card-body">
                        <h5 class="card-title">{{ $municipio->municipio }}</h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script>
        //Presidentes
        var ctx = document.getElementById('presidente');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'C.C.',
                    'F.P.V.',
                    'M.T.S.',
                    'U.C.S.',
                    'M.A.S.',
                    'B.D.N.',
                    'P.D.C.',
                    'M.N.R.',
                    'PAN-BOL',
                    'Nulos',
                    'Blancos'
                ],
                datasets: [{
                    label: 'Nro. de votos',
                    data: [
                        {{ $presidente->trcc }},
                        {{ $presidente->trfpv }},
                        {{ $presidente->trmts }},
                        {{ $presidente->trucs }},
                        {{ $presidente->trmas }},
                        {{ $presidente->trbdn }},
                        {{ $presidente->trpdc }},
                        {{ $presidente->trmnr }},
                        {{ $presidente->trpan }},
                        {{ $presidente->trnulo }},
                        {{ $presidente->trblan }},
                    ],
                    backgroundColor: [
                        '#EA5F36',
                        '#1B7C7A',
                        '#348B3D',
                        '#131518',
                        '#234C9B',
                        '#DA3932',
                        '#FEFFFF',
                        '#F286B7',
                        '#E13B34',
                        '#BBC7D8',
                        '#E6B332'
                    ],
                    borderColor: [
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                animation: {
                    onComplete: function () {
                        var ctx = this.chart.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                        ctx.fillStyle = "black";
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset)
                        {
                            for (var i = 0; i < dataset.data.length; i++) {
                                for(var key in dataset._meta)
                                {
                                    var model = dataset._meta[key].data[i]._model;
                                    ctx.fillText(dataset.data[i], model.x, model.y - 5);
                                }
                            }
                        });
                    }
                }
            },
        });

        // Uninominales
        var ctx = document.getElementById('uninominal');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'C.C.',
                    'F.P.V.',
                    'M.T.S.',
                    'U.C.S.',
                    'M.A.S.',
                    'B.D.N.',
                    'P.D.C.',
                    'M.N.R.',
                    'PAN-BOL',
                    'Nulos',
                    'Blancos'
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        {{ $circuns->trucc }},
                        {{ $circuns->trufpv }},
                        {{ $circuns->truucs }},
                        {{ $circuns->trumts }},
                        {{ $circuns->trumas }},
                        {{ $circuns->trubdn }},
                        {{ $circuns->trupdc }},
                        {{ $circuns->trumnr }},
                        {{ $circuns->trupan }},
                        {{ $circuns->trunulo }},
                        {{ $circuns->trublan }},
                    ],
                    backgroundColor: [
                        '#EA5F36',
                        '#1B7C7A',
                        '#348B3D',
                        '#131518',
                        '#234C9B',
                        '#DA3932',
                        '#FEFFFF',
                        '#F286B7',
                        '#E13B34',
                        '#BBC7D8',
                        '#E6B332'
                    ],
                    borderColor: [
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                animation: {
                    onComplete: function () {
                        var ctx = this.chart.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                        ctx.fillStyle = "black";
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset)
                        {
                            for (var i = 0; i < dataset.data.length; i++) {
                                for(var key in dataset._meta)
                                {
                                    var model = dataset._meta[key].data[i]._model;
                                    ctx.fillText(dataset.data[i], model.x, model.y - 5);
                                }
                            }
                        });
                    }
                }
            }
        });

        //Provincias
        @foreach($provincias as $provincia)
        var ctx = document.getElementById('{{ $provincia->provincia."p" }}');
        var myChart = new Chart(ctx , {
            type: 'bar',
            data: {
                labels: [
                    'C.C.',
                    'F.P.V.',
                    'M.T.S.',
                    'U.C.S.',
                    'M.A.S.',
                    'B.D.N.',
                    'P.D.C.',
                    'M.N.R.',
                    'PAN-BOL',
                    'Nulos',
                    'Blancos'
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        {{ $provincia->trcc }},
                        {{ $provincia->trfpv }},
                        {{ $provincia->trucs }},
                        {{ $provincia->trmts }},
                        {{ $provincia->trmas }},
                        {{ $provincia->trbdn }},
                        {{ $provincia->trpdc }},
                        {{ $provincia->trmnr }},
                        {{ $provincia->trpan }},
                        {{ $provincia->trnulo }},
                        {{ $provincia->trblan }},
                    ],
                    backgroundColor: [
                        '#EA5F36',
                        '#1B7C7A',
                        '#348B3D',
                        '#131518',
                        '#234C9B',
                        '#DA3932',
                        '#FEFFFF',
                        '#F286B7',
                        '#E13B34',
                        '#BBC7D8',
                        '#E6B332'
                    ],
                    borderColor: [
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                animation: {
                    onComplete: function () {
                        var ctx = this.chart.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                        ctx.fillStyle = "black";
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset)
                        {
                            for (var i = 0; i < dataset.data.length; i++) {
                                for(var key in dataset._meta)
                                {
                                    var model = dataset._meta[key].data[i]._model;
                                    ctx.fillText(dataset.data[i], model.x, model.y - 5);
                                }
                            }
                        });
                    }
                }
            }
        });
        @endforeach

        //Municipios
        @foreach($municipios as $municipio)
        var ctx = document.getElementById('{{ $municipio->municipio."m" }}');
        var myChart = new Chart(ctx , {
            type: 'bar',
            data: {
                labels: [
                    'C.C.',
                    'F.P.V.',
                    'M.T.S.',
                    'U.C.S.',
                    'M.A.S.',
                    'B.D.N.',
                    'P.D.C.',
                    'M.N.R.',
                    'PAN-BOL',
                    'Nulos',
                    'Blancos'
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        {{ $municipio->trcc }},
                        {{ $municipio->trfpv }},
                        {{ $municipio->trucs }},
                        {{ $municipio->trmts }},
                        {{ $municipio->trmas }},
                        {{ $municipio->trbdn }},
                        {{ $municipio->trpdc }},
                        {{ $municipio->trmnr }},
                        {{ $municipio->trpan }},
                        {{ $municipio->trnulo }},
                        {{ $municipio->trblan }},
                    ],
                    backgroundColor: [
                        '#EA5F36',
                        '#1B7C7A',
                        '#348B3D',
                        '#131518',
                        '#234C9B',
                        '#DA3932',
                        '#FEFFFF',
                        '#F286B7',
                        '#E13B34',
                        '#BBC7D8',
                        '#E6B332'
                    ],
                    borderColor: [
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                        '#ffffff',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                animation: {
                    onComplete: function () {
                        var ctx = this.chart.ctx;
                        ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontFamily, 'normal', Chart.defaults.global.defaultFontFamily);
                        ctx.fillStyle = "black";
                        ctx.textAlign = 'center';
                        ctx.textBaseline = 'bottom';

                        this.data.datasets.forEach(function (dataset)
                        {
                            for (var i = 0; i < dataset.data.length; i++) {
                                for(var key in dataset._meta)
                                {
                                    var model = dataset._meta[key].data[i]._model;
                                    ctx.fillText(dataset.data[i], model.x, model.y - 5);
                                }
                            }
                        });
                    }
                }
            }
        });
        @endforeach
    </script>
</body>
</html>