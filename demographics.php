<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/demographics.css">
</head>
<body>
    <div class="container">
        <h1>PORTAL</h1>
        <h1>DEMOGRAPHICS</h1>
    </div>
    
    <canvas id="demo"></canvas>

    <script src="public/js/chart.min.js"></script>
    <script src="public/js/jspdf.min.js"></script>
    <script src="public/js/helper.js"></script>
    <script src="public/js/pdf_demographics.js"></script>
    <script src="public/js/pdfobject.min.js"></script>
    <script src="public/js/event_demographics.js"></script>

    <script>

    var chartData = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [
            {
                fillColor: "#79D1CF",
                strokeColor: "#79D1CF",
                data: [60, 80, 81, 56, 55, 40]
            }
        ]
    };

    var opt = {
        scales: {
            xAxes: [{
                gridLines: {
                    display:false
                },
                ticks: {
                    beginAtZero: true
                }
            }],
            yAxes: [{
                gridLines: {
                    display:false
                }   
            }]
        },
        events: false,
        tooltips: {
            enabled: false
        },
        hover: {
            animationDuration: 0
        },
        animation: {
            duration: 1,
            onComplete: function () {
                var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x - 20, bar._model.y + 8);
                    });
                });
            }
        }
    };
        
    var ctx = document.getElementById("demo"),
        myLineChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: chartData,
            options: opt
    });        
        
    </script>
</body>
</html>