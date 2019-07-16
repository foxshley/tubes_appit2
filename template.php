<?php defined('BASE_URL') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo APP_NAME . " | " .ucwords($page); ?></title>

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php isset($page)? include("pages/".$page.".php") : ""; ?>
    <script src="js/main.js"></script>
</body>
</html>