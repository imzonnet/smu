<div id="node-<?php print $node->nid; ?>" class="portfolio-detail <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content row"<?php print $content_attributes; ?>>
    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
      <?php print render($content['field_portfolio_media']); ?>
    </div>
	
    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 portfolio-content"> 
      <h4 class="title"><?php print t('About Project');?></h4>
      <?php print render($content['body']); ?>
			<div class="portfolio-date">
				<h4><?php print t('Posted on'); ?></h4>
				<span><?php print format_date( $created, 'custom', 'M d, Y' ); ?></span>
			</div>
			<div class="portfolio-client">
				<h4><?php print t('Client'); ?></h4>
				<span><?php print strip_tags(render($content['field_portfolio_client'])); ?></span>
			</div>
			<div class="portfolio-url">
					<?php print render($content['field_portfolio_url']); ?>
			</div>
			<div class="social-icons clearfix">
				<ul class="list-unstyled">
					<li class="social-dribbble"><a title="Dribbble" target="_blank" href="#"><i class="fa fa-dribbble"></i></a></li>
					<li class="social-pinterest"><a title="Pinterest" target="_blank" href="#"><i class="fa fa-pinterest"></i></a></li>
					<li class="social-googleplus"><a title="Google plus" target="_blank" href="#"><i class="fa fa-google-plus"></i></a></li>
					<li class="social-twitter"><a title="Twitter" target="_blank" href="http://www.twitter.com/envato"><i class="fa fa-twitter"></i></a></li>
					<li class="social-facebook"><a title="Facebook" target="_blank" href="#"><i class="fa fa-facebook"></i></a></li>
				</ul>
			</div>
    </div>
	 
  </div>
  <?php print render($content['links']); ?>
  <?php print render($content['comments']); ?>
</div>