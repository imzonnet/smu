<?php
$url = file_create_url($field_course_image[0]['uri']);
?>
<div class="dexp-bxslider-gallery" data-title="<?php print $title; ?>" style="background-image: url('<?php print $url; ?>');">
    <div class="description">
        <h2 class="title"><?php print $title; ?></h2>
        <?php print render($content['body']); ?>
    </div>
</div>