<?php $group = $viewModel->get('g'); ?>

<h1>Update Group Form</h1>
<h2><?= $group->manager ?></h2>
<form method="POST" action="">
    <table>
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
