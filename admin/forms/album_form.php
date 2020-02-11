<fieldset>
    <div class="form-group">
        <label for="title">Title *</label>
          <input type="text" name="title" value="<?php echo htmlspecialchars($edit ? $album['title'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Album name" class="form-control" required="required" id = "title">
    </div> 

    <div class="form-group">
        <label for="artist">Artist *</label>
<!--        <input type="number" name="artist" value="<?php echo htmlspecialchars($edit ? $album['artist'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Last Name" class="form-control" required="required" id="artist">-->
       <select name="artist" id="artist" class="form-control">
        <?php 
        
            $result = mysqli_query($connect,"SELECT id,name FROM Artist");  
           
           if(mysqli_num_rows($result) > 0):
               while($row = mysqli_fetch_assoc($result)):
        ?>
            <option 
            <?php if($edit == 1 && $row['id'] == $album['artist']):?>
                selected=selected 
            <?php endif //value taken to database?> 
                value="<?php echo $row['id'];?>"
            >
            
            <?php echo $row['name']; ?>        
            
            </option>     
        <?php
             endwhile;
            endif;
        ?>
        
    </select>

    </div>
    <div class="form-group">
        <label for="genre">Genre *</label>
<!--        <input type="number" name="genre" value="<?php echo htmlspecialchars($edit ? $album['genre'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="genre" class="form-control" required="required" id="genre">-->
    <select name="genre" id="genre" class="form-control">
        <?php 
        
            $result = mysqli_query($connect,"SELECT id,name FROM genres");  
           
           if(mysqli_num_rows($result) > 0):
               while($row = mysqli_fetch_assoc($result)):
        ?>
            <option 
            <?php if($edit == 1 && $row['id'] == $album['genre']):?>
                selected=selected 
            <?php endif //value taken to database?> 
                value="<?php echo $row['id'];?>"
            >
            
            <?php echo $row['name']; ?>        
            
            </option>     
        <?php
             endwhile;
            endif;
        ?>
        
    </select>
    </div>
    
    <div class="form-group">
        <label for="artworkPath">Upload Artwork</label>
          <!-- <textarea name="artworkPath" placeholder="Artwork" class="form-control" id="artworkPath">
          <?php //echo htmlspecialchars(($edit) ? $album['artworkPath'] : '', ENT_QUOTES, 'UTF-8'); ?>
          </textarea> -->
          <input type="file"  name="artworkPath" class="form-control" id="artworkPath" accept="image/gif, image/jpeg, image/png" required="required">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning"  >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
