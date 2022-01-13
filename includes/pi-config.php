<?php

// Languages
if( !function_exists( 'pi_load_text_domain' ) ) {
  function pi_load_text_domain() {
    load_plugin_textdomain( PI_TEXT_DOMAIN, FALSE, basename(PI_PLUGIN_DIR) . '/languages/' );
  }
}
add_action( 'plugins_loaded', 'pi_load_text_domain' );