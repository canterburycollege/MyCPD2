<?php 
$manager = $viewModel->get('manager');
?>
<h1>Update Manager Form</h1>
<form method="POST" action="">
    <table>
        <tr>
            <td>Name: </td>
            <td><?= $manager->display_name ?></td>
        </tr>
        <tr>
            <td>Description: </td>
            <td><input type="text" name="description" value="<?= $manager->description ?>" size="100" /></td>
        </tr>
        <tr>
            <td>Groups: </td>
            <td>-- list of attached groups goes here --</td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Submit" />
                <input type="reset" value="Cancel" />
            </td>
        </tr>
    </table>
</form>