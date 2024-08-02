<?php
/*
 * Plugin Name: WordPress-Plugin-OPlayer
 * Plugin URI: https://github.com/shiyiya/WordPress-Plugin-OPlayer
 * Description: Another HTML5 video player comes to WordPress
 * Version: 0.0.2
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

  $attrs = shortcode_atts(
    [
      'id' => $id,
      'live' => false,
      'autoplay' => false,
      'volume' => 0.8,
      'theme' => '#6668ab',
      'autopause' => true,
      'loop' => false,
      'screenshot' => false,
    ],
    $atts
  );

  $theme = ['primaryColor' => $atts['theme']];

  if (isset($atts['watermark'])) {
    $theme['watermark'] = [
      'src' => $atts['watermark'],
      'style' => [
        'position' => 'absolute',
        'top' => '10px',
        'right' => '10px',
        'width' => '150px',
        'height' => 'auto',
      ],
    ];
  }

  $attrs['theme'] = $theme;

  return '<div id="player' . $id . '"></div>' . "<script>__oplayers__.push(" . json_encode($attrs) . ");</script>";
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
