<?php include_once TEMPLATEPATH . 'nav_bar_admin.php'; ?>

<h1>Maintain Groups Details</h1>
<div id="div_groups">
    <h2></h2>
    <table id="table_detail">
        <thead>
            <tr>
                <th>Staff name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($viewModel->get('groupDetails') as $row): ?>
                <tr>
                    <td><?= $row->description ?></td>
                    <td></td>
                    <td><a href="<?= BASEURL ?>adminManager/deleteGroupDetail/<?= $row->id ?>">Delete</a></td>
                </tr>
                <?php endforeach; ?>
        </tbody>
    </table>
    <br/>
    <a href="<?= BASEURL ?>adminManager/createGroupDetail/<?= $viewModel->get('group_id') ?>">Add Staff</a>
</div>