<h2><?=$header;?></h2>
<?php if(isset($articles)):?>
<table class="table table-striped table-bordered table-hover">
  <tbody>
    <tr>
      <th class="text-center">№</th>
     <?php foreach($fields as $value):?>
       <th class="text-center"><?=$value?></th>
     <?php endforeach;?>
       <th colspan="3" class="text-center"></th>
    </tr>
    <?php $counter = 0;?>
    <?php foreach($articles as $article):?>
    <tr>
      <td><h5 class="text-center"><?php echo ++$counter;?></h5></td>
      <?php foreach($article as $key=>$value):?>
     <td><h5 class="text-center"><?=$value;?></h5></td>
      <?php endforeach;?>
     <td class="text-center">
       <form method="POST" action="/?c=article&a=show_article">
         <input type="hidden" name="article_id" value="<?php echo $ids[$counter - 1];?>" />
         <button class="btn btn-success" type="submit">Show</button>
       </form>
     </td>
     <td class="text-center">
      <form method="POST" action="/?c=article&a=edit_article">
        <input type="hidden" name="article_id" value="<?php echo $ids[$counter - 1];?>" />
        <button class="btn btn-primary" type="submit">Edit</button>
      </form>
     </td>
     <td class="text-center">
      <form method="POST" action="/?c=article&a=delete_article">
        <input type="hidden" name="article_id" value="<?php echo $ids[$counter - 1];?>" />
        <button class="btn btn-danger" type="submit">Delete</button>
      </form>
     </td>
    </tr>
   <?php endforeach;?>
 </tbody>
</table>
<?php endif;?>
