<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $viewModel->get('pageTitle'); ?></title>
        <link rel="stylesheet" href="http://webdev-04<?= BASEURL ?>assets/css/default.css" />
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.js"></script>
    </head>
    <body>
        <div class="news">
        <p>A new mandatory online learning module is now available for all staff to complete from DisabledGo. These modules look at equality in both legal and practical terms as well as language, types of impairment and advice on accessible services. <a href="http://training.disabledgo.com/auth/register/canterbury-college" target="_blank">http://training.disabledgo.com/auth/register/canterbury-college</a> Please follow the link and login by registering an email, username and password. You'll also be able to access this link via the VLE shortly by looking under Staff Training.</p>
        </div>
        <?php require($this->viewFile); ?>
    </body>
</html>