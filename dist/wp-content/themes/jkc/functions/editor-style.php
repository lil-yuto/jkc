<?php
function custom_block_editor_css(){
  add_theme_support( 'editor-styles' );
  add_editor_style( array('./assets/css/styles.css', './assets/css/style-editor.css') );
}
add_action( 'after_setup_theme', 'custom_block_editor_css' );