<form class="form-horizontal" method="POST">
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-email">Email</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="text" name="email" id="contact-email">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-password">Password</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="password" name="password" id="contact-password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-2">
      <a href="/?c=page&a=index" class="btn btn-success btn-block">Cancel</a>
    </div>
    <div class="col-sm-8">
      <button class="btn btn-success" type="submit">Sign in</button>
    </div>
    <div class="col-sm-offset-2 col-sm-8">
      <?php echo isset($message) ? $message : '';?>
    </div>
  </div>
</form>
