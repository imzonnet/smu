<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['body']);

    $lightboxrel = 'portfolio_' . $nid;
    $portfolio_images = field_get_items('node', $node, 'field_portfolio_media');
    $first_image = '';
    if ($portfolio_images) {
      foreach ($portfolio_images as $k => $portfolio_image) {
        if ($k == 0) {
          $first_image = file_create_url($portfolio_image['file']->uri);
        } else {
          $image_path = file_create_url($portfolio_image['file']->uri);
          print '<a href="' . $image_path . '" rel="lightbox[' . $lightboxrel . ']" style="display:none">&nbsp;</a>';
        }
      }
    }
    ?>
    <div class="portfolio-thumbnail">
      <?php print render($content['field_portfolio_media']); ?>
    </div>
	 <div class="portfolio-title">
		<a href="<?php print $node_url; ?>" class="title"><?php print $title; ?></a>
	 </div>
  </div>
</div> 