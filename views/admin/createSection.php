<h1>Create New Section</h1>
<form method="POST" action="">
    <table>
        <tr>
            <td>Description of new Section: </td>
            <td><input type="text" name="description" value="" /></td>
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
                <input type="reset" value="Cancel" onClick="history.go(-1);return true;"/>
            </td>
        </tr>
    </table>
</form>