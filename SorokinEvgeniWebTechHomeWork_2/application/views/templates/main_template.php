<?php $user = utils\Auth::user(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Написать письмо</title>
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

    <section id="intro-header">
      <div class="container">
	<!-- Row 2 -->
	<div class="row">
	  <div class="col-sm-12">
	    <h1><?php echo is_null($user) ? "Default user" : $user->name;?></h1>
	    <h2>Страница пользователя</h2>
	  </div>
	</div>
      </div>
    </section>
    <div class="container">
      <nav class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">

	</div>

	<ul class="nav navbar-nav">
	  <li>
        <a href="/?c=user&a=index">Личный кабинет</a>
	  </li>
	  <li>
	    <a href="/?c=article&a=articles_list">Форум</a>
	  </li>
    <li class="dropdown">
	    <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Поддержка<span class="caret"></span></a>
      <ul class="dropdown-menu" aria-labelledby="dLabel">
	      <li><a href="/?c=page&a=contacts">Контакты</a></li>
	      <li><a href="/?c=page&a=mail">Написать сообщение</a></li>
	    </ul>
	  </li>
	</ul>
	<ul class="nav navbar-nav navbar-right" style="padding-right: 1em;">
	  <li>
      <a href="/?c=page&a=index">
	      <span class="glyphicon glyphicon-home"></span>
	    </a>
	  </li>
	  <li><a href="/?c=page&a=mail">
	      <span class="glyphicon glyphicon-envelope"></span>
	    </a>
	  </li>
	  <li>
	    <a href="/?c=page&a=contacts">
	      <span class="glyphicon glyphicon-question-sign"></span>
	    </a>
	  </li>
	</ul>

      </nav>
    </div>
    <section id="content">
      <div class="container">
	<!-- Row 3 -->
	<div class="row">
	  <div class="col-sm-2" id="content-bar">
	    <?php if(!is_null($left_menu_template)) include $this->path.$left_menu_template.'.php'; ?>
	  </div>
	  <div class="col-sm-8" id="content">
      <?php include $this->path.$content_template.'.php'; ?>
	  </div>
	  <div class="col-sm-2" id="news">
	    <div class="panel panel-default">
	      <div class="panel-heading">Ведётся разработка смартфона YotaPhone 3 )))</div>
	      <div class="panel-body text-justify">Информация о готовящемся девайсе появилась на официальной странице компании в "Инстаграме". В комментариях к очередному посту пользователи соцсети спросили, выйдет ли YotaPhone 3. В ответ на это разработчики заявили, что YotaPhone 3 уже на стадии разработки.</div>
	    </div>
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
	<div class="modal fade" id="wnd-modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-lable="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title">Внимание</h4>
				</div>
				<div class="modal-body">
					Вы ввели неправильный Email. Попробуйте снова.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">
						Ok
					</button>
				</div>
			</div>
		</div>
	</div>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/main.js"></script>
  </body>
</html>
