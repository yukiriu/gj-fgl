<?php
  include __DIR__ . "/../UTILS/moduleloader.php";
?>

<!DOCTYPE HTML>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../styles/output.css" type="text/css" rel="stylesheet" />
        <link href="../styles/fonts.css" type="text/css" rel="stylesheet" />

        <title> <?php echo $title ?> </title>
</head>
    <body class="bg-gray-200" style="font-family: 'Patua One'">
    <?php include "nav.php";?>
        <div style="margin-top:100px"> 
            <?php  load_modules($content); ?>
        </div>
        <footer>
        </footer>
    </body>
</html>
