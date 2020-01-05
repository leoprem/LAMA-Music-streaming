<fieldset>
    <div class="form-group">
        <label for="title">Title *</label>
          <input type="text" name="title" value="<?php echo htmlspecialchars($edit ? $songs['title'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Album name" class="form-control" required="required" id = "title">
    </div> 

    <div class="form-group">
        <label for="artist">Artist *</label>
        <input type="number" name="artist" value="<?php echo htmlspecialchars($edit ? $songs['artist'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Artist Name" class="form-control" required="required" id="artist">
    </div>
     <div class="form-group">
        <label for="album">Album *</label>
        <input type="number" name="album" value="<?php echo htmlspecialchars($edit ? $songs['album'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Album name" class="form-control" required="required" id="album">
    </div>
     <div class="form-group">
        <label for="language">Language *</label>
        <input type="number" name="language" value="<?php echo htmlspecialchars($edit ? $songs['language'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="language" class="form-control" required="required" id="language">
    </div>
    <div class="form-group">
        <label for="genre">Genre *</label>
        <input type="number" name="genre" value="<?php echo htmlspecialchars($edit ? $songs['genre'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="genre" class="form-control" required="required" id="genre">
    </div>
    <div class="form-group">
        <label for="duration">Duration *</label>
        <input type="text" name="duration" value="<?php echo htmlspecialchars($edit ? $songs['duration'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="duration" class="form-control" required="required" id="duration">
    </div>
    <div class="form-group">
        <label for="path">Path *</label>
        <input type="text" name="path" value="<?php echo htmlspecialchars($edit ? $songs['path'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="path" class="form-control" required="required" id="path">
    </div>
    <div class="form-group">
        <label for="albumOrder">Album Order *</label>
        <input type="number" name="albumOrder" value="<?php echo htmlspecialchars($edit ? $songs['albumOrder'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="album Order" class="form-control" required="required" id="albumOrder">
    </div>
    <div class="form-group">
         <input type="hidden" name="plays" value="<?php echo htmlspecialchars($edit ? $songs['plays'] : '0', ENT_QUOTES, 'UTF-8'); ?>" class="form-control" id="plays">
    </div>
    
    


<!--
    <div class="form-group">
        <label>Genre *</label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="male" <?php echo ($edit &&$customer['gender'] =='male') ? "checked": "" ; ?> required="required" id="male"/> Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="female" <?php echo ($edit && $customer['gender'] =='female')? "checked": "" ; ?> required="required" id="female"/> Female
        </label>
    </div>
-->

<!--
    <div class="form-group">
        <label for="artworkPath">Upload Artwork</label>
          <textarea name="artworkPath" placeholder="Artwork" class="form-control" id="artworkPath"><?php echo htmlspecialchars(($edit) ? $album['artworkPath'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>
-->
    

<!--
    <div class="form-group">
        <label>State</label>
        <?php $opt_arr = array("Maharashtra", "Kerala", "Madhya pradesh"); ?>
        <select name="state" class="form-control selectpicker" required>
            <option value=" ">Please select your state</option>
            <?php
            foreach ($opt_arr as $opt) {
                if ($edit && $opt == $customer['state']) {
                    $sel = 'selected';
                } else {
                    $sel = '';
                }
                echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
            }
            ?>
        </select>
    </div>
-->

<!--
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($edit ? $customer['email'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="E-Mail Address" class="form-control" id="email">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input name="phone" value="<?php echo htmlspecialchars($edit ? $customer['phone'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="987654321" class="form-control"  type="text" id="phone">
    </div>

    <div class="form-group">
        <label>Date of birth</label>
        <input name="date_of_birth" value="<?php echo htmlspecialchars($edit ? $customer['date_of_birth'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Birth date" class="form-control" type="date">
    </div>
-->

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>