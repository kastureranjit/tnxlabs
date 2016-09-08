<?php require 'header.php'; ?>
<div class="container">
	<div style="margin-top:25px;">
  	<a href="home/logout" style="float:right;" class="btn btn-default">logout</a>
  </div>
</div>

<div class="container">
  <h2>Please enter URL</h2> 
 <?php echo form_open('verifyurl'); ?>
    <div class="form-group">
      <label for="username">URL:</label>
      <input type="url" class="form-control" id="urlid" placeholder="Enter url" required="required">
    </div>
    <div id="results">
    </div>
    <!-- <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" required="required">
    </div>
    <button type="submit" class="btn btn-default">Submit</button> -->
  </form>

  
</div>

<?php require 'footer.php'; ?>