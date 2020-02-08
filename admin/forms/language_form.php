<fieldset>

    <div class="form-group">
        <label for="artist">Language*</label>
        <input type="text" name="language" value="<?php echo htmlspecialchars($edit ? $language['language'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Language" class="form-control" required="required" id="language">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
