<?php include_once TEMPLATEPATH . 'nav_bar_admin.php'; ?>

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
                    <td><a href="<?= BASEURL ?>adminManager/updateGroup/<?= $row->moodle_user_id ?>">Update</a> 
                        | 
                        <a href="<?= BASEURL ?>adminManager/deleteGroup/<?= $row->moodle_user_id ?>">Delete</a>
                        | 
                        <a href="<?= BASEURL ?>adminManager/viewGroups/<?= $row->moodle_user_id ?>">View Groups</a> 
                    </td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br/>
    <a href="<?= BASEURL ?>adminManager/createGroup/">Add New Group</a>
</div>