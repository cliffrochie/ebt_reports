<?php
    // require_once('demo_content.php');    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demographics</title>
    <link rel="stylesheet" href="public/css/app.css">
    <link rel="stylesheet" href="public/css/demographics.css">
</head>
<body>
    <div id="container">

    </div>

    <script src="public/js/helper.js"></script>
    <script src="public/js/chart.min.js"></script>
    <script src="public/js/jspdf.debug.js"></script>
    <script src="public/js/html2canvas.js"></script>
    <script>
        var string = "02/20/2020";
        var result = "";

        if(string.indexOf("/") > -1 && string.split("/").length == 3) {
            console.log("++");
            result = string.split('/')[2] +"-"+ string.split('/')[0] +"-"+ string.split('/')[1]
        }
        else {  
            result = "Present!";
        }
        console.log(result);
        console.log("-----");

        var today = new Date().toJSON().slice(0,10);
        var date2 =  today.split("-")[1] +"/"+ today.split("-")[2] +"/"+ today.split("-")[0];
        console.log(today);
        console.log(date2);
    </script>
</body>
</html>