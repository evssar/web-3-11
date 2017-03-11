$(document).ready(function() {
    $('#content form').on('submit',function(e) {
	e.preventDefault();
	var $form = $(e.currentTarget),
	    $email = $form.find('#contact-email'),
	    $name = $form.find('#contact-name'),
	    $button = $form.find('button[type=submit]');
	var oReg = RegExp('^.+@.+\..+$')
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
	    $button.attr('disabled', 'disabled');
	    $button.after('<span> Сообщение как бы "отправленно". И мы скоро с вами свяжемся (наверное).</span>');
	}
    });
});
