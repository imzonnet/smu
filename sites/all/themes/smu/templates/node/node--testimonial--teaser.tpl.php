<div class="testimonial-teaser">
    <div class="testimonial-teaser-image">
        <?php print render($content['field_testimonial_image']); ?>
    </div>
    <div class="testimonial-teaser-content">
        <h2 class="title"><?php print $title ;?></h2>
        <?php if( $field_testimonial_job ) : ?>
        <div class="job"><?php print render($content['field_testimonial_job']); ?></div>
        <?php endif; ?>
        <?php if( $field_testimonial_job2 ) : ?>
        <div class="job"><?php print render($content['field_testimonial_job2']); ?></div>
        <?php endif; ?>
        <?php print render($content['body']); ?>
    </div>
</div>