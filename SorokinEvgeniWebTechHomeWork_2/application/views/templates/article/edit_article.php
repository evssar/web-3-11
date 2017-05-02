<form class="form-horizontal" id="article-edit-form" method="POST">
  <div class="form-group">
	   <label class="col-sm-2 control-label" for="title">Заголовок</label>
     <div class="col-sm-10">
       <input class="form-control" type="text" name="title" id="title" placeholder="Заголовок" value="<?php echo isset($title) ? $title : '';?>" />
		</div>
  </div>
	<div class="form-group">
	   <label class="col-sm-2 control-label" for="content">Текст статьи</label>
     <div class="col-sm-10">
       <textarea class="form-control" rows="5" name="content" id="content" placeholder="Текст статьи"><?php echo isset($content) ? $content : '';?></textarea>
     </div>
   </div>
   <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <button class="btn btn-success" type="submit">Сохранить</button>
     </div>
   </div>
   <input type="hidden" name="article_id" value="<?php echo isset($article_id) ? $article_id : '';?>" />
</form>
