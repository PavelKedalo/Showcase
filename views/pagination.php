<div class="pages">
    <a href="<?=$page['value']['start'];?>"><?=$page['text']['start'];?></a>
    <a href="<?=$page['value']['previous'];?>"><?=$page['text']['previous'];?></a>
    <?php for($i=0;$i<count($page['text']['pages']);$i++){?>
        <a href="<?=$page['value']['pages'][$i];?>"><?=$page['text']['pages'][$i];?></a>
    <?php }?>
    <a href="<?=$page['value']['next'];?>"><?=$page['text']['next'];?></a>
    <a href="<?=$page['value']['last'];?>"><?=$page['text']['last'];?></a>
</div>