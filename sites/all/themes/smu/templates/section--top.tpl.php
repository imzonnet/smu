<!--#<?php print $html_id;?>--><?php print PHP_EOL;?>
<section <?php print $attributes;?>>
    <div id="global-nav-content" >
        <div class="<?php print $container_class;?>">
            <div class="row">
                <?php print $content; ?>
            </div>
        </div>
        <div class="<?php print $container_class;?>">
            <div class="row">
                <div id="global-nav-home"><a href="http://www.smu.edu.sg" target="_blank">SMU Home</a></div>
            </div>
        </div>
    </div>
    <div id="global-nav-tab-wrapper" class="<?php print $container_class;?>">
        <div id="global-nav-tab">Main Menu</div>
    </div>
</section>
<!--END #<?php print $html_id;?>--><?php print PHP_EOL;?>
