<?php $user = utils\auth::user(); ?>
<h3>User id: <?=$user->id;?></h3>
<form class="form-horizontal" id="update_password" method="POST">
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-password">New password</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="password" name="psswrd" id="contact-password">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-confirm">Confirm new password</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="password" name="confirm_psswrd" id="contact-confirm">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <a href="/?c=user&a=index" class="btn btn-success btn-block">Cancel</a>
    </div>
    <div class="col-sm-8">
      <button class="btn btn-success" type="submit">Update</button>
    </div>
  </div>
</form>
