<!--
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Dark Style</title>

    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    />
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat"
        rel="stylesheet"
    />

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="assets/styles.css" />
</head>

<body>
<div id="wrapper">
    <div class="content-area">
        <div class="container-fluid">
            <div class="text-right mt-3 mb-3 d-fixed">
                <a
                    href="https://github.com/apexcharts/apexcharts.js/tree/master/samples/vanilla-js/dashboards/dark"
                    target="_blank"
                    class="btn btn-outline-warning mr-2"
                >
                    <span class="btn-text">View Code</span>
                </a>
            </div>
            <div class="main">
                <div class="row sparkboxes mt-4">
             =
                    <div class="col-md-3">
                        <div class="box box4">
                            <div class="details">
                                <h3>22</h3>
                                <h4>SALES</h4>
                            </div>
                            <div id="spark4"></div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<style>

    body {
        background: #343E59;
        color: #777;
        font-family: Montserrat, Arial, sans-serif;
    }

    .body-bg {
        background: #F3F4FA !important;
    }

    h1, h2, h3, h4, h5, h6, strong {
        font-weight: 600;
    }

    body {
        /*background: linear-gradient(45deg,#3a3a60,#5f5f8e);
        min-height: 100vh;*/
    }

    .content-area {
        max-width: 1280px;
        margin: 0 auto;
    }

    .box {
        background-color: #2B2D3E;
        padding: 25px 20px;
    }

    .shadow {
        box-shadow: 0px 1px 15px 1px rgba(69, 65, 78, 0.08);
    }
    .sparkboxes .box {
        padding-top: 10px;
        padding-bottom: 10px;
        text-shadow: 0 1px 1px 1px #666;
        box-shadow: 0px 1px 15px 1px rgba(69, 65, 78, 0.08);
        position: relative;
        border-radius: 5px;
    }

    .sparkboxes .box .details {
        position: absolute;
        color: #fff;
        transform: scale(0.7) translate(-22px, 20px);
    }
    .sparkboxes strong {
        position: relative;
        z-index: 3;
        top: -8px;
        color: #fff;
    }

    .sparkboxes .box4 {
        background-image: linear-gradient( 135deg, #EE9AE5 10%, #5961F9 100%);
    }
</style>
<script>
    window.Apex = {
        chart: {
            foreColor: '#ccc',
            toolbar: {
                show: false
            },
        },
        stroke: {
            width: 4
        },
        dataLabels: {
            enabled: false
        },
        tooltip: {
            theme: 'dark'
        },
        grid: {
            borderColor: "#535A6C",
            xaxis: {
                lines: {
                    show: true
                }
            }
        }
    };

    var spark4 = {
        chart: {
            id: 'spark4',
            group: 'sparks',
            type: 'line',
            height: 100,
            sparkline: {
                enabled: true
            },
            dropShadow: {
                enabled: true,
                top: 1,
                left: 1,
                blur: 2,
                opacity: 0.2,
            }
        },
        series: [{
            data: [0,3,4,5,3,1,3,61,11,3,5,1,1,1,1,131,1,41,51,,412,133,3]
        }],
        stroke: {
            curve: 'smooth'
        },
        markers: {
            size: 0
        },
        grid: {
            padding: {
                top: 20,
                bottom: 10,
                left: 110
            }
        },
        colors: ['#fff'],
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        tooltip: {
            x: {
                show: false
            },
            y: {
                title: {
                    formatter: function formatter(val) {
                        return '';
                    }
                }
            }
        }
    }
    new ApexCharts(document.querySelector("#spark4"), spark4).render();
    var optionsLine = {
        chart: {
            height: 328,
            type: 'line',
            zoom: {
                enabled: false
            },
            dropShadow: {
                enabled: true,
                top: 3,
                left: 2,
                blur: 4,
                opacity: 1,
            }
        },
        stroke: {
            curve: 'smooth',
            width: 2
        },
        //colors: ["#3F51B5", '#2196F3'],
        series: [{
            name: "Music",
            data: [1, 15, 26, 20, 33, 27]
        },
            {
                name: "Photos",
                data: [3, 33, 21, 42, 19, 32]
            },
            {
                name: "Files",
                data: [0, 39, 52, 11, 29, 43]
            }
        ],
        title: {
            text: 'Media',
            align: 'left',
            offsetY: 25,
            offsetX: 20
        },
        subtitle: {
            text: 'Statistics',
            offsetY: 55,
            offsetX: 20
        },
        markers: {
            size: 6,
            strokeWidth: 0,
            hover: {
                size: 9
            }
        },
        grid: {
            show: true,
            padding: {
                bottom: 0
            }
        },
        labels: ['01/15/2002', '01/16/2002', '01/17/2002', '01/18/2002', '01/19/2002', '01/20/2002'],
        xaxis: {
            tooltip: {
                enabled: false
            }
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            offsetY: -20
        }
    }
</script>
</body>
</html>

-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div style="display: flex;align-items: center;justify-content: center ;margin-top: 150px" >
    <div style="width: 700px ; ">
        <canvas id="myChart"></canvas>
    </div>
</div>

<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: {!! json_encode($myObject->pluck('created_at')->map(function ($date) { return $date->format('d.m.y'); })) !!},
            datasets: [{
                label: 'Мой график',
                data: {!! json_encode($myObject->pluck('value')) !!},
                fill: false,
                borderColor: 'rgba(232,136,190,0.8)',
                tension: 0.3,
                pointBackgroundColor:'rgba(29,222,67,0.8)',
            }]
        },

    });
</script>
