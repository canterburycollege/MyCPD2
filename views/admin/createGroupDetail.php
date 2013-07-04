<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
    $(function() {
        $("#displayname").autocomplete({
           // use full url - to avoid conflict with routing
           // note that &term= is appended
           source: BASE_URL + "index.php?controller=admin&action=ajaxStaffList",
           minLength: 2,
           noCache: true,
           select: function(event, ui) {
            // populate hidden field with user id
            $('#moodle_user_id').val(ui.item.id);
        }
        });
    });
</script>

<h1>Add Staff Member to Group Form</h1>
<h2><?= 'staffMember->displayname' ?></h2>
<form method="POST" action="">
    <!-- hidden field populated after autcomplete is selected -->
    <input type="hidden" name="moodle_user_id" id="moodle_user_id" value="" />
    <table>
        <tr>
            <td><label>Name: </label>
                <input type="text" name="displayname" id="displayname" value="" />
                - start typing staff member's firstname or surname
            </td>
        </tr>
        <tr>
            <td align="center">
                <input type="submit" value="Submit" />
                <input type="reset" value="Cancel" onClick="history.go(-1);return true;"/>
            </td>
        </tr>
    </table>
</form>