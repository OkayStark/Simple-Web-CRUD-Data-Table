<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $this->renderSection('title') ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <?= $this->renderSection('styles') ?>

    <style>
        .image-student {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Student CRUD Operation</h2>
        <?php
        if (session()->getFlashdata('success')) {
        ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
            <?php
        }
        if (session()->getFlashdata('error')) {
            ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php
        }
        ?>

        <?= $this->renderSection('body') ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>