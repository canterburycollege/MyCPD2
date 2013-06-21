<?php $manager = $viewModel->get('managerDetails'); ?>
<h1>Create New Group Form</h1>
<h2><?= $manager->displayname ?></h2>
<form method="POST" action="">
    <table>
        <tr>
            <td><label>Description of new Group: </label>
                <input type="text" name="description" value="" />
            </td>
        </tr>
        <tr>
            <td align="center">
                <input type="submit" value="Submit" />
                <input type="reset" value="Cancel" />
            </td>
        </tr>
    </table>
</form>