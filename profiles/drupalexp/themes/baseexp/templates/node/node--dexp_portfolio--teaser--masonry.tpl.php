<?php
  $image = '';
  if(isset($node->field_portfolio_media[$node->language])){
    $image = file_create_url($node->field_portfolio_media[$node->language][0]['file']->uri);
  }
	$portfolio_images = field_get_items('node', $node, 'field_portfolio_media');
	$image = '';
	$path = '';
	if ($portfolio_images) {
		foreach ($portfolio_images as $k => $portfolio_image) {
			if ($k == 0) {
				$path = file_create_url($portfolio_image['file']->uri);
				$image = file_create_url($portfolio_image['file']->uri);
				if( $portfolio_image['file']->type == "video") {
					$vid = explode('://v/',$portfolio_image['file']->uri);
					if($vid[0] == "youtube") {
						$image = 'http://i1.ytimg.com/vi/'.$vid[1].'/sddefault.jpg"';
					} else {
						$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/$vid[1].php"));
						$image = $hash[0]['thumbnail_medium'];
					}
				}
			}
		}
	}
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="portfolio-item-inner" style="background-image: url(<?php print $image;?>)">
    <div class="portfolio-item-overlay">
      <div class="portfolio-item-tools">
      <a href="<?php print $node_url;?>" data-toggle="tooltip" data-original-title="<?php print t('View Details');?>" data-placement="bottom" class="view-details dtooltip"><span class="fa fa-link"></span></a>
      <a href="<?php print $path;?>" rel="lightbox" data-toggle="tooltip" data-original-title="<?php print t('View Image');?>" data-placement="bottom" class="zoom dtooltip"><span class="fa fa-expand"></span></a>
      </div>
      <a href="<?php print $node_url;?>" class="title"><?php print $title;?></a>
    </div>
  </div>
</div>