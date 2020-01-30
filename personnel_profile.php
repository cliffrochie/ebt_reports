<?php 
    require_once(dirname(__FILE__) .'/classes/Employee.php');
    require_once(dirname(__FILE__) .'/employee.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="public/css/app.css">
</head>
<body>
    <div class="container">
        <form>
            <label for="code">Code</label>
            <input type="text" name="code" id="code">
            <a id="search_employee" href="javascript:;" class="btn">=</a>
            <div id="dropdown" class="dropdown-content">
                <!-- content here -->
            </div>
            <a id="generate_pdf" href="javascript:;">Preview</a>
        </form>
    </div>

    <script>
        function getEmployees() {
            var employees = <?php echo json_encode(Employee::all()); ?>;
            return employees;
        }
    </script>
    <script src="public/js/jspdf.min.js"></script>
    <script src="public/js/helper.js"></script>
    <script src="public/js/pdf_personnel_profile.js"></script>
    <script src="public/js/pdfobject.min.js"></script>
    <script src="public/js/event_personnel_profile.js"></script>
    <script>
        // generatePDF();
    </script>
</body>
</html>