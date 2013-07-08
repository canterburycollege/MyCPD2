<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/report.gif' ?>" alt="Report icon"><?= $viewModel->get('heading1'); ?></h1>



<h2>Targets</h2>
<ul>
    <?php foreach ($viewModel->get('sections') as $row): ?>
        <li><a href="../../report/allManagerStaffTargets/<?= $row->id ?>"><?= $row->description ?></a></li>
    <?php endforeach; ?>
</ul>

<h2>Activities</h2>
<ul>
    <?php foreach ($viewModel->get('sections') as $row): ?>
        <li><a href="../../report/allManagerStaffActivities/<?= $row->id ?>"><?= $row->description ?></a></li>
    <?php endforeach; ?>
</ul>

<h2>Mandatory & Contractual Training</h2>
<ul>
    <?php foreach ($viewModel->get('sections') as $row): ?>
        <li><a href="../../report/allManagerStaffMandatory/<?= $row->id ?>"><?= $row->description ?></a></li>
    <?php endforeach; ?>
</ul>