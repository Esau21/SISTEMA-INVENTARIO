@extends('layouts.theme.app')
@section('content')
<div>
    <div class="container mt-5">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div id="products">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div id="cotizaciones">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div id="sale">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div id="vsale">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div id="cate">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="card">
            <div class="row">
                <div class="col">
                    <div id="user">

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<?php
    $totalproductos = count($products);
    ?>


<script>
    Highcharts.chart('products', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'bar'
            },
            title: {
                text: `TOTAL DE PRODUCTOS EN EL SISTEMA: <?php echo $totalproductos; ?>`,
                align: 'center'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: <?php echo json_encode($products); ?>
            }]
        });
</script>


<?php
    $totalcotizaciones = count($cotizaciones);
?>

<script>
    Highcharts.chart('cotizaciones', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'SERVICIOS POR USUARIOS: <?php echo $totalcotizaciones; ?>',
                align: 'center'
            },
            subtitle: {
                text: 'SERVICIOS POR USUARIOS: <?php echo $totalcotizaciones; ?>',
                align: 'left'
            },
            xAxis: {
                title: {
                    text: null
                },
                gridLineWidth: 1,
                lineWidth: 0
            },
            yAxis: {
                min: 0,
                labels: {
                    overflow: 'justify'
                },
                gridLineWidth: 0
            },
            plotOptions: {
                bar: {
                    borderRadius: '50%',
                    dataLabels: {
                        enabled: true
                    },
                    groupPadding: 0.1
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Mano Obra',
                data: <?php echo json_encode($cotizaciones); ?>
            }]
        });
</script>

<?php
    $totalUsuariosVentas = count($sale);
    ?>

<script>
    Highcharts.chart('sale', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'VENTAS POR USUARIOS: <?php echo $totalUsuariosVentas; ?>',
                align: 'center'
            },
            subtitle: {
                text: 'Ventas por usuarios: <?php echo $totalUsuariosVentas; ?>',
                align: 'left'
            },
            xAxis: {
                title: {
                    text: null
                },
                gridLineWidth: 1,
                lineWidth: 0
            },
            yAxis: {
                min: 0,
                labels: {
                    overflow: 'justify'
                },
                gridLineWidth: 0
            },
            plotOptions: {
                bar: {
                    borderRadius: '50%',
                    dataLabels: {
                        enabled: true
                    },
                    groupPadding: 0.1
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -40,
                y: 80,
                floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Ventas',
                data: <?php echo json_encode($sale); ?>
            }]
        });
</script>


<?php
    $totalcate = count($cate);
    ?>

<script>
    // Data retrieved from https://olympics.com/en/olympic-games/beijing-2022/medals
        Highcharts.chart('cate', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Total de categorias del sistema: <?php echo $totalcate; ?>',
                align: 'center'
            },
            subtitle: {
                text: '3D donut in Highcharts',
                align: 'left'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Medals',
                data: <?php echo json_encode($cate); ?>
            }]
        });
</script>


<?php $totalvsale = count($vsale); ?>

<script>
    Highcharts.chart('vsale', {
            chart: {
                type: 'area',
                options3d: {
                    enabled: true,
                    alpha: 15,
                    beta: 30,
                    depth: 200
                }
            },
            title: {
                text: 'Total de ventas del sistema: <?php echo $totalvsale; ?>'
            },
            accessibility: {
                description: 'The chart is showing the shapes of three mountain ranges as three area line series laid out in 3D behind each other.',
                keyboardNavigation: {
                    seriesNavigation: {
                        mode: 'serialize'
                    }
                }
            },
            lang: {
                accessibility: {
                    axis: {
                        xAxisDescriptionPlural: 'The chart has 3 unlabelled X axes, one for each series.'
                    }
                }
            },
            yAxis: {
                title: {
                    text: 'Height Above Sea Level',
                    x: -40
                },
                labels: {
                    format: '{value:,.0f} MAMSL'
                },
                gridLineDashStyle: 'Dash'
            },
            xAxis: [{
                visible: false
            }, {
                visible: false
            }, {
                visible: false
            }],
            plotOptions: {
                area: {
                    depth: 100,
                    marker: {
                        enabled: false
                    },
                    states: {
                        inactive: {
                            enabled: false
                        }
                    }
                }
            },
            series: [{
                name: 'venta',
                lineColor: 'rgb(180,90,50)',
                color: 'rgb(200,110,50)',
                fillColor: 'rgb(200,110,50)',
                data: <?php echo json_encode($vsale); ?>
            }]
        });
</script>


<?php $totalu = count($user) ?>

<script>
    // Data retrieved from https://olympics.com/en/olympic-games/beijing-2022/medals
        Highcharts.chart('user', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45
                }
            },
            title: {
                text: 'Total de usuarios del sistema: <?php echo $totalu; ?>',
                align: 'center'
            },
            subtitle: {
                text: '3D donut in Highcharts',
                align: 'left'
            },
            plotOptions: {
                pie: {
                    innerSize: 100,
                    depth: 45
                }
            },
            series: [{
                name: 'Medals',
                data: <?php echo json_encode($user); ?>
            }]
        });
</script>
@endsection