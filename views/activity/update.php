<?php
$activity = $viewModel->get('activity');
$target_options = $viewModel->get('target_options');
$priority_options = $viewModel->get('priority_options');
?>

<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript" src="<?= BASEURL ?>assets/js/raty/lib/jquery.raty.min.js"></script>
<script type="text/javascript" src="<?= BASEURL . '/assets/js/tiny_mce/tiny_mce.js' ?>"></script>


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
            score : <?= $activity->rating ?>
        });
    });

</script>






<h1>Update Activity</h1>
<form method="post" action="">
    <table>
        <tbody>
            <tr>
                <td>Target this CPD addresses: </td>
                <td><select name="target_id">
                        <?= $target_options ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Title of CPD activity/event: </td>
                <td><textarea name="title" cols="80" rows="5" ><?= $activity->title ?></textarea></td>
            </tr>
            <tr>
                <td>Intended learning outcomes for teacher: </td>
                <td><textarea name="learning_outcomes" cols="80" rows="5" ><?= $activity->learning_outcomes ?></textarea></td>
            </tr>
            <tr>
                <td>Intended impact on student outcomes: </td>
                <td><textarea name="impact" cols="80" rows="5" ><?= $activity->impact ?></textarea></td>
            </tr>
            <tr>
                <td>Priority level: </td>
                <td><select name="priority_type_id">
                        <?= $priority_options ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Target date: </td>
                <td><input name="planned_date" id="planned_date" value="<?= $activity->planned_date ?>" /></td>
            </tr>
            <tr>
                <td>Completed? </td>
                <td><input name="completed_date" id="completed_date" value="<?= $activity->completed_date ?>" /></td>
            </tr>
            <tr>
                <td>Rating: </td>
                <td><div id="star"></div></td>
            </tr>
        </tbody>
    </table>
    <br/>
    <input type="submit" value="Submit" />
    <input type="reset" value="Cancel" />
</form>