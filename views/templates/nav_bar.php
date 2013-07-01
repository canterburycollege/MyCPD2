<?php require("models/navigation.php"); ?>
<table class='layout'>
    <tr>
        <td class='layout'>
            <a href="<?= BASEURL ?>hub/view/">Hub</a> 
            | <a href="<?= BASEURL ?>target/view/">Targets</a>
            | <a href="<?= BASEURL ?>activity/view/">Activities</a>
            | <a href="<?= BASEURL ?>mandatory/view/">Mandatory & Contractual Training</a>
        <?php if (isManager($USER) == TRUE) echo  "| <a href='".BASEURL."report/view/'>Reports</a>"; ?>
        <?php if (isAdmin($USER) == TRUE) echo  "| <a href='".BASEURL."admin/viewManagers'>Admin</a>"; ?>
        </td>
    </tr>
</table>