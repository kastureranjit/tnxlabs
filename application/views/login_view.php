<?php require 'header.php' ?>
<div class="container">
  <h2>Please Login to proceed</h2>
  <?php echo validation_errors(); ?>
  <?php echo form_open('verifylogin'); ?>
    <div class="form-group">
      <label for="username">Email:</label>
      <input type="text" class="form-control" id="username" placeholder="Enter username" name="username" required="required">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required="required">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>
<?php require 'footer.php' ?>