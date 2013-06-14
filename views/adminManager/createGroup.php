<?php $manager = $viewModel->get('manager'); ?>
<h1>Create New Group Form</h1>
<form method="POST" action="">
    <table>
        <tr>
            <td><?= $manager->firstname ?></td>
        </tr>
        <tr>
            <td><label>Description: </label>
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