<?php     
    require_once(dirname(__FILE__) .'/classes/Demographics.php'); 
?>
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
    <div>
        <button id="generate_pdf" onclick="onSubmit()">Generate</button>
    </div>
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
                <canvas id="operating_unit_population"></canvas>
            </div>
            <div class="right">
                <canvas id="business_unit_population"></canvas>
            </div>
            <div class="left">
                <canvas id="category_population"></canvas>
            </div>
            <div class="right">
                <canvas id="gender_population"></canvas>
            </div>
        </div>
    </div>

    <script>
        function getOperatingUnit() {
            var data = <?php echo json_encode(Demographics::all('operating_unit')); ?>;
            return data;
        }

        function getBusinessUnit() {
            var data = <?php echo json_encode(Demographics::all('business_unit')); ?>;
            return data;
        }

        function getCategory() {
            var data = <?php echo json_encode(Demographics::all('category')); ?>;
            return data;
        }

        function getGender() {
            var data = <?php echo json_encode(Demographics::all('gender')); ?>;
            return data;
        }
    </script>
    <script src="public/js/chart.min.js"></script>
    <script src="public/js/jspdf.debug.js"></script>
    <script src="public/js/html2pdf.js"></script>
    <script src="public/js/helper.js"></script>
    <script src="public/js/data_demographics.js"></script>
    <script src="public/js/chart_demographics.js"></script>
    <script src="public/js/pdf_demographics.js"></script>
</body>
</html>