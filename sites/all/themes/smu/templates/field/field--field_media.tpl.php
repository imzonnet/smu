<?php $count = count($items); ?>
<?php if( $count <= 1):?>
<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
<?php if (!$label_hidden): ?>
<div class="field-label"<?php print $title_attributes; ?>><?php print $label ?>:&nbsp;</div>
<?php endif; ?>
<div class="field-items"<?php print $content_attributes; ?>>
<?php foreach ($items as $delta => $item): ?>
<div class="ImageWrapper  field-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>>
  <?php print render($item); ?>
  <?php $node = $element['#object'];?>
  <?php $path = file_create_url($item['#file']->uri); ?>
  
  <?php if ($element['#view_mode'] != 'full' && $node->field_type[$node->language][0]['value'] == 'fa-picture-o'):?>
  <div class="ImageOverlayH"></div>
  <div class="Buttons StyleBe1">
    <span class="WhiteRounded">
      <a href="<?php print $path;?>" title="" rel="lightbox[<?php print $node->nid; ?>]">
        <i class="fa fa-plus"></i>
      </a>
    </span>
  </div>
  <?php endif;?>
</div>
<?php endforeach; ?>
</div>
</div> 
<?php else :
  $carousel_id = drupal_html_id('dexp_carousel');
  $node = $element['#object'];
  $view_mode = $element['#view_mode'];
  $type = $node->field_type['und'][0]['value'];
?>
<div id="<?php print $carousel_id;?>" class="carousel slide dexp_carousel ImageWrapper <?php print $classes; ?>"<?php print $attributes; ?> data-ride="carousel">
  <?php if( $type == "fa-list" && $view_mode == "full" ) : ?>
	  <div class="blog-gallery row">
		 <?php foreach ($items as $delta => $item): ?>
		<?php 
			$path_full = file_create_url($item['#file']->uri); 
			$image =  array(
				'style_name' => 'portfolio', 
				'path' => $item['#file']->uri, 
				'alt' => $node->title,
            'title' => $node->title
			);
			$path = theme('image_style',$image);
		?>
		 <div class="item field-item col-md-4 col-lg-4 col-sm-6 col-xs-6">
			<?php print $path; ?>
			<div class="blog-overlay">
				<span>
					 <a href="<?php print $path_full;?>" rel="lightbox[<?php print $carousel_id; ?>]">
						  <i class="fa fa-plus"></i>
					 </a>
				</span>
			</div>
		</div>
		 <?php endforeach; ?>
	  </div>
  <?php else : ?>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php foreach ($items as $delta => $item): ?>
		 <div class="item field-item <?php print $delta == 0?'active':'';?>"<?php print $item_attributes[$delta]; ?>><?php print render($item); ?></div>
    <?php endforeach; ?>
  </div><!--carousel-inner-->
  
	<div class="ImageOverlayH"></div>
	<div class="Buttons StyleBe1">
	 <span class="WhiteRounded">
		<?php foreach ($items as $delta => $item): ?>
			<?php $path = file_create_url($item['#file']->uri); ?>
			<?php if( $delta == 0 ) : ?>
				<a href="<?php print $path; ?>" title="" rel="lightbox[<?php print $carousel_id; ?>]">
				  <i class="fa fa-plus"></i>
				</a>
			<?php else : ?>
				<a href="<?php print $path; ?>" title="" rel="lightbox[<?php print $carousel_id; ?>]" style="display: none;" ></a>
			<?php endif; ?>
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
  <!-- end slides-->
  <?php endif; ?>
</div>
<?php endif;?>