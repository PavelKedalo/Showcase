<?php foreach($elementsInBasket as $k=>$v){?>
    <div class="elementBasket">
        <a href="<?=$link;?>/moreInfoAction/<?=$v['id_elements'];?>/<?=$v['id_category'];?>">
            <img src="<?=Url::getUrl();?><?=$v['path_to_the_image'];?>">
            <div class="elementTextBasket"><?=$v['name'];?></div>
        </a>
        <div class="shortDescription"><?=$v['short_description'];?></div>
    </div>
<?php }?>