<?php
define('CSSPATH', 'http://localhost/robust-teacher-portal/views/css/'); //define css path
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "Document" ?></title>
    <link rel="stylesheet" href="<?php echo (CSSPATH . "bootstrap.css"); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo (CSSPATH . "bootstrap.min.css"); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo (CSSPATH . "dataTables.bootstrap4.min.css"); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo (CSSPATH . "fontawesome.min.css"); ?>" type="text/css">


    <?php define('JSPATH', 'http://localhost/robust-teacher-portal/views/js/'); //define css path
    ?>
    <script src="<?php echo (JSPATH . "jquery-3.5.1.js"); ?>"></script>
    <script src="<?php echo (JSPATH . "jquery.dataTables.min.js"); ?>"></script>
    <script src="<?php echo (JSPATH . "dataTables.bootstrap4.min.js"); ?>"></script>
    <script src="<?php echo (JSPATH . "popper.min.js"); ?>"></script>
    <script src="<?php echo (JSPATH . "fontawesome.min.js"); ?>"></script>
    <script src="<?php echo (JSPATH . "bootstrap.min.js"); ?>"></script>
</head>

<body>
    <?php if (isset($_SESSION["teacher"])) { ?>
        <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php?c=teacher&f=dashbord">Teacher Dashbord</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?c=teacher&f=dashbord">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
            <a class="btn btn-outline-warning my-2 my-sm-0" href="index.php?c=teacher&f=logout" type="submit">Logout</a>
        </nav>
    <?php } ?>
    <main class="container">