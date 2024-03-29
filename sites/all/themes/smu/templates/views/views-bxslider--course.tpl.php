<div id="<?php print $view_id; ?>" class="dexp-bxslider-gallery">
    <?php for($i = 0; $i < count($rows); $i+=$sliderows):?>
        <div class="bxslide" id="gallery_item_<?php print $i;?>">
            <?php for($j=$i; $j<$i+$sliderows; $j++):?>
                <?php if(isset($rows[$j])) print $rows[$j];?>
            <?php endfor;?>
        </div>
    <?php endfor;?>
</div>
<div class="gallery_thumbnails hidden-sm hidden-xs"></div>
<script type="text/javascript">
    jQuery(document).ready(function($){
        var $gallery = $('#<?php print $view_id; ?>'),galleryID = $gallery.attr('id');
        var gallery_options = Drupal.settings.dexpbxsliders[galleryID];
        gallery_options.slideWidth = $gallery.width();
        gallery_options.pagerSelector = '.gallery_thumbnails';
        gallery_options.buildPager = function(slideIndex){
            var el = $('#gallery_item_'+slideIndex).find('.dexp-bxslider-gallery'),
                image = el.find('img').attr('src'),
                title = el.data('title');
            return '<h4 class="control-' + slideIndex + '">' + title + '</h4>';
        };
        $gallery.bxSlider(gallery_options);
    })
</script>