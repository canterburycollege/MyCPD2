<?php
$activity = $viewModel->get('activity');
$target_options = $viewModel->get('target_options');
$priority_options = $viewModel->get('priority_options');
?>

<h1>Update Activity</h1>
<form>
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
                <td><select name="target">
                        <?= $target_options ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Title of CPD activity/event: </td>
                <td><?= $activity->title ?></td>
                <td>--textbox--</td>
            </tr>
            <tr>
                <td>Intended learning outcomes for teacher: </td>
                <td><?= $activity->learning_outcomes ?></td>
                <td>--textbox--</td>
            </tr>
            <tr>
                <td>Intended impact on student outcomes: </td>
                <td><?= $activity->impact ?></td>
                <td>--textbox--</td>
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
                <td>--calendar--</td>
            </tr>
            <tr>
                <td>Completed? </td>
                <td><?= $activity->completed_date ?></td>
                <td>--calendar--</td>
            </tr>
        </tbody>
    </table>
    <br/>
    <input type="submit" value="Submit" />
    <input type="reset" value="Cancel" />
</form>