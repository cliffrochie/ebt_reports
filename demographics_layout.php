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
        <div class="date">
            <p id="current_date"></p>
        </div>
        <div class="header">
            <h1>PORTAL</h1>
            <h1>DEMOGRAPHICS</h1>
        </div>
        <div class="body">
            <canvas id="canvas">
            </canvas>
        </div>
    </div>
    

    <script src="public/js/chart.min.js"></script>
    <script src="public/js/jspdf.min.js"></script>
    <script src="public/js/helper.js"></script>
    <script src="public/js/pdf_demographics.js"></script>
    <script src="public/js/pdfobject.min.js"></script>
    <script src="public/js/event_demographics.js"></script>

    <script>
        // generatePDF();
        document.getElementById('current_date').textContent = getCurrentDate();

        var ctx = document.getElementById('canvas');

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
                {name: 'Craft Workers', total: 1},
            ],
        }

        var data = {
            labels: [],
            datasets: [{
                label: '# of Employees per Category',
                data: [],
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        for(var i = 0; i < sample.department_population.length; i++) {
            data.labels.push(sample.department_population[i].name);
            data.datasets[0].data.push(sample.department_population[i].total);
        }

        // var data = {
        //     labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        //     datasets: [{
        //         label: '# of Votes',
        //         data: [12, 23, 3, 5, 6, 3],
        //         backgroundColor: [
        //             'rgba(255, 99, 132, 1)',
        //             'rgba(54, 162, 235, 1)',
        //             'rgba(255, 206, 86, 1)',
        //             'rgba(75, 192, 192, 1)',
        //             'rgba(153, 102, 255, 1)',
        //             'rgba(255, 159, 64, 1)'
        //         ],
        //         borderColor: [
        //             'rgba(255, 99, 132, 1)',
        //             'rgba(54, 162, 235, 1)',
        //             'rgba(255, 206, 86, 1)',
        //             'rgba(75, 192, 192, 1)',
        //             'rgba(153, 102, 255, 1)',
        //             'rgba(255, 159, 64, 1)'
        //         ],
        //         borderWidth: 1
        //     }]
        // };

        var stackedBar = new Chart(ctx, {
            type: 'horizontalBar',
            data: data,
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        
    </script>
</body>
</html>