<script type="text/javascript" src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript" src="<?= BASEURL ?>assets/js/raty/lib/jquery.raty.min.js"></script>
<script type="text/javascript" src="<?= BASEURL . '/assets/js/tiny_mce/tiny_mce.js' ?>"></script>
<?php
$activity = $viewModel->get('activity');
$target_options = $viewModel->get('target_options');
$priority_options = $viewModel->get('priority_options');
?>

<script type="text/javascript">

    tinyMCE.init({
        theme: "advanced",
        mode: "textareas",
        plugins: "fullpage",
        theme_advanced_toolbar_location: "top",
        theme_advanced_buttons3_add: "fullpage"

    });

    $(function() {
        $("#planned_date").datepicker({dateFormat: 'yy-mm-dd'});
        $("#completed_date").datepicker({dateFormat: 'yy-mm-dd'});
        $('#star').raty({ 
            scoreName : 'rating',
            path : '<?= BASEURL ?>assets/js/raty/lib/img' ,
            cancel : true,
            score : '<?= $activity->rating ?>'
        });
    });

</script>


<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/plan2.png' ?>" alt="Activity icon"><?= $viewModel->get('heading1'); ?></h1>
<form id="standard" method="post" action="">
    <table>
        <tbody>
            <tr>
                <td><label>Target this CPD addresses: </td>
                <td><select name="target_id">
                        <?= $target_options ?>
                    </select>
                </label></td>
            </tr>
            <tr>
                <td><label>Title of CPD activity/event: </td>
                <td><textarea name="title" cols="80" rows="5" ><?= $activity->title ?></textarea></label></td>
            </tr>
            <tr>
                <td><label>Intended learning outcomes for teacher: </td>
                <td><textarea name="learning_outcomes" cols="80" rows="5" ><?= $activity->learning_outcomes ?></textarea></label></td>
            </tr>
            <tr>
                <td><label>Intended impact on student outcomes: </td>
                <td><textarea name="impact" cols="80" rows="5" ><?= $activity->impact ?></textarea></label></td>
            </tr>
            <tr>
                <td><label>Priority level: </td>
                <td><select name="priority_type_id">
                        <?= $priority_options ?>
                    </select>
                </label></td>
            </tr>
            <tr>
                <td><label>Target date: </td>
                <td><input name="planned_date" id="planned_date" value="<?= $activity->planned_date ?>" /></label></td>
            </tr>
            <tr>
                <td><label>Completed? </td>
                <td><input name="completed_date" id="completed_date" value="<?= $activity->completed_date ?>" /></label></td>
            </tr>
                         <tr>
                <td><label>Evaluation notes: </td>
                <td><textarea name="evaluation_notes" cols="80" rows="5" ><?= $activity->evaluation_notes ?></textarea></label></td>
            </tr>
            
            <tr>
                <td><label>Rating: </td>
                <td><div id="star"></div></label></td>
            </tr>

        </tbody>
    </table>
    <br/>
    <input type="submit" value="Update Activity" />
                <input type="reset" value="Cancel" onClick="history.go(-1);return true;"/>
</form>