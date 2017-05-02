<h2><?=$title;?></h2>
<p>
  <?=$content;?>
</p>
<hr />
<div>
  <?php
    echo "<b>".$user_name."&copy</b> Последнее изменение ".$date;
   ?>
</div>
<div>
<hr />
  <form class="form-horizontal" id="add-comment-form" method="POST" action="/?c=article&a=add_comment">
    <div class="form-group">
      <div class="col-sm-12">
        <textarea class="form-control" rows="5" name="content" id="content" placeholder="Текст комментария"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-12">
        <button class="btn btn-success" type="submit">Комментировать</button>
      </div>
    </div>
    <input type="hidden" name="article_id" value="<?=$article_id;?>" />
  </form>
</div>
<hr />
<h3>Комментарии</h3>
<?php if(isset($comments)): ?>
<ul class="list-group">
  <?php foreach($comments as $comment):?>
    <li class="list-group-item">
      <?php echo "<b>".$comment['author']."</b> Добавлено ".$comment['date'];?>
      <p><?=$comment['content'];?></p>
    </li>
  <?php endforeach;?>
</ul>
<?php endif; ?>
