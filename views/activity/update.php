<form name="update_form" method="POST">
    <p>update activity</p>
    <table>
        <thead>
            <tr>
                <th>Field</th>
                <th>Existing Value</th>
                <th>New Value</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Target this CPD addresses:</th>
                <td><?= $activity->target ?></td>
                <td>-- select --</td>
            </tr>
            <tr>
                <th>Title of CPD activity/event:</th>
                <td><?= $row->x ?></td>
                <td>-- textbox --</td>
            </tr>
            <tr>
                <th>Intended Learning Outcomes for teacher:</th>
                <td><?= $activity->x ?></td>
                <td>-- textbox --</td>
            </tr>
            <tr>
                <th>Intended Impact on student outcomes:</th>
                <td><?= $activity->x ?></td>
                <td>-- textbox --</td>
            </tr>
            <tr>
                <th>Priority level:</th>
                <td><?= $activity->x ?></td>
                <td>-- select --</td>
            </tr>
            <tr>
                <th>Target Date:</th>
                <td><?= $activity->x ?></td>
                <td>-- calendar --</td>
            </tr>
            <tr>
                <th>Completed?:</th>
                <td><?= $activity->x ?></td>
                <td>-- calendar --</td>
            </tr>
        </tbody>
    </table>

<input type="submit" value="Submit" name="Submit" />
<input type="reset" value="Cancel" name="Cancel" />
</form>