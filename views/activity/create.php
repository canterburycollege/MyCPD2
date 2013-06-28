<!-- Todo: check you have permission to edit -->

<script type="text/javascript" src="<?= BASEURL . '/assets/js/tiny_mce/tiny_mce.js' ?>"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<?php $priority_options = $viewModel->get('priority_options'); ?>
<script type="text/javascript">

    tinyMCE.init({
        theme: "advanced",
        mode: "textareas",
        plugins: "fullpage",
        theme_advanced_toolbar_location: "top",
        theme_advanced_buttons3_add: "fullpage"

    });

    $(function() {
        $("#activity_date").datepicker({dateFormat: 'dd/mm/yy'});
    });

</script>

<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/plan2.png' ?>" alt="Activity icon"><?= $viewModel->get('heading1'); ?></h1>

<div>
    <form id="standard" method="post">

        <table id="edit">

            <tr>
                <td><label>Title: </label><input name="title" id="title_ext"></td>
            </tr>
            <tr>
                <td><label>Description: </label>
                    <textarea name="description" id="description" cols="80" rows="20" ></textarea></td>
            </tr>

            <tr>
                <td><label>Target this CPD addresses: </label><select name="target_id" id="target_id">

                        <?php foreach ($viewModel->get('targets') as $row): ?>
                            <option value="<?= $row->id ?>"><?= $row->title ?></option>
                        <?php endforeach; ?>

                    </select></td>
            </tr>

            <tr>
                <td>
                    <label>Title of CPD activity/event :</label>
                    <input name="cpdtitle" id="title_ext">
                </td>
            </tr>

            <tr>
                <td>
                    <label>Intended Learning Outcomes for teacher :</label>
                    <textarea name="teacherOutcome" id="teacherOutcome" cols="80" rows="20"></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Intended impact on student outcomes :</label>
                    <textarea name="studentOutcome" id="studentOutcome" cols="80" rows="20"></textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label>Priority level :</label>



                    <select name="priority">
                        <?= $priority_options ?>
                    </select>

                </td>
            </tr>

            <tr>
                <td>
                    <label>Target Date :</label><input name="activity_date" name="activity_date" id="activity_date">

                </td>
            </tr>

            <tr>
                <td align="center"><input type="submit" name="submit" value="Create Activity" /></td>
            </tr> 
    </form>
