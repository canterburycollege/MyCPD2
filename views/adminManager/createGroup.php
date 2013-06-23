<?php $manager = $viewModel->get('managerDetails'); ?>
<h1>Create New Group</h1>
<form method="POST" action="">
    <table>
        <tr>
            <td>Manager: </td>
            <td><?= $manager->displayname ?></td>
        </tr>
        <tr>
            <td>Section: </td>
            <td><select name="section">
                    <?= $viewModel->get('section_options') ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Description of new Group: </td>
            <td><input type="text" name="description" value="" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Submit" />
                <input type="reset" value="Cancel" />
            </td>
        </tr>
    </table>
</form>