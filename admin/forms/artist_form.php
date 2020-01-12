<fieldset>

    <div class="form-group">
        <label for="artist">Artist name *</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($edit ? $artist['name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Name" class="form-control" required="required" id="name">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
