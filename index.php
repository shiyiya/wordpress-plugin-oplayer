<?php
/*
 * Plugin Name: OPlayer
 * Plugin URI: https://github.com/shiyiya/WordPress-Plugin-OPlayer
 * Description: Another HTML5 video player comes to WordPress
 * Version: 0.0.1
 * Author: oplayer
 * Author URI: https://oplayer.vercel.app/
 * License: GPLv3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 *
 */

// require_once(dirname(__FILE__) . '/admin.php');

add_shortcode('oplayer', 'shortcode');
add_action('wp_head', 'head');
add_action('wp_footer', 'footer');

function shortcode($atts, $content, $tag)
{
  if ($atts == null) {
    $atts = [];
  }

  if ($tag == null) {
    $tag = '';
  }

  $id = md5($_SERVER['HTTP_HOST'] . $atts['src']);

  $data = shortcode_atts(
    [
      'id' => $id,
      'src' => '',
      'title' => '',
      'poster' => '',
      'theme' => '#6668ab',
      'live' => 0,
      'autoplay' => 0,
      'autopause' => 1,
      'loop' => 0,
      'volume' => 0.8,
      'screenshot' => 0,
      'thumbnails' => '',
      'thumbnailsCount' => 0,
      'subtitle' => '',
      'watermark' => '',
    ],
    $atts
  );

  if (isset($data['watermark'])) {
    $data['watermark'] = [
      'src' => $data['watermark'],
      'style' => [
        'position' => 'absolute',
        'top' => '10px',
        'right' => '10px',
        'width' => '150px',
        'height' => 'auto',
      ],
    ];
  }

  return '<div id="player' . $id . '"></div>' . "<script>__oplayers__.push(" . wp_json_encode($data) . ");</script>";
}

function head()
{
  ?>
  <script>
    var __oplayers__ = [];
  </script>
<?php
}

function footer()
{
  wp_enqueue_script('oplayer-core', esc_url("https://cdn.jsdelivr.net/npm/@oplayer/core@latest/dist/index.ui.js"), false, 'latest', false);
  wp_enqueue_script('oplayer-plugin-hls', esc_url("https://cdn.jsdelivr.net/npm/@oplayer/hls@latest/dist/index.min.js"), false, 'latest', false);
  wp_enqueue_script('oplayer-plugin-dash', esc_url("https://cdn.jsdelivr.net/npm/@oplayer/dash@latest/dist/index.min.js"), false, 'latest', false);
  wp_enqueue_script('init-player', plugins_url('index.js', __FILE__), false, 'latest', false);
}

// function settings_link($links, $file)
// {
//   if (plugins_url('admin.php', __FILE__) === $file && function_exists('admin_url')) {
//     $settings_link = '<a href="' . esc_url(admin_url('options-general.php?page=oplayer')) . '">' . esc_html__('Settings') . '</a>';
//     array_unshift($links, $settings_link);
//   }
//   return $links;
// }
