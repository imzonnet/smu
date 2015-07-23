<div class="facebook-teaser">
    <?php
    $link = isset($field_fb_link[0]) ? $field_fb_link[0]['value'] : '#';
    $time = isset($field_fb_time[0]) ? $field_fb_time[0]['value'] : '#';
    $desc = isset($field_fb_description[0]) ? $field_fb_description[0]['value'] : '#';
    ?>
    <a href="<?php print $link; ?>">
        <div class="description"><?php print $desc; ?></div>
        <div class="time"><?php print $time; ?></div>
    </a>
</div>