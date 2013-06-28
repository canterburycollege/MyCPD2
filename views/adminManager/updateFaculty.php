<?php 
$faculty = $viewModel->get('faculty');
?>
<h1>Update Faculty Form</h1>
<form method="POST" action="">
    <table>
        <tr>
            <td>Description: </td>
            <td><input type="text" name="description" value="<?= $faculty->description ?>" size="100" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Submit" />
                <input type="reset" value="Cancel" />
            </td>
        </tr>
    </table>
</form>