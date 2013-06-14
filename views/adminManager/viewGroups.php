<?php include_once TEMPLATEPATH . 'nav_bar_admin.php'; ?>
<?php $manager = $viewModel->get('manager'); ?>

<h1>Maintain Manager Groups</h1>
<div id="div_groups">
    <table id="table_detail">
        <thead>
            <tr>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewModel->get('groups') as $row): ?>
                <tr>
                    <td><?= $row->description ?></td>
                    <td><a href="<?= BASEURL ?>adminManager/updateGroup/<?= $row->id ?>">Update</a> 
                        | 
                        <a href="<?= BASEURL ?>adminManager/deleteGroup/<?= $row->id ?>">Delete</a>
                        | 
                        <a href="<?= BASEURL ?>adminManager/viewGroups/<?= $row->id ?>">View Groups</a> 
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br/>
    <a href="<?= BASEURL ?>adminManager/createGroup/<?= $manager->id ?>">Add New Group</a>
</div>