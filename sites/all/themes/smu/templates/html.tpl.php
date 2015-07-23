<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1">
		<?php print $head; ?>
		<title><?php print $head_title; ?></title>
		<?php print $styles; ?>
		<?php print $scripts; ?>
	</head>
    
	<body class="<?php print $classes; ?>" <?php print $attributes;?>>
		<div id="skip-link">
		<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
		</div>
		<?php print $page_top; ?>
		<?php print $page; ?>
		<?php print $page_bottom; ?>
        <script>
            (function() {
                var cx = '012439418490868093774:pebtywrnd3q';
                var gcse = document.createElement('script');
                gcse.type = 'text/javascript';
                gcse.async = true;
                gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                '//cse.google.com/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(gcse, s);
            })();
        </script>
        <!-- UserVoice JavaScript SDK (only needed once on a page) -->
        <script>(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/KGtedFfw3MYPrBw5SHhbw.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})()</script>

        <!-- A tab to launch the Classic Widget -->
        <script>
            UserVoice = window.UserVoice || [];
            UserVoice.push(['showTab', 'classic_widget', {
                mode: 'feedback',
                primary_color: '#aaaaaa',
                link_color: '#2f3752',
                forum_id: 203798,
                tab_label: 'Feedback',
                tab_color: '#aaaaaa',
                tab_position: 'bottom-right',
                tab_inverted: false
            }]);
        </script>
    </body>
</html>