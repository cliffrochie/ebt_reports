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
    <button type="button" id="pdfDownloader">Download</button>
    <div id="printDiv">
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
            <canvas id="department_population"></canvas>
            <canvas id="gender_population"></canvas>
            <canvas id="category_population"></canvas>
        </div>
    </div>

    <div id="destination">

    </div>

    <script src="public/js/helper.js"></script>
    <script src="public/js/chart.min.js"></script>
    <script src="public/js/jspdf.debug.js"></script>
    <script src="public/js/html2canvas.js"></script>

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

        var options = {
            animation: false,
            legend: {
                labels: {
                    fontStyle: "bold",
                    fontSize: 16
                }
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false
                    },
                    ticks: {
                        beginAtZero: true,
                        fontStyle: "bold",
                        fontSize: 16,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display:false
                    },
                    ticks: {
                        fontStyle: "bold",
                        fontSize: 16
                    }
                }]
            }
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

        // Chart objects
        var bar1 = new Chart(dept_pop, {
            type: 'horizontalBar',
            data: dept_data,
            options: options
        });

        var bar2 = new Chart(cate_pop, {
            type: 'horizontalBar',
            data: cate_data,
            options: options
        });

        // var bar3 = new Chart(gend_pop, {
        //     type: 'pie',
        //     data: gend_data,
        // });
    </script>

    <script>
        var source = document.getElementById('printDiv');
        var destination = document.getElementById('destination');

        function myRenderFunction(canvas) {
            destination.appendChild(canvas);
            var imgData = canvas.toDataURL('image/png');
            console.log('Report Image URL: '+ imgData);

            var doc = new jsPDF('p', 'pt', 'a4');
            doc.internal.scaleFactor = 2.5;
            doc.addImage(imgData, 'JPEG', 10, 10);
            doc.save('sample.pdf');
        }

        html2canvas(source, {
            scale: 2,
            onrendered: myRenderFunction
        })
        // source.style.display = 'none';

        

        var btn = document.getElementById('pdfDownloader');
        btn.addEventListener('click', function() {
            // html2canvas(document.getElementById('printDiv'), {
            //     scale: 2,
            //     onrendered: function(canvas) {
            //         var imgData = canvas.toDataURL('image/png');
            //         console.log('Report Image URL: '+ imgData);
            //         var doc = new jsPDF('p', 'pt', 'a4');

            //         doc.addImage(imgData, 'PNG', 10, 10);
            //         doc.save('sample.pdf');
            //     }
            // })

        })
    </script>
</body>
</html>