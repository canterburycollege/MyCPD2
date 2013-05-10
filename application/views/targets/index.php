<script>
    function Deleteqry(id)
{
  if(confirm("Are you sure you want to delete this target?")==true)
           window.location="delete.php?id="+id;
    return false;
}
</script>

<?php
require_once(dirname(__FILE__) . '/../../../../config.php');

require_login();

//Database
include'../../models/MyCPD.php';
$connection = new MyCPD();
$result = $connection->get_all('SELECT * FROM v_targets_with_status;');

$context = get_context_instance(CONTEXT_SYSTEM);


// Start setting up the page
$params = array();
$PAGE->set_context($context);
$PAGE->set_url('/my/index.php', $params);


echo $OUTPUT->header();
include ('../templates/header.php');
include ('../templates/nav_bar.php');
?>
<table class="layout">
    <div id="sectiontitle"><h1><img src="../../../assets/pix/target.gif" alt="Target icon"> My Targets</h1></div>

    <hr/>

    <form>
    <div id="div_activities">

        <table id="table_detail">
            <thead>
                <tr>
                    <th>Area for development</th>
                    <th>What training is to take place</th>
                    <th>Target tag</th>
                    <th>Target title</th>
                    <th>Status</th>
                    <th>Date Due</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                    <?php foreach ($result as $row): ?>
                    <tr><td><?= $row['id'] ?></td>
                        <td><?= $row['title'] ?></td>
                        <td><?= $row['title_ext'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td><?= $row['target_date'] ?></td>
                        <td>
                            <input type="button" value="Edit" name="edit" id="edit" onclick=""/>
                             <input type="button" value="Delete" name="delete" id="delete" onclick="return Deleteqry(<?= $row['id'] ?>);"/>
                        </td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
        
 
        </form>
        <a href="create.php" onClick="wopen('.', 'popup', 533, 186);
                return false;">Add a target</a> | 
        <a href="../">Back to hub</a>
        <?php
        echo $OUTPUT->footer();



        