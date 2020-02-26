// Chart objects
var bar1 = new Chart(dept_pop, {
    type: 'horizontalBar',
    data: dept_data,
    options: {
        tooltips: {
            "enabled": false
        },
        hover: {
            "mode": null,
            animationDuration: 0
        },
        legend: {
            display: false,
        },
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
        "animation": {
            "onComplete": function () {
                var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x - 14, bar._model.y + 6.5);
                    });
                });
            }
        },
    }
});

var bar2 = new Chart(cate_pop, {
    type: 'horizontalBar',
    data: cate_data,
    options: {
        tooltips: {
            "enabled": false
        },
        hover: {
            "mode": null,
            animationDuration: 0
        },
        legend: {
            display: false,
        },
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
        "animation": {
            "onComplete": function () {
                var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x - 14, bar._model.y + 6.5);
                    });
                });
            }
        },
    }
});

var bar3 = new Chart(gend_pop, {
    type: 'bar',
    data: gend_data,
    options: {
        tooltips: {
            "enabled": false
        },
        hover: {
            "mode": null,
            animationDuration: 0
        },
        legend: {
            display: false,
        },
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
                },
                ticks: {
                    beginAtZero: true
                }   
            }]
        },
        "animation": {
            "onComplete": function () {
                var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x, bar._model.y + 25);
                    });
                });
            }
        },
    }
});


var bar4 = new Chart(jobv_pop, {
    type: 'bar',
    data: jobv_data,
    options: {
        tooltips: {
            "enabled": false
        },
        hover: {
            "mode": null,
            animationDuration: 0
        },
        legend: {
            display: false,
        },
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
                },
                ticks: {
                    beginAtZero: true
                }   
            }]
        },
        "animation": {
            "onComplete": function () {
                var chartInstance = this.chart,
                    ctx = chartInstance.ctx;
                
                ctx.font = Chart.helpers.fontString(Chart.defaults.global.defaultFontSize, Chart.defaults.global.defaultFontStyle, Chart.defaults.global.defaultFontFamily);
                ctx.textAlign = 'center';
                ctx.textBaseline = 'bottom';

                this.data.datasets.forEach(function (dataset, i) {
                    var meta = chartInstance.controller.getDatasetMeta(i);
                    meta.data.forEach(function (bar, index) {
                        var data = dataset.data[index];                            
                        ctx.fillText(data, bar._model.x, bar._model.y + 25);
                    });
                });
            }
        },
    }
});