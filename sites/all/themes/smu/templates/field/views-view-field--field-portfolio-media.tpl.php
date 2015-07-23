<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>
<?php
$nid = $row->{$field->field_alias};
$node = node_load($nid);

$field = file_load($node->field_portfolio_media['und'][0]['fid']);

$thumbnail = file_create_url($field->uri);
if( $field->type == "video" ) {
	$vtype = explode("://v/", $field->uri);
	if( $vtype[0] == "youtube" ) {
		$thumbnail = 'http://i1.ytimg.com/vi/'.$vtype[1].'/default.jpg';
	} else {
		$hash = unserialize(file_get_contents("http://vimeo.com/api/v2/video/{$vtype[1]}.php"));
		$thumbnail = $hash[0]['thumbnail_small'];
	}
}
?>

<a href="<?php print drupal_get_path_alias('node/'.$nid); ?>">
	<span class="dtooltip" data-toggle="tooltip" data-placement="top" data-original-title="<?php print $node->title; ?>">
		<img src="<?php print $thumbnail; ?>" alt="" typeof="foaf:Image"/>
	</span>
</a>