@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="float-left">
                                    <h4>Negocio: {{$local->titulo}} </h4>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <figure class="highcharts-figure">
                                    <div id="container"></div>
                                    {{-- <p class="highcharts-description">
                                        Clientes registrados por dia en los negocios.
                                    </p> --}}
                                </figure>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <figure class="highcharts-figure">
                                    <div id="container23"></div>
                                    {{-- <p class="highcharts-description">
                                        Clientes registrados por dia en los negocios.
                                    </p> --}}
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        // Create the chart
        Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Clics en WHATASAPP por mes en 2022'
            },
            subtitle: {
                text: 'Local: {{$local->titulo}}'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total clics en el mes'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> clientes<br/>'
            },

            series: [{
                name: "Mes",
                colorByPoint: true,
                data: [
                    @foreach ($userXmes as $um)
                        {
                        name: "{{ $um->mes }}",
                        y: {{ $um->total }},
                        drilldown: "{{ $um->mes }}"
                        },
                    @endforeach
                    // {
                    //     name: "Chrome",
                    //     y: 62.74,
                    //     drilldown: "Chrome"
                    // },
                    
                ]
            }],
            drilldown: {
                breadcrumbs: {
                    position: {
                        align: 'right'
                    }
                },
                series: [
                        @foreach ($xdia as $item)
                            {
                                name: "{{$item['mes']}}",
                                id: "{{$item['mes']}}",
                                data: [
                                    @foreach ($item['dias'] as $dias)
                                        [
                                            "{{$dias->dia}}",
                                            {{$dias->total}}
                                        ],
                                    @endforeach

                                    // [
                                    //     "v64.0",
                                    //     1.3
                                    // ],

                                ]
                            },
                        @endforeach
                            // {
                            //     name: "Firefox",
                            //     id: "Firefox",
                            //     data: [
                            //         [
                            //             "v58.0",
                            //             1.02
                            //         ],
                            //         [
                            //             "v57.0",
                            //             7.36
                            //         ],
                            //     ]
                            // },

                        ]
            }
        });

        Highcharts.chart('container23', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Clics en WHATASAPP por mes en 2023'
            },
            subtitle: {
                text: 'Local: {{$local->titulo}}'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                type: 'category'
            },
            yAxis: {
                title: {
                    text: 'Total clics en el mes'
                }

            },
            legend: {
                enabled: false
            },
            plotOptions: {
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f}'
                    }
                }
            },

            tooltip: {
                headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
                pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.0f}</b> clientes<br/>'
            },

            series: [{
                name: "Mes",
                colorByPoint: true,
                data: [
                    @foreach ($userXmes2 as $um)
                        {
                        name: "{{ $um->mes }}",
                        y: {{ $um->total }},
                        drilldown: "{{ $um->mes }}"
                        },
                    @endforeach
                    // {
                    //     name: "Chrome",
                    //     y: 62.74,
                    //     drilldown: "Chrome"
                    // },
                    
                ]
            }],
            drilldown: {
                breadcrumbs: {
                    position: {
                        align: 'right'
                    }
                },
                series: [
                        @foreach ($xdia2 as $item)
                            {
                                name: "{{$item['mes']}}",
                                id: "{{$item['mes']}}",
                                data: [
                                    @foreach ($item['dias'] as $dias)
                                        [
                                            "{{$dias->dia}}",
                                            {{$dias->total}}
                                        ],
                                    @endforeach

                                    // [
                                    //     "v64.0",
                                    //     1.3
                                    // ],

                                ]
                            },
                        @endforeach
                            // {
                            //     name: "Firefox",
                            //     id: "Firefox",
                            //     data: [
                            //         [
                            //             "v58.0",
                            //             1.02
                            //         ],
                            //         [
                            //             "v57.0",
                            //             7.36
                            //         ],
                            //     ]
                            // },

                        ]
            }
        });
    </script>
@endsection
