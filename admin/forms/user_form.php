<fieldset>
    <div class="form-group">
        <label for="username">Username *</label>
          <input type="text" name="username" value="<?php echo htmlspecialchars($edit ? $user['username'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Username" class="form-control" required="required" id = "username">
    </div> 

    <div class="form-group">
        <label for="firstname">First Name *</label>
          <input type="text" name="firstname" value="<?php echo htmlspecialchars($edit ? $user['firstname'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="First Name" class="form-control" required="required" id = "firstname">
    </div> 

    <div class="form-group">
        <label for="lastname">Last name *</label>
        <input type="text" name="lastname" value="<?php echo htmlspecialchars($edit ? $user['lastname'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Last Name" class="form-control" required="required" id="lastname">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
         <input type="email" name="email" value="<?php echo htmlspecialchars($edit ? $user['email'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="E-Mail Address" class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="status">status *</label>
        <input type="text" name="status" value="<?php echo htmlspecialchars($edit ? $user['Status'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Status" class="form-control" required="required" id="status">
    </div>

    

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
