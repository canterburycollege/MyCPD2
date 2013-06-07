<?php include_once TEMPLATEPATH . 'nav_bar_admin.php'; ?>
<h1><?= $viewModel->get('heading1'); ?></h1>
<a href="<?= BASEURL ?>adminManager/viewManagers">View Managers</a><br/>
<br/>
<a href="<?= BASEURL ?>adminManager/createManager">Add Manager</a><br/>
<a href="<?= BASEURL ?>adminManager/deleteManager/<?= $row->id ?>">Remove Manager</a><br/>
<br/>
<a href="<?= BASEURL ?>adminManager/createGroup">Add Group</a><br/>
<a href="<?= BASEURL ?>adminManager/deleteGroup/<?= $row->id ?>">Remove Group</a><br/>
<a href="<?= BASEURL ?>adminManager/updateGroup/<?= $row->id ?>">Update Group</a><br/>
