<script type="text/javascript" src="<?= BASEURL . '/assets/js/tiny_mce/tiny_mce.js' ?>"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>

<script type="text/javascript">

    tinyMCE.init({
        theme: "advanced",
        mode: "textareas",
        plugins: "fullpage",
        theme_advanced_toolbar_location: "top",
        theme_advanced_buttons3_add: "fullpage"

    });

    $(function() {
        $("#target_date").datepicker({dateFormat: 'dd/mm/yy'});
    });

</script>


<?php foreach ($viewModel->get('news') as $row): ?>
    <div class="news"><?= $row->description ?></div>
<?php endforeach; ?>   
<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/target.gif' ?>" alt="Target icon"><?= $viewModel->get('heading1'); ?></h1>
<div id="div_activities">
    <form>

        <?php foreach ($viewModel->get('targets') as $row): ?>
            <table>
                <tr>
                    <td><input id="title_ext" value="<?= $row->title_ext ?>"></td>
                </tr>
                <tr>
                    <td><textarea id="description"><?= $row->description ?></textarea></td>
                </tr>
                <tr>
                    <td><input id="status" value="<?= $row->status ?>"></td>
                </tr>
                <tr>
                    <td><input name="target_date" id="target_date" value="<?= $row->target_date ?>"></td>
                </tr>
            <?php endforeach; ?>
    </form>