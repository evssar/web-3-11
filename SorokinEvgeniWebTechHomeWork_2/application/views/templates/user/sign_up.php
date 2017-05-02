<form class="form-horizontal" id="registration" method="POST">
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-name">Имя</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" id="contact-name" name="name" placeholder="Полное имя"  value="<?php echo isset($_POST['name']) ? $_POST['name'] : '';?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-email">Email</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="text" name="email" id="contact-email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '';?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-password">Password</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="password" name="psswrd" id="contact-password">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-confirm">Confirm password</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="password" name="confirm_psswrd" id="contact-confirm">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <a href="/?c=page&a=index" class="btn btn-success btn-block">Cancel</a>
    </div>
    <div class="col-sm-8">
      <button class="btn btn-success" type="submit">Sign up</button>
    </div>
    <div class="col-sm-offset-2 col-sm-8">
      <?php echo isset($message) ? $message : '';?>
    </div>
  </div>
</form>
