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
    <div class="container" id="demographics_content">
        <div class="date">
            <p id="current_date"></p>
        </div>
        <div class="header">
            <h1>PORTAL</h1>
            <h1>DEMOGRAPHICS</h1>
        </div>
        <div class="content">
            <p>The demographics of employee population.</p>
        </div>
        <div class="chart-content">
            <div class="left">
                <canvas id="department_population"></canvas>
            </div>
            <div class="right">
               <canvas id="gender_population"></canvas>
            </div>
            <div class="left">
                <canvas id="category_population"></canvas>
            </div>
        </div>
    </div>
    <div>
        <button onclick="generatePDF()">Generate</button>
    </div>

    <script src="public/js/chart.min.js"></script>
    <script src="public/js/jspdf.debug.js"></script>
    <script src="public/js/html2pdf.js"></script>
    <script src="public/js/helper.js"></script>
    <script src="public/js/pdf_demographics.js"></script>
    <script src="public/js/event_demographics.js"></script>

    <script>
        // generatePDF();
        document.getElementById('current_date').textContent = getCurrentDate();

        var dept_pop = document.getElementById('department_population');
        var cate_pop = document.getElementById('category_population');
        var gend_pop = document.getElementById('gender_population');

        var sample = {
            department_population: [
                {name: 'No Department', total: 6},
                {name: 'EngTech Global Solutions', total: 5},
                {name: 'Computer Education Department', total: 4},
                {name: 'Business Education Department', total: 4},  
            ],
            category_population: [
                {name: 'Technical', total: 7},
                {name: 'Professional', total: 6},
                {name: 'Operatives', total: 5},
                {name: 'Office and Clerical Work', total: 2},
                {name: 'Craft Workers', total: 9},
            ],
            gender_population: [
                {name: 'Male', total: 29, background_color: 'rgba(109, 156, 214, 1)', border_color: 'rgba(109, 156, 214, 1)'},
                {name: 'Female', total: 34, background_color: 'rgba(212, 123, 166, 1)', border_color: 'rgba(212, 123, 166, 1)'}
            ]
        }

        var dept_data = {
            labels: [],
            datasets: [{
                label: '# of Employees per Department',
                data: [],
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var cate_data = {
            labels: [],
            datasets: [{
                label: '# of Employees per Category',
                data: [],
                backgroundColor: 'rgba(50, 168, 86, 1)',
                borderColor: 'rgba(50, 168, 86, 1)',
                borderWidth: 1
            }]
        };

        var gend_data = {
            labels: ['Male', 'Female'],
            datasets: [{
                label: '# of Employees per Gender',
                data: [49, 31],
                backgroundColor: ['rgba(109, 156, 214, 1)', 'rgba(212, 123, 166, 1)'],
                borderColor: ['rgba(109, 156, 214, 1)', 'rgba(212, 123, 166, 1)'],
                borderWidth: 1
            }]
        };

        // Populate data: Department Population
        for(var i = 0; i < sample.department_population.length; i++) {
            dept_data.labels.push(sample.department_population[i].name);
            dept_data.datasets[0].data.push(sample.department_population[i].total);
        }

        // Populate data: Category Population
        for(var i = 0; i < sample.category_population.length; i++) {
            cate_data.labels.push(sample.category_population[i].name);
            cate_data.datasets[0].data.push(sample.category_population[i].total);
        }


        // Populate data: Gender Population
        // for(var i = 0; i < sample.gender_population.lengtth; i++) {
        //     gend_data.labels.push(sample.gender_population[i].name);
        //     gend_data.datasets[0].data.push(sample.gender_population[i].total);
        //     gend_data.datasets[0].backgroundColor.push(sample.gender_population[i].background_color);
        //     gend_data.datasets[0].borderColor.push(sample.gender_population[i].border_color);
        // }

        // Chart.pluginService.register({
		// 	beforeRender: function (chart) {
		// 		if (chart.config.options.showAllTooltips) {
		// 			// create an array of tooltips
		// 			// we can't use the chart tooltip because there is only one tooltip per chart
		// 			chart.pluginTooltips = [];
		// 			chart.config.data.datasets.forEach(function (dataset, i) {
		// 				chart.getDatasetMeta(i).data.forEach(function (sector, j) {
		// 					chart.pluginTooltips.push(new Chart.Tooltip({
		// 						_chart: chart.chart,
		// 						_chartInstance: chart,
		// 						_data: chart.data,
		// 						_options: chart.options.tooltips,
		// 						_active: [sector]
		// 					}, chart));
		// 				});
		// 			});

		// 			// turn off normal tooltips
		// 			chart.options.tooltips.enabled = false;
		// 		}
		// 	},
		// 	afterDraw: function (chart, easing) {
		// 		if (chart.config.options.showAllTooltips) {
		// 			// we don't want the permanent tooltips to animate, so don't do anything till the animation runs atleast once
		// 			if (!chart.allTooltipsOnce) {
		// 				if (easing !== 1)
		// 					return;
		// 				chart.allTooltipsOnce = true;
		// 			}

		// 			// turn on tooltips
		// 			chart.options.tooltips.enabled = true;
		// 			Chart.helpers.each(chart.pluginTooltips, function (tooltip) {
		// 				tooltip.initialize();
		// 				tooltip.update();
		// 				// we don't actually need this since we are not animating tooltips
		// 				tooltip.pivot();
		// 				tooltip.transition(easing).draw();
		// 			});
		// 			chart.options.tooltips.enabled = false;
		// 		}
		// 	}
		// })

        

        // Chart objects
        var bar1 = new Chart(dept_pop, {
            type: 'horizontalBar',
            data: dept_data,
            options: {
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
                }
            }
        });

        var bar2 = new Chart(cate_pop, {
            type: 'horizontalBar',
            data: cate_data,
            options: {
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
                }
            }
        });

        var bar3 = new Chart(gend_pop, {
            type: 'pie',
            data: gend_data,
            options: {
                showTooltips: true,
            }
        });
        

        // onclick
        function generatePDF() {
            var doc = new jsPDF('p', 'pt', 'a4');
            doc.internal.scaleFactor = 30;


            var chart1 = document.getElementById('department_population')
            var dataURL1 = chart1.toDataURL("image/png");

            var width = 320;
            var height = 160;

            doc.addImage(dataURL1, 'PNG', 15, 10, width, height);


            // var chart2 = document.getElementById('category_population')
            // var dataURL2 = chart2.toDataURL();
            // doc.addImage(dataURL2, 'JPEG', 15, 300);


            // var chart3 = document.getElementById('gender_population')
            // var dataURL3 = chart3.toDataURL();
            // doc.addImage(dataURL3, 'JPEG', 15, 500);

            doc.save('test.pdf');
        }

    </script>
</body>
</html>