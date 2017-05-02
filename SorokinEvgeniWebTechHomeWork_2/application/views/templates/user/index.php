<h2><?=$user_info['name']?></h2>
<table class="table table-striped table-bordered table-hover">
  <tbody>
  <?php foreach($user_info as $key=>$value):?>
    <tr>
      <td><h4 class="text-center"><?=$key;?></h4></td>
      <td><h4 class="text-center"><?=$value;?></h4></td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>
