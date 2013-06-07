<h1>Create New Manager Form</h1>
<form method="POST">
    <table>
        <tr>
            <td><label>moodle_user_id: </label>
                <input type="text" name="moodle_user_id" value="" />
                @todo - get list from moodle
            </td>
        </tr>
        <tr>
            <td><label>firstname: </label>
                --firstname displayed here
            </td>
        </tr>
        <tr>
            <td><label>surname: </label>
                --surname displayed here
            </td>
        </tr>
        <tr>
            <td><label>Description: </label>
                <input type="text" name="description" value="" size="100" /></td>
        </tr>
        <tr>
            <td align="center">
                <input type="submit" value="Submit" />
                <input type="reset" value="Cancel" />
            </td>
        </tr>
    </table>
</form>