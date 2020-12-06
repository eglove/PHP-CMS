<?php
if (!isset($pageTitle)) {
    $pageTitle = 'Staff Area';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" media="all" href="<?php echo urlFor('stylesheets/staff.css')?>">
    <title>GBI - <?php echo h($pageTitle); ?></title>
</head>
<body>
<header><h1>GBI Staff Area</h1></header>
<nav>
    <ul>
        <li><a href="<?php echo urlFor('staff/index.php'); ?>">Menu</a></li>
    </ul>
</nav>
