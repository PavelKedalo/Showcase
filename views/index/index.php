<div class="tape">
    <h2>Новые книги</h2>
    <?php foreach($books as $k=>$v){?>
        <div class="elementInMain">
            <a href="<?=$link;?>/moreInfoAction/<?=$v['id_elements'];?>/<?=$v['id_category'];?>">
                <img src="<?=Url::getUrl();?><?=$v['path_to_the_image'];?>">
                <div class="elementText"><?=$v['name'];?></div>
            </a>
        </div>
    <?php }?>
</div>
<div class="tape">
    <h2>Новые периодические издания</h2>
    <?php foreach($periodicals as $k=>$v){?>
        <div class="elementInMain">
            <a href="<?=$link;?>/moreInfoAction/<?=$v['id_elements'];?>/<?=$v['id_category'];?>">
                <img src="<?=Url::getUrl();?><?=$v['path_to_the_image'];?>">
                <div class="elementText"><?=$v['name'];?></div>
            </a>
        </div>
    <?php }?>
</div>
<div class="tape">
    <h2>Новые фотографии</h2>
    <?php foreach($photos as $k=>$v){?>
        <div class="elementInMain">
            <a href="<?=$link;?>/moreInfoAction/<?=$v['id_elements'];?>/<?=$v['id_category'];?>">
                <img src="<?=Url::getUrl();?><?=$v['path_to_the_image'];?>">
                <div class="elementText"><?=$v['name'];?></div>
            </a>
        </div>
    <?php }?>
</div>