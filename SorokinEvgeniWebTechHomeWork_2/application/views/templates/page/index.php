<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Евгений Сорокин</title>
	  <link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/base.css">

    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js">
	</script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js">
	</script>
    <![endif]-->
  </head>
  <body>
    <header>
      <div class="container">
	<!-- Row 1 -->
	<div class="row">
	  <a class="brand pull-left" href="/?c=article&a=articles_list">Форум</a>
	  <ul class="list-inline list-unstyled pull-right">
	    <li>
        <a href="/?c=page&a=mail">
		      <span class="glyphicon glyphicon-envelope">
	      </a>
	    </li>
	    <li>
	      <a href="/?c=page&a=contacts">
		      <span class="glyphicon glyphicon-question-sign"></span>
	      </a>
	    </li>
	  </ul>
	</div>
      </div>
    </header>
    <section id="intro-header">
      <div class="container">
	<!-- Row 2 -->
	<div class="row">
	  <div class="wrap-headline">
	    <h1 class="text-center"><?php echo isset($title) ? $title : '';?></h1>

        <h2 class="text-center"><?php echo isset($message) ? $message : '';?></h2>

      <hr>
        <ul class="list-inline list-unstyled text-center">
        <?php if(!isset($user) || is_null($user)): ?>
          <li>
            <a id="sign-btn" class="btn btn-default btn-lg" href="/?c=user&a=sign_in" role="button">Войти</a>
          </li>
          <li>
            <a class="btn btn-primary btn-lg" href="/?c=user&a=sign_up" role="button">Регистрация</a>
          </li>';
          <?php else: ?>
          <li>
            <a id="sign-btn" class="btn btn-default btn-lg" href="/?c=user&a=sign_out" role="button">Выйти</a>
            <a id="sign-btn" class="btn btn-primary btn-lg" href="/?c=user&a=index" role="button">Кабинет</a>
          </li>';
          <?php endif; ?>
        </ul>
	  </div>
	</div>
      </div>
    </section>
    <footer>
      <div class="container">
	<div class="row">
	  <div class="col-sm-2">
	    <img src="imgs/logo.png" class="img-responsive">
	  </div>
	  <div class="col-sm-2">
	    <h5>Деятельность</h5>
	    <ul class="list-unstyled">
	      <li><a href="/?c=article&a=articles_list">Форум</a></li>
	    </ul>
	  </div>
	  <div class="col-sm-2">
	    <h5>Социальные сети</h5>
	    <ul class="list-unstyled">
	      <li><a href="https://ru-ru.facebook.com/">Facebook</a></li>
	      <li><a href="https://twitter.com/">Twitter</a></li>
	      <li><a href="https://vk.com/">VKontakte</a></li>
	    </ul>
	  </div>
	  <div class="col-sm-2">
	    <h5>Поддержка</h5>
	    <ul class="list-unstyled">
	      <li><a href="/?c=page&a=contacts">Контакты</a></li>
	      <li><a href="/?c=page&a=mail">Написать сообщение</a></li>
	    </ul>
	  </div>
	  <div class="col-sm-4">
	    <address>
	      <strong>Сорокин Евгений &copy;</strong><br/>
	      Республика Мордовия г. Саранск<br/>
	      <abbr title="Электронная почта">Email:</abbr> evssar@yandex.ru<br/>
	      <abbr title="Телефон">Тел.:</abbr> +7(927) 000-0000
	    </address>
	  </div>
	</div>
      </div>
    </footer>
	<script src="js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
