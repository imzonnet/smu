<?php
/**
* @file
* Default theme implementation to display a node.
*
* Available variables:
* - $title: the (sanitized) title of the node.
* - $content: An array of node items. Use render($content) to print them all,
* or print a subset such as render($content['field_example']). Use
* hide($content['field_example']) to temporarily suppress the printing of a
* given element.
* - $user_picture: The node author's picture from user-picture.tpl.php.
* - $date: Formatted creation date. Preprocess functions can reformat it by
* calling format_date() with the desired parameters on the $created variable.
* - $name: Themed username of node author output from theme_username().
* - $node_url: Direct URL of the current node.
* - $display_submitted: Whether submission information should be displayed.
* - $submitted: Submission information created from $name and $date during
* template_preprocess_node().
* - $classes: String of classes that can be used to style contextually through
* CSS. It can be manipulated through the variable $classes_array from
* preprocess functions. The default values can be one or more of the
* following:
* - node: The current template type; for example, "theming hook".
* - node-[type]: The current node type. For example, if the node is a
* "Blog entry" it would result in "node-blog". Note that the machine
* name will often be in a short form of the human readable label.
* - node-teaser: Nodes in teaser form.
* - node-preview: Nodes in preview mode.
* The following are controlled through the node publishing options.
* - node-promoted: Nodes promoted to the front page.
* - node-sticky: Nodes ordered above other non-sticky nodes in teaser
* listings.
* - node-unpublished: Unpublished nodes visible only to administrators.
* - $title_prefix (array): An array containing additional output populated by
* modules, intended to be displayed in front of the main title tag that
* appears in the template.
* - $title_suffix (array): An array containing additional output populated by
* modules, intended to be displayed after the main title tag that appears in
* the template.
*
* Other variables:
* - $node: Full node object. Contains data that may not be safe.
* - $type: Node type; for example, story, page, blog, etc.
* - $comment_count: Number of comments attached to the node.
* - $uid: User ID of the node author.
* - $created: Time the node was published formatted in Unix timestamp.
* - $classes_array: Array of html class attribute values. It is flattened
* into a string within the variable $classes.
* - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
* teaser listings.
* - $id: Position of the node. Increments each time it's output.
*
* Node status variables:
* - $view_mode: View mode; for example, "full", "teaser".
* - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
* - $page: Flag for the full page state.
* - $promote: Flag for front page promotion state.
* - $sticky: Flags for sticky post setting.
* - $status: Flag for published status.
* - $comment: State of comment settings for the node.
* - $readmore: Flags true if the teaser content of the node cannot hold the
* main body content.
* - $is_front: Flags true when presented in the front page.
* - $logged_in: Flags true when the current user is a logged-in member.
* - $is_admin: Flags true when the current user is an administrator.
*
* Field variables: for each field instance attached to the node a corresponding
* variable is defined; for example, $node->body becomes $body. When needing to
* access a field's raw values, developers/themers are strongly encouraged to
* use these variables. Otherwise they will have to explicitly specify the
* desired field language; for example, $node->body['en'], thus overriding any
* language negotiation rule that was previously applied.
*
* @see template_preprocess()
* @see template_preprocess_node()
* @see template_process()
*
* @ingroup themeable
*/
?>

<div id="node-<?php print $node->nid; ?>" class="grid product-teaser text-center <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
    <div class="media_element clearfix">
        <figure>
            <?php
            $terms = taxonomy_get_term_by_name('New', 'product_characteristics');
            if (!empty($terms)) {
                $first_term = array_shift($terms);
            }
				$sale = strip_tags(render($content['product:field_product_on_sale']));
				if( $sale == 1) {
					print '<span class="onsale">Sale!</span>';
				}
				if(isset($node->field_characteristics['und']) ) {
					$characters = $node->field_characteristics['und'];
					foreach ($characters as $key => $value) {
						  if ($value['tid'] == $first_term->tid) {
								print '<span class="onnew">New!</span>';
						  }
					}
				}
            ?>
				<div class="product-thumbnails">
            <?php 
				if (isset($content['product:field_product_images'][0])) {
                print '<span class="images-display"><a href="'. $node_url .'">' . render($content['product:field_product_images'][0]) . '</a></span>';
            }
				?>
				
				<?php
				if (isset($content['product:field_product_images'][1])) {
               print '<span class="image-hover"><a href="'. $node_url .'">' . render($content['product:field_product_images'][1]) . '</a></span>';
            }
            ?>
				</div>
				<div class="clearfix"></div>
        </figure>
    </div> 
    <div class="product-title">
        <h3><a title="" href="<?php print $node_url;?>"><?php print $node->title;?></a></h3>
    </div>
    
    <div class="product-price">
		<div class="product-price">
			<?php if($sale == 1) : ?>
			 <span class="price-old">
					<small><?php print strip_tags(render($content['product:commerce_price']));?></small>
			 </span>
			 <span class="price-new">
					<?php print strip_tags(render($content['product:field_product_sale_price']));?>
			 </span>
			 <?php else : ?>
				<span class="price-new">
					<?php print strip_tags(render($content['product:commerce_price']));?>
			 </span>
			 <?php endif; ?>
		</div>
		</div>
    <div class="product-add-cart">
		<?php print render($content['field_product']);?>
	 </div>
</div>
