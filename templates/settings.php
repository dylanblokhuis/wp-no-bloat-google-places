<div class="wrap">
  <h1>Google Places</h1>
  <h2>Settings</h2>

  <p>Make sure your API token has whitelisted this servers ip and has permissions to use Google Places API</p>
  <p>To get the place details a place_id is needed, you can find it <a target="_blank" rel="noreferrer noopener" href="https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder">here.</a></p>


  <form method="post" action="options.php">
    <?php settings_fields(NBGP_PLUGIN_SLUG); ?>
    <?php do_settings_sections(NBGP_PLUGIN_SLUG); ?>

    <table class="form-table">
        <tr valign="top">
          <th scope="row">Google API Token</th>
          <td><input type="text" name="<?php echo nbgp_token_option_key(); ?>" style="width: 400px;" value="<?php echo get_option(nbgp_token_option_key()); ?>" /></td>
        </tr>      
    
        <tr valign="top">
          <th scope="row">Google Place ID</th>
          <td><input type="text" name="<?php echo nbgp_place_id_option_key(); ?>" style="width: 400px;" value="<?php echo get_option(nbgp_place_id_option_key()); ?>" /></td>
        </tr>      

        <tr valign="top">
          <th scope="row">Language (shorthand) like "en" or "nl"</th>
          <td><input type="text" name="<?php echo nbgp_language_option_key(); ?>" style="width: 400px;" value="<?php echo get_option(nbgp_language_option_key()); ?>" /></td>
        </tr> 
    </table>
    
    <?php submit_button('Save'); ?>
  </form>
</div>