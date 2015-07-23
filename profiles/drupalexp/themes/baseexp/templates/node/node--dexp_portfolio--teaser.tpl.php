<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php print render($title_suffix); ?>
  <?php
// We hide the comments and links now so that we can render them later.
  hide($content['comments']);
  hide($content['links']);
  hide($content['field_portfolio_media']);
  hide($content['field_portfolio_url']);
  ?>
  <div class="row">
    <div class="portfolio-thumbnail">
      <?php print render($content['field_portfolio_media']); ?>
    </div>
    <div class="portfolio-content">
      <h3 class="portfolio-title"><a href="<?php print $node_url;?>"><?php print $title;?></a></h3>
    </div>
  </div>
</div>