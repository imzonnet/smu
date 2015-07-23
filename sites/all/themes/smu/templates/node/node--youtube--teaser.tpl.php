<div class="youtube-teaser">
    <?php
    $link = isset($field_fb_link[0]) ? $field_fb_link[0]['value'] : '#';
    $durations = isset($field_youtube_duration[0]) ? $field_youtube_duration[0]['value'] : '#';
    $thumbnail = isset($field_youtube_thumbnail[0]) ? $field_youtube_thumbnail[0]['value'] : '#';
    ?>
    <div class="youtube-thumbnail">
        <a href="<?php print $link; ?>">
            <img src="<?php print $thumbnail; ?>" alt="<?php print $title; ?>" title="<?php print $title; ?>"/>
            <span class="duration"><?php print $durations; ?></span>
        </a>
    </div>
    <div class="youtube-content">
        <a href="<?php print $link; ?>" class="title">
            <?php print $title; ?>
        </a>
        <?php print render($content['field_youtube_count']); ?>
    </div>

</div>