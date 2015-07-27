<?php
$type="default";
if (isset($class) && trim($class)!="") {
    $type = $class;
}
?>
<div id="<?php print $album_wapper_id; ?>" class="dexp-album <?php print $type;?>">
    <div class="content">
        <?php print $content; ?>
    </div>
    <div class="footer"><?php print $title; ?></div>
</div>  
