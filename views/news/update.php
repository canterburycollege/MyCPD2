<!--todo: Check if admin -->
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

<?php foreach ($viewModel->get('news') as $row): ?>
<?php endforeach; ?>

<form id="standard" method="post" action="">
 <fieldset class="fieldset-auto-width">          
            <legend>Update news banner</legend>
<label for="description">Banner text</label><br>
<textarea name="description" cols="100" rows="20"><?= $row->description?></textarea><br />


<input type="submit" name="submit" value="Update News" /> 
 </fieldset>   
</form>