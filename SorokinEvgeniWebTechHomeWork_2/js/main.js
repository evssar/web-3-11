$(document).ready(function() {
    $('#content form#registration').submit(function() {
	    var $form = $('#content form#registration'),
	    $email = $form.find('#contact-email'),
	    $name = $form.find('#contact-name'),
      $password = $form.find('#contact-password'),
      $confirm = $form.find('#contact-confirm'),
	    $button = $form.find('button[type=submit]');
      var oReg = RegExp('^.+@.+\..+$');
      $form.find('.form-group').removeClass('has-error').removeClass('has-success');
      if(oReg.exec($email.val()) == null) {
	       $email.closest('.form-group').addClass('has-error');
	        $('#wnd-modal .modal-body').html('Вы ввели неправильный Email <strong>(' + $email.val() + ')</strong>. Попробуйте снова');
	        $('#wnd-modal').modal();
      }
	    else if ($name.val() == "") {
	       $name.closest('.form-group').addClass('has-error');
	        $('#wnd-modal .modal-body').html('Укажите свое имя')
	        $('#wnd-modal').modal();
	    }
      else if ($password.val() != $confirm.val()) {
	       $password.closest('.form-group').addClass('has-error');
         $confirm.closest('.form-group').addClass('has-error');
	       $('#wnd-modal .modal-body').html('Пароли не совпадают')
	       $('#wnd-modal').modal();
	    }
	    else {
	       $form.find('.form-group').removeClass('has-error').addClass('has-success');
	       return true;
	    }
      return false;
    });
    $('#content form#update_data').submit(function() {
      var $form = $('#content form#update_data'),
      $email = $form.find('#contact-email'),
      $name = $form.find('#contact-name'),
      $button = $form.find('button[type=submit]');
      var oReg = RegExp('^.+@.+\..+$');
      $form.find('.form-group').removeClass('has-error').removeClass('has-success');
      if(oReg.exec($email.val()) == null) {
         $email.closest('.form-group').addClass('has-error');
          $('#wnd-modal .modal-body').html('Вы ввели неправильный Email <strong>(' + $email.val() + ')</strong>. Попробуйте снова');
          $('#wnd-modal').modal();
      }
      else if ($name.val() == "") {
         $name.closest('.form-group').addClass('has-error');
          $('#wnd-modal .modal-body').html('Укажите свое имя')
          $('#wnd-modal').modal();
      }
      else {
         $form.find('.form-group').removeClass('has-error').addClass('has-success');
         return true;
      }
      return false;
    });
    $('#content form#update_password').submit(function() {
      var $form = $('#content form#update_password'),
      $password = $form.find('#contact-password'),
      $confirm = $form.find('#contact-confirm'),
      $button = $form.find('button[type=submit]');
      if ($password.val() != $confirm.val()) {
         $password.closest('.form-group').addClass('has-error');
         $confirm.closest('.form-group').addClass('has-error');
         $('#wnd-modal .modal-body').html('Пароли не совпадают')
         $('#wnd-modal').modal();
      }
      else {
         $form.find('.form-group').removeClass('has-error').addClass('has-success');
         return true;
      }
      return false;
    });
    $('#content form#article-edit-form').submit(function() {
      var $form = $('#content form#article-edit-form'),
      $title = $form.find('#title'),
      $content = $form.find('#content'),
      $button = $form.find('button[type=submit]');
      $form.find('.form-group').removeClass('has-error').removeClass('has-success');

      if ($title.val() == "") {
         $title.closest('.form-group').addClass('has-error');
         $('#wnd-modal .modal-body').html('Введите заголовок')
         $('#wnd-modal').modal();
      } else if ($content.val() == "")
      {
         $content.closest('.form-group').addClass('has-error');
         $('#wnd-modal .modal-body').html('Содержание отсутствует')
         $('#wnd-modal').modal();
      }
      else {
         $form.find('.form-group').removeClass('has-error').addClass('has-success');
         return true;
      }
      return false;
    });
    $('#content form#add-comment-form').submit(function() {
      var $form = $('#content form#add-comment-form'),
      $content = $form.find('#content'),
      $button = $form.find('button[type=submit]');
      $form.find('.form-group').removeClass('has-error').removeClass('has-success');
      if ($content.val() == "")
      {
         $content.closest('.form-group').addClass('has-error');
         $('#wnd-modal .modal-body').html('Содержание комментария отсутствует')
         $('#wnd-modal').modal();
      }
      else {
         $form.find('.form-group').removeClass('has-error').addClass('has-success');
         return true;
      }
      return false;
    });
    $('#content form#mail-form').submit(function() {
	    var $form = $('#content form#mail-form'),
	    $email = $form.find('#contact-email'),
	    $name = $form.find('#contact-name'),
      $theme = $form.find('#contact-subject'),
      $content = $form.find('#contact-content'),
	    $button = $form.find('button[type=submit]');
      var oReg = RegExp('^.+@.+\..+$');
      $form.find('.form-group').removeClass('has-error').removeClass('has-success');
      if(oReg.exec($email.val()) == null) {
	       $email.closest('.form-group').addClass('has-error');
	        $('#wnd-modal .modal-body').html('Вы ввели неправильный Email <strong>(' + $email.val() + ')</strong>. Попробуйте снова');
	        $('#wnd-modal').modal();
      }
	    else if ($name.val() == "") {
	       $name.closest('.form-group').addClass('has-error');
	        $('#wnd-modal .modal-body').html('Укажите свое имя')
	        $('#wnd-modal').modal();
	    }
      else if ($content.val() == "") {
	       $content.closest('.form-group').addClass('has-error');
	       $('#wnd-modal .modal-body').html('Введите сообщение')
	       $('#wnd-modal').modal();
	    }
      else if ($theme.val() == "") {
	       $theme.closest('.form-group').addClass('has-error');
	       $('#wnd-modal .modal-body').html('Не указана тема письма')
	       $('#wnd-modal').modal();
	    }
	    else {
	       $form.find('.form-group').removeClass('has-error').addClass('has-success');
	       return true;
	    }
      return false;
    });
});
