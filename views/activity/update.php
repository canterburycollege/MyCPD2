<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript">
    $(function() {
        $("#planned_date").datepicker({dateFormat: 'yy-mm-dd'});
        $("#completd_date").datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>

<?php
$activity = $viewModel->get('activity');
$target_options = $viewModel->get('target_options');
$priority_options = $viewModel->get('priority_options');
?>

<h1>Update Activity</h1>
<form method="post" action="">
    <table>
        <thead>
            <tr>
                <th>Field</th>
                <th>Existing value</th>
                <th>New Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Target this CPD addresses: </td>
                <td><?= $activity->target ?></td>
                <td><select name="target_id">
                        <?= $target_options ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Title of CPD activity/event: </td>
                <td><?= $activity->title ?></td>
                <td><textarea name="title" cols="80" rows="5" ></textarea></td>
            </tr>
            <tr>
                <td>Intended learning outcomes for teacher: </td>
                <td><?= $activity->learning_outcomes ?></td>
                <td><textarea name="learning_outcomes" cols="80" rows="5" ></textarea></td>
            </tr>
            <tr>
                <td>Intended impact on student outcomes: </td>
                <td><?= $activity->impact ?></td>
                <td><textarea name="impact" cols="80" rows="5" ></textarea></td>
            </tr>
            <tr>
                <td>Priority level: </td>
                <td><?= $activity->priority_type ?></td>
                <td><select name="priority_type">
                        <?= $priority_options ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Target date: </td>
                <td><?= $activity->planned_date ?></td>
                <td><input name="planned_date" id="planned_date" /></td>
            </tr>
            <tr>
                <td>Completed? </td>
                <td><?= $activity->completed_date ?></td>
                <td><input name="completed_date" id="completed_date" /></td>
            </tr>
        </tbody>
    </table>
    <br/>
    <input type="submit" value="Submit" />
    <input type="reset" value="Cancel" />
</form>