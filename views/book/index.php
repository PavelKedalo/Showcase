<?php foreach($books as $k=>$v){?>
    <div class="element">
        <a href="<?=$link;?>/moreInfoAction/<?=$v['id_elements'];?>">
            <img src="<?=Url::getUrl();?><?=$v['path_to_the_image'];?>">
            <div class="elementText"><?=$v['name'];?></div>
        </a>
        <a href='<?=$link;?>/addToBasketAction/<?=$v['id_elements'];?>' class="addToCart"></a>
    </div>
<?php }?>