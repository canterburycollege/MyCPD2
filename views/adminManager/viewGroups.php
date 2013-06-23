<?php include_once TEMPLATEPATH . 'nav_bar_admin.php'; ?>
<?php $manager = $viewModel->get('manager'); ?>

<h1>Maintain Manager Groups</h1>
<div id="div_groups">
    <h2><?= $manager->displayname ?></h2>
    <table id="table_detail">
        <thead>
            <tr>
                <th>Section</th>
                <th>Description</th>
                <th>No. of Staff</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewModel->get('groups') as $row): ?>
                <tr>
                    <td><?= $row->section ?></td> 
                    <td><?= $row->description ?></td>
                    <td><?= $row->num_of_staff ?></td>
                    <td><a href="<?= BASEURL ?>adminManager/updateGroup/<?= $row->id ?>">Update</a> 
                        | 
                        <a href="<?= BASEURL ?>adminManager/deleteGroup/<?= $row->id ?>">Delete</a>
                        | 
                        <a href="<?= BASEURL ?>adminManager/viewGroupDetails/<?= $row->id ?>">View Staff</a> 
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br/>
    <a href="<?= BASEURL ?>adminManager/createGroup/<?= $manager->id ?>">Add New Group</a>
</div>