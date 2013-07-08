<?php include_once TEMPLATEPATH . 'nav_bar.php'; ?>
<h1><img src="<?= BASEURL . '/assets/pix/report.gif' ?>" alt="Report icon"><?= $viewModel->get('heading1'); ?></h1>



<h2>Targets</h2>
<ul>
    <li> <a href ="../../report/allstaff">View all staff</a></li>
     <?php foreach ($viewModel->get('sections') as $row): ?>
                    <a href="../../report/allManagerStaffTargets/<?= $row->id ?>"><?= $row->description ?></a><br>
                <?php endforeach; ?>
</ul>

<h2>Activities</h2>
<ul>
    <li> <a href ="../../report/allstaff">View all staff</a></li>
    <li><a href='../../report/section'>View selected staff Section/Faculty</a></li>
</ul>

<h2>Mandatory & Contractual Training</h2>
<ul>
    <li> <a href ="../../report/allstaff">View all staff</a></li>
    <li><a href='../../report/section'>View selected staff Section/Faculty</a></li>
</ul>