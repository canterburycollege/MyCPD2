<h1>Create New Faculty</h1>
<form method="POST" action="">
    <table>
        <tr>
            <td>Description of new Faculty: </td>
            <td><input type="text" name="description" value="" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Submit" />
                <input type="reset" value="Cancel" onClick="history.go(-1);return true;"/>
            </td>
        </tr>
    </table>
</form>