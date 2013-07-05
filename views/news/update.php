<script type="text/javascript" src="<?= BASEURL ?>/assets/js/DataTables/media/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function() {
        filter = $('#table_detail').dataTable({
            "bJQueryUI": true,
            "bPaginate": false,
        });
        //auto fill fiter from get for linking. 
        filter.fnFilter('<?php echo $_GET['id']; ?>');

    });
</script>
<script type="text/javascript" src="<?= BASEURL.'/assets/js/tiny_mce/tiny_mce.js'?>"></script>
<script type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        plugins : "fullpage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_buttons3_add : "fullpage"
        
});

function confirmPost()
{
var agree=confirm("Are you sure you want to delete this news item?");
if (agree)
return true ;
else
return false ;
}
</script>

<?php foreach ($viewModel->get('news') as $row): ?>
<?php endforeach; ?>

<form id="standard" method="post" action="">

            <h2>Banner text</h2>
<textarea name="description" cols="100" rows="20"><?= $row->description?></textarea><br />


<input type="submit" name="submit" value="Update banner text" />   
</form>



<br>

<div id="div_activities">
      <h2>CPD News</h2>
    <form>
        <table id="table_detail">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>News item</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewModel->get('news_items') as $row): ?>
                <tr>
                    <td id="date"><?= date("j F Y g:i a", strtotime($row->date));?></td>
                    <td id="description"> - <?= $row->description ?></td>
                                            <td><a href="../../news/updateni/<?= $row->id ?>">(Update)</a> </td>
                        <td><a href="../../news/delete/<?= $row->id ?>" onClick="return confirmPost()">(Delete)</a> </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
      <a href='../../news/add/'>Add a news item.</a>


