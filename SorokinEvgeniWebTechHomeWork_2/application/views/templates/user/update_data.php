<?php $user = utils\Auth::user(); ?>
<h3>User id: <?=$user->id;?></h3>
<form class="form-horizontal" id="update_data" method="POST">
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-name">Имя</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" id="contact-name" name="name" value="<?=$user->name;?>" placeholder="Полное имя">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-email">Email</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="text" name="email" id="contact-email" value="<?=$user->email;?>">
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
