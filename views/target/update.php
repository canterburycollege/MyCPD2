<!-- Todo: check you have permission to edit -->

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
<div>
    <form>

        <?php foreach ($viewModel->get('targets') as $row): ?>
            <table id="edit">
                <tr>
                    <td><label>Title: </label><input id="title_ext" value="<?= $row->title_ext ?>"></td>
                </tr>
                <tr>
                    <td><label>Description: </label><textarea id="description" cols="80" rows="20"><?= $row->description ?></textarea></td>
                </tr>
                <tr>
                    <td><label>Date: </label><input name="target_date" id="target_date" value="<?= $row->target_date ?>"></td>
                </tr>                <tr>
                    <td><label>Status: </label><select id="status" value="<?= $row->target_id ?>"><option><?= $row->status ?><option>
                        
                        <?php foreach ($viewModel->get('targets2') as $row): ?>
                                <option value="<?= $row->id ?>"><?= $row->title ?></option>
                        <?php endforeach; ?>
                        
                        </select></td>
                </tr>
            <?php endforeach; ?>
                <tr>
                    <td align="center"><input type="submit" name="submit" value="Update target" /></td>
                </tr> 
    </form>