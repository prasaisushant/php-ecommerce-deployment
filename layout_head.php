<?php
$_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
?>
 
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo isset($page_title) ? $page_title : "Processing"; ?></title>

    <!-- Bootstrap CSS -->
    <link href="libs/css/bootstrap.min.css" rel="stylesheet" media="screen">

    <!-- custom css for users -->
    <link href="libs/css/user.css" rel="stylesheet" media="screen">
    <?php if (basename($_SERVER['PHP_SELF']) == 'products.php'): ?>
        <style>
            body {
                /* Apply background styles only to products.php */
                background-image: url('back.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>
    <?php endif; ?>
    <?php if (basename($_SERVER['PHP_SELF']) == 'cart.php'): ?>
        <style>
            body {
                /* Apply background styles only to products.php */
                background-image: url('cartback.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
        </style>
    <?php endif; ?>
  </head>
  <body>
        <?php include 'navigation.php'; ?>
        <!-- container -->
        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="page-header">
                        <h1><?php echo isset($page_title) ? $page_title : "Processing"; ?></h1>
                    </div>
                </div>

