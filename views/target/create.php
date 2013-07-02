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



<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/target.gif' ?>" alt="Target icon"><?= $viewModel->get('heading1'); ?></h1>

    <form id="standard" method="post">

  
            <table id="edit">
                <tr>
                    <td><label>Target Tag: </label><input name="title" id="title"></td>
                </tr>
                <tr>
                    <td><label>Title: </label><input name="title_ext" id="title_ext"></td>
                </tr>
                <tr>
                    <td><label>Description: </label><textarea name="description" id="description" cols="80" rows="20"></textarea></td>
                </tr>
                <tr>
                    <td><label>Date: </label><input name="target_date" name="target_date" id="target_date"></td>
                </tr>                <tr>
                    <td><label>Status: </label><select name="status" id="status">
                        
                        <?php foreach ($viewModel->get('targets') as $row): ?>
                                <option value="<?= $row->id ?>"><?= $row->title ?></option>
                        <?php endforeach; ?>
                        
                        </select></td>
                </tr>
         
                <tr>
                    <td align="center"><input type="submit" name="submit" value="Create target" /></td>
                </tr> 
    </form>