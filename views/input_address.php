<?php
require_once (__DIR__ . '/../config/constants.php');
?>
<label for="title">Addresse :</label>
<input type="text" class="form-control" id="address" name="address" pattern="<?= REGEXP_TITLE ?>" required>
<small><?= $errors['title']  ?? '' ?></small>