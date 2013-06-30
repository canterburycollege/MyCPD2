<?php $group = $viewModel->get('group'); ?>

<h1>Update Group</h1>
<form method="POST" action="">
    <input type="hidden" name="manager_id" value="<?= $group->manager_id ?>" />
    <table>
        <tr>
            <td>Manager: </td>
            <td><?= $group->manager ?></td>
        </tr>
        <tr>
            <td>Section: </td>
            <td><select name="section_id">
                    <?= $viewModel->get('section_options') ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Description: </td>
            <td><input type="text" name="description" value="<?= $group->description ?>" size="100" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Submit" />
                <input type="reset" value="Cancel" />
            </td>
        </tr>
    </table>
</form>
