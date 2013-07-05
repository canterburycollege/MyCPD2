
<script type="text/javascript" src="<?= BASEURL.'/assets/js/tiny_mce/tiny_mce.js'?>"></script>
<script type="text/javascript">
tinyMCE.init({
        theme : "advanced",
        mode : "textareas",
        plugins : "fullpage",
        theme_advanced_toolbar_location : "top",
        theme_advanced_buttons3_add : "fullpage"
        
});

</script>

<?php foreach ($viewModel->get('news_items') as $row): ?>
<?php endforeach; ?>

<form id="standard" method="post" action="">

 
<textarea name="description" cols="100" rows="20"><?= $row->description?></textarea><br />


<input type="submit" name="submit" value="Update news item" />   
</form>