<form class="form-horizontal" id="mail-form" method="POST">
  <div class="form-group">
	   <label class="col-sm-2 control-label" for="contact-name">Имя</label>
     <div class="col-sm-10">
       <input class="form-control" type="text" name="name" id="contact-name" placeholder="Полное имя">
		</div>
  </div>
	<div class="form-group">
    <label class="col-sm-2 control-label" for="contact-email">Email</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="text" name="email" id="contact-email">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label" for="contact-subject">Тема</label>
    <div class="col-sm-10">
      <input class="form-control has-error" type="text" name="subject" id="contact-subject">
    </div>
  </div>
	<div class="form-group">
	   <label class="col-sm-2 control-label" for="contact-content">Сообщение</label>
     <div class="col-sm-10">
       <textarea class="form-control" rows="5" name="content" id="contact-content" placeholder="Введите сообщение"></textarea>
     </div>
   </div>
   <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <button class="btn btn-success" type="submit">Отправить</button>
     </div>
     <div class="col-sm-offset-2 col-sm-8">
       <?php echo isset($message) ? $message : '';?>
     </div>
   </div>
</form>
