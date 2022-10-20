<?php
/*
* Plugin Name: WordPress-Plugin-OPlayer
* Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
* Description: Another HTML5 video player comes to WordPress
* Version: 0.0.1
* Author: oplayer
* Author URI: https://oplayer.vercel.app/
* License: GPLv3
* License URI: http://www.gnu.org/licenses/gpl-3.0.html
*
*/

require_once(dirname(__FILE__) . '/admin.php');

add_shortcode('oplayer', 'shortcode');
add_action('wp_head', 'head');
add_action('wp_footer', 'footer');

function shortcode($atts, $content, $tag)
{
  if ($atts == null) $atts = [];
  if ($tag == null) $tag = '';

  $atts = array_change_key_case((array)$atts, CASE_LOWER);
  $id = md5($_SERVER['HTTP_HOST'] . $atts['src']);

  $data = array(
    'id' => $id,
    'live' => false,
    'autoplay' => false,
    'primaryColor' => $atts['theme'] ? $atts['theme'] : '#FADFA3',
    'loop' => false,
    'screenshot' => false,
    'hotkey' => true,
    'preload' => 'metadata',
    'volume' => $atts['volume'] ? $atts['volume'] : 0.8,

    'src' => $atts['src'] ? $atts['src'] : '',
    'poster' => $atts['poster'] ? $atts['poster'] : '',
    'type' => $atts['type'] ? $atts['type'] : 'auto',
    'thumbnails' => $atts['thumbnails'] ? $atts['thumbnails'] : '',
    'thumbnailsCount' => $atts['thumbnailsCount'] ? $atts['thumbnailsCount'] : '',
  );

  if ($atts['autoplay']) $data['autoplay'] = ($atts['autoplay'] == 'true') ? true : false;
  if ($atts['loop']) $data['loop'] = ($atts['loop'] == 'true') ? true : false;
  if ($atts['screenshot']) $data['screenshot'] = ($atts['screenshot'] == 'true') ? true : false;
  if ($atts['hotkey']) $data['hotkey'] = ($atts['hotkey'] == 'true') ? true : false;
  if ($atts['preload']) $data['preload'] = (in_array($atts['preload'], array('auto', 'metadata', 'none')) == true) ? $atts['preload'] : 'metadata';

  $subtitle = array(
    'url' => $atts['subtitleurl'] ? $atts['subtitleurl'] : '',
    'type' => $atts['subtitletype'] ? $atts['subtitletype'] : 'webvtt',
    'fontSize' => $atts['subtitlefontsize'] ? $atts['subtitlefontsize'] : '25px',
    'bottom' => $atts['subtitlebottom'] ? $atts['subtitlebottom'] : '10%',
    'color' => $atts['subtitlecolor'] ? $atts['subtitlecolor'] : '#b7daff',
  );
  $data['subtitle'] = $subtitle;

  return '<div id="player' . $id . '"></div>' . "<script>__oplayersOptions__.push({" + json_encode($data) + "});</script>";
}

function head()
{
?>
  <script>
    var __oplayersOptions__ = [];
  </script>
<?php
}

function footer()
{
  if (get_option('enable_dash')) {
    wp_enqueue_script('dash', esc_url("https://cdn.jsdelivr.net/npm/dashjs@4.5.0/dist/dash.all.min.js"), false, '4.5.0', false);
    wp_enqueue_script('oplayer-plugin-dash', esc_url("https://cdn.jsdelivr.net/npm/@oplayer/dash@latest/dist/index.umd.js"), false, 'latest', false);
  }

  if (get_option('enable_hls')) {
    wp_enqueue_script('hls', esc_url("https://cdn.jsdelivr.net/npm/hls.js@1.2.4/dist/hls.min.js"), false, '1.2.4', false);
    wp_enqueue_script('oplayer-plugin-hls', esc_url("https://cdn.jsdelivr.net/npm/@oplayer/hls@latest/dist/index.umd.js"), false, 'latest', false);
  }

  wp_enqueue_script('hls', esc_url("https://cdn.jsdelivr.net/npm/@oplayer/core@latest/dist/index.umd.js"), false, 'latest', false);
  wp_enqueue_script('hls', esc_url("https://cdn.jsdelivr.net/npm/@oplayer/ui@latest/dist/index.umd.js"), false, 'latest', false);
  wp_enqueue_script('init-dplayer', plugins_url('index.js', __FILE__), false, 'latest', false);
}

function settings_link($links, $file)
{
  if (plugins_url('admin.php', __FILE__) === $file && function_exists('admin_url')) {
    $settings_link = '<a href="' . esc_url(admin_url('options-general.php?page=oplayer')) . '">' . esc_html__('Settings') . '</a>';
    array_unshift($links, $settings_link);
  }
  return $links;
}
