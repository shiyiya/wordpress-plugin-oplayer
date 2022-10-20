<?php

$admin_tags = array(
  'input' => array(
    'type' => array(),
    'name' => array(),
    'id' => array(),
    'disabled' => array(),
    'value' => array(),
    'checked' => array(),
  ),
);

if (is_admin()) {
  add_options_page('OPlayer', 'OPlayer', 'manage_options', 'oplayer', 'plugin_options_menu');
}

function plugin_options_menu()
{
  if (!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }

  table_head();

  // save options if this is a valid post
  if (
    isset($_POST['oplayer_save_field']) && // input var okay
    wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['oplayer_save_field'])), 'oplayer_save_action') // input var okay
  ) {
    echo "<div class='updated settings-error' id='setting-error-settings_updated'><p><strong>Settings saved.</strong></p></div>\n";
    admin_save();
  }

  $enable_hls = '';
  if (get_option('enable_hls')) {
    $enable_hls = 'checked="true"';
  }
  admin_table_row(
    'Enable hls.js',
    'Live Video (HTTP Live Streaming, M3U8 format) support',
    "<input type='checkbox' name='enable_hls' id='enable_hls' value='1' $enable_hls />",
    'enable_hls'
  );

  $enable_dash = '';
  if (get_option('enable_dash')) {
    $enable_dash = 'checked="true"';
  }
  admin_table_row(
    'Enable dash.js',
    'Dash format support',
    "<input type='checkbox' name='enable_dash' id='enable_dash' value='1' $enable_dash />",
    'enable_dash'
  );

  table_foot();
}

function admin_save()
{
  update_option('enable_hls', array_key_exists('enable_hls', $_POST)); // input var okay
  update_option('enable_dash', array_key_exists('enable_dash', $_POST)); // input var okay
}

function table_head()
{
?>
  <div class='wrap' id='oplayer-options'>
    <h2>WordPress-Plugin-OPlayer</h2>
    <form id='oplayer-for-wordpress' name='oplayer-for-wordpress' action='' method='POST'>
      <?php wp_nonce_field('oplayer_save_action', 'oplayer_save_field', true); ?>
      <table class='form-table'>
        <caption class='screen-reader-text'>OPlayer设置</caption>
<?php
}

function table_foot()
{
?>
      </table>
      <p class="submit"><input type="submit" class="button button-primary" value="Save Changes" /></p>
    </form>
  </div>
<?php
}

function admin_table_row($head, $comment, $input, $input_id)
{
?>
  <tr valign="top">
    <th scope="row">
      <label for="<?php echo esc_attr($input_id); ?>"><?php echo esc_html($head); ?></label>
    </th>
    <td>
      <?php echo wp_kses($input, $admin_tags); ?>
      <p class="description"><?php echo wp_kses_post($comment); ?></p>
    </td>
  </tr>
  <?php
}
