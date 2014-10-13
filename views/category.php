<h3>Категории:</h3>
<?php foreach($categories as $k=>$v){?>
    <div class="category"><a href='<?=Url::getUrl();?><?=$v['name']?>'><?=$v['name'];?></a></div>
<?php }?>