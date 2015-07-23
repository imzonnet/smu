<?php
$type = array(
	'image' => 'fa fa-share-square-o',
	'video' => array(
		'video/vimeo' => 'fa fa-caret-square-o-right',
		'video/youtube' => 'fa fa-caret-square-o-right',
	)
);
$view_mode = $element['#view_mode'];
?>
<?php if(count($items) <= 1): ?>
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
<?php if (!$label_hidden): ?>
	<div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
<?php endif; ?>
<div class="field-items"<?php print $content_attributes; ?>>

	<?php foreach ($items as $delta => $item): ?>
		<?php
			$path_media = file_create_url($item['#file']->uri);
			$filetype = $item['#file']->type;
			$filemime = $item['#file']->filemime;
			
			$lightboxrel = drupal_html_id('lightbox');
			$rel = "lightbox[$lightboxrel]";
			$thumbnail = render($item);

			$icon = $type[$filetype];
			if($filetype == "video" && $view_mode != "full") {
				$icon = $icon[$filemime];
				$vid = explode('://v/',$item['#file']->uri);
				$rel = "lightframe[$lightboxrel]";
				if($vid[0] == "youtube") {
					$path_media = "//www.youtube.com/v/{$vid[1]}";
				} else {
					$path_media = "//player.vimeo.com/video/{$vid[1]}";
				}
			}
		?>
		<div class="field-item field-type-<?php print $filetype; ?> <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>><?php print $thumbnail; ?></div>
		<?php if($view_mode != "full") : ?>
		<div class="portfolio-overlay">
			<span class="WhiteRounded">
				 <a href="<?php print $path_media;?>" rel="<?php print $rel; ?>">
					  <i class="<?php print $icon; ?>"></i>
				 </a>
			</span>
		</div>
		<?php endif; ?>
		
	<?php endforeach; ?>
</div>
</div> 
<?php else:
  $carousel_id = drupal_html_id('dexp_carousel');
?>
<div id="<?php print $carousel_id;?>" class="carousel slide dexp_carousel <?php print $classes; ?>"<?php print $attributes; ?> data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php foreach ($items as $delta => $item): ?>
    <div class="item field-item <?php print $delta == 0?'active':'';?>"<?php print $item_attributes[$delta]; ?>><?php print render($item); ?></div>
    <?php endforeach; ?>
  </div>
	<div class="portfolio-overlay">
		<span class="WhiteRounded">
		  <?php 
			$lightboxrel = drupal_html_id('lightbox');
			foreach ($items as $delta => $item): 
				$path_media = file_create_url($item['#file']->uri);
			?>
			 <a href="<?php print $path_media;?>" rel="lightbox[<?php print $lightboxrel;?>]" <?php print $delta == 0 ? '':' style="display: none;"';?>>
				 <?php print $delta == 0 ? '<i class="fa fa-search-plus"></i>':'';?>
			 </a>
		<?php endforeach; ?>
		</span>
	</div>
  <!-- Controls -->
  <a class="left carousel-control" href="#<?php print $carousel_id;?>" data-slide="prev">
    <span class="fa fa-angle-left"></span>
  </a>
  <a class="right carousel-control" href="#<?php print $carousel_id;?>" data-slide="next">
    <span class="fa fa-angle-right"></span>
  </a>
</div>
<?php endif;?>