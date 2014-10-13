<div class="allElementData">
    <img src="<?=Url::getUrl();?><?=$elementValue['path_to_the_image'];?>">
    <div class="text"><?=$elementValue['name'];?></div>
    <a href='<?=$link;?>/addToBasketAction/<?=$elementValue['id_elements'];?>' class="addToCart"></a>

    <?php for($i = 4; $i < count($elementValue)/2; $i++){?>
    <div class="text"><?=$elementValue[$i];?></div>
    <?php }?>
</div>