<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <?php
// We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_portfolio_media']);
  hide($content['field_portfolio_categories']);
  ?>
  <div class="row">
    <div class="portfolio-thumbnail clearfix">
      <?php print render($content['field_portfolio_media']); ?>
    </div>
    <div class="portfolio-content clearfix">
      <h3 class="portfolio-title"><a href="<?php print $node_url;?>"><?php print $title;?></a></h3>
      <?php print render($content); ?>
		<hr>
		<div class="portfolio-tags">
			<?php print render($content['field_portfolio_categories']); ?>
		</div>
    </div>
  </div>
</div>