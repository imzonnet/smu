<?php
$rel="lightbox";
if (isset($group) && trim($group)!="") {
    $rel = "lightbox['$group']";
}
?>
<a class="photo-item" href="<?php print $image; ?>" title="Click to view large image" rel="<?php print $rel; ?>"><img src="<?php print $image; ?>" alt="<?php print $content; ?>" title="" /></a>