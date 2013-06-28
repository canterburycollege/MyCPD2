<?php 
$section = $viewModel->get('section');
?>
<h1>Update Section Form</h1>
<form method="POST" action="">
    <table>
        <tr>
            <td>Description: </td>
            <td><input type="text" name="description" value="<?= $section->description ?>" size="100" /></td>
        </tr>
        <tr>
            <td>Faculty: </td>
            <td><select name="faculty">
                    <?= $viewModel->get('faculty_options') ?>
                </select></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Submit" />
                <input type="reset" value="Cancel" />
            </td>
        </tr>
    </table>
</form>