<?php

function dexp_shortcodes_album_shortcode_info(&$shortcodes) {
  $shortcodes['album'] = array(
      'title' => t('Album wrapper'),
      'description' => t('Album wrapper shortcode'),
      'process callback' => 'dexp_shortcodes_album',
      'tips callback' => 'dexp_shortcodes_album_tips',
  );
  $shortcodes['photo'] = array(
      'title' => t('Photo item'),
      'description' => t('Photo item shortcode'),
      'process callback' => 'dexp_shortcodes_photo',
  );
}

function dexp_shortcodes_album($attrs, $text) {
  $attrs = shortcode_attrs(array(
      'class' => '',
      'title' => '',
      ), $attrs
  );
  $attrs['content'] = $text;
  return theme('dexp_shortcodes_album', $attrs);
}

function dexp_shortcodes_album_theme(&$themes) {
  $path = drupal_get_path('module', 'dexp_shortcodes');
  $themes['dexp_shortcodes_album'] = array(
      'template' => 'album',
      'path' => $path . '/theme',
      'pattern' => 'shortcode__',
      'preprocess functions' => array(
          'template_preprocess',
          'dexp_shortcodes_preprocess_shortcode_album',
      ),
      'variables' => array(
          'class' => '',
          'title' => '',
          'content' => '',
      )
  );
  $themes['dexp_shortcodes_photo'] = array(
      'template' => 'photo',
      'path' => $path . '/theme',
      'pattern' => 'shortcode__',
      'preprocess functions' => array(
          'template_preprocess',
          'dexp_shortcodes_preprocess_shortcode_photo',
      ),
      'variables' => array(
          'image' => '',
          'group' => '',
          'content' => '',
      )
  );
}

function dexp_shortcodes_preprocess_shortcode_album(&$vars) {
  $vars['album_wapper_id'] = drupal_html_id("dexp_album_wrapper_".$_SERVER['REQUEST_TIME']);
  $vars['theme_hook_suggestions'][] = 'shortcode__album';
}

function dexp_shortcodes_photo($attrs, $text) {
  shortcode_attrs(array(
      'image'=>'',
      'group' => ''
  ), $attrs);
  $attrs['content'] = $text;
  return theme('dexp_shortcodes_photo', $attrs);
}

function dexp_shortcodes_preprocess_shortcode_photo(&$vars) {
  $vars['theme_hook_suggestions'][] = 'shortcode__photo';
}

function dexp_shortcodes_album_tips($format, $long) {
  $output = '[album class="" title=""][photo image="IMG URL" group=""]Title Image 1[/photo][photo image="IMG URL" group=""]Title Image 2[/photo][/album]';
  return $output;
}