<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
    $(function() {
        $("#moodle_user_name").autocomplete({
           // use full url - to avoid conflict with redirect
           // note that &term= is appended
           source: BASE_URL + "index.php?controller=adminManager&action=getMoodleUsers",
           minLength: 2,
           noCache: true,
           select: function(event, ui) {
            // populate hidden field with user id
            $('#moodle_user_id').val(ui.item.id);
        }
        });
    });
</script>

<h1>Create New Manager Form</h1>
<form method="POST" action="">
    <table>
        <tr>
            <td><label>Name: </label>
                <input type="text" name="moodle_user_id" id="moodle_user_name" value="" />
                - start typing manager's firstname or surname
            </td>
        </tr>
        <tr>
            <td><label>moodle_user_id: </label>
                <input type="text" name="moodle_user_id" id="moodle_user_id" value="" />
                @todo - hidden, after testing
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