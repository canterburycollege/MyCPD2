<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $viewModel->get('pageTitle'); ?></title>
        <link rel="stylesheet" href="<?= BASEURL ?>assets/css/default.css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script type="text/javascript" src="http://localhost/moodle/MyCPD/global.js"></script>
    </head>
    <body>
        <?php require($this->viewFile); ?>
    </body>
</html>