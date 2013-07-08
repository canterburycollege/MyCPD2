<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/report.gif' ?>" alt="Report icon"><?= $viewModel->get('heading1'); ?></h1>
<script type="text/javascript" src="<?= BASEURL ?>/assets/js/DataTables/media/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
        filter = $('#table_detail').dataTable({
            "bJQueryUI": true,
             "bPaginate": false,
        });
        //auto fill fiter from get for linking. 
        filter.fnFilter('');
       
    });

function confirmPost()
{
var agree=confirm("Are you sure you want to delete this target?");
if (agree)
return true ;
else
return false ;
}

</script>
 
<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h2><img src="<?= BASEURL . '/assets/pix/target.gif' ?>" alt="Target icon">All Staff Targets - <?php foreach ($viewModel->get('section') as $row): ?><?= $row->description ?> <?php endforeach; ?></h2>
<div id="div_activities">
    <form>
        <table id="table_detail">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Target tag</th>
                    <th>Target title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Date Due</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($viewModel->get('targets') as $row): ?>
                    <tr>
                        <td><?= $row->firstname ?> <?= $row->lastname ?></td>
                        <td><?= $row->title ?></td>
                        <td><?= $row->title_ext ?></td>
                        <td><?= $row->description ?></td>
                        <td><?= $row->status ?></td>
                        <td><?= $row->target_date ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>