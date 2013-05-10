        <link href="../../assets/css/default.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
        <script>
            $(function() {
                $( "#target_date" ).datepicker({dateFormat: 'dd/mm/yy'});
            });
        </script>
        <div class="target">
<h2>Create a target</h2>
<?php
//Get status values
include'../../models/MyCPD.php';
$connection = new MyCPD();
$result = $connection->get_all('SELECT id,title FROM target_status;');

?>
<?php //echo validation_errors(); ?>

<form method="post" action="../../models/target.php"
<fieldset class="fieldset-auto-width">
<label for="title">Target tag</label> 
<input type="input" name="title" /><br />

<label for="title_ext">Target title</label> 
<input type="input" name="title_ext" /><br />

<label for="description">Description</label>
<textarea name="description" row="50" cols="50"></textarea><br />

<label for="target_status">Status</label>


<select name="target_status">
                    <?php foreach ($result as $row): ?>
    <option value="<?= $row['id'] ?>"> <?= $row['title'] ?> </option>

                <?php endforeach; ?>

</select>
        

<br />

<label for="target_date">Target Date</label>
<input type="text" name="target_date" id="target_date" /><br />
<br>
<input type="submit" name="submit" value="Create target" /> 
    </fieldset>  
</form>

  </div>