<div id="node-<?php print $node->nid; ?>" class="portfolio-classic <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
      <div class="portfolio-thumbnail"><?php print render($content['field_portfolio_media']); ?></div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
      <h3><a href="<?php print $node_url;?>"><?php print $title;?></a></h3>
			<div class="portfolio-date"><?php print format_date($created, 'custom', 'M d, Y'); ?></div>
      <?php print render($content['body']); ?>
			<div class="portfolio-tags"><strong>Tags</strong> <?php print strip_tags(render($content['field_portfolio_categories'])); ?></div>
			<p><a class="btn btn-primary" href="<?php print $node_url; ?>"><?php print t('View Details'); ?></a></p>
    </div>
  </div>
</div>