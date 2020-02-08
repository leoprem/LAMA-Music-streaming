<fieldset>

    <div class="form-group">
        <label for="genre">Genre name *</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($edit ? $genre['name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Name" class="form-control" required="required" id="name">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
