// Chart objects

// Operating Unit


var bar1 = new Chart(operating_unit_population, {
    type: 'horizontalBar',
    data: insertOperatingUnit(),
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
                        ctx.fillText(data, bar._model.x - 10, bar._model.y + 6.5);
                    });
                });
            }
        },
    }
});


// Business Unit
var bar2 = new Chart(business_unit_population, {
    type: 'horizontalBar',
    data: insertBusinessUnit(),
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
                        ctx.fillText(data, bar._model.x - 10, bar._model.y + 6.5);
                    });
                });
            }
        },
    }
});


// Category
var bar3 = new Chart(category_population, {
    type: 'horizontalBar',
    data: insertCategory(),
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
                        ctx.fillText(data, bar._model.x - 10, bar._model.y + 6.5);
                    });
                });
            }
        },
    }
});


var bar4 = new Chart(gender_population, {
    type: 'bar',
    data: insertGender(),
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