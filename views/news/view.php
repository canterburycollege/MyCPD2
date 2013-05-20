
<?php foreach ($viewModel->get('news') as $row): ?>
 <div class="news"><?= $row->description?></div>
<?php endforeach; ?>

