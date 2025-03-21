<?php

/**
 * CSSとJavaScriptの読み込み
 *
 */
function my_script_init()
{
  // WordPress提供のjquery.jsを読み込まない
  wp_deregister_script('jquery');
  // jQuery
  wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.7.0.min.js', "", "1.0.1", true);
  // GSAP
  wp_enqueue_script('gsap', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.12.0/gsap.min.js', "", "1.0.1", true);
  // ScrollTrigger
  wp_enqueue_script('ScrollTrigger', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.12.0/ScrollTrigger.min.js', array('gsap'), "1.0.1", true);
  // MotionPathPlugin
  wp_enqueue_script('MotionPathPlugin', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/MotionPathPlugin.min.js', array('gsap'), "1.0.1", true);
  // Google Fonts
  wp_enqueue_style('NotoSansJP', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap');
  wp_enqueue_style('NotoSerifJP', '//fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap');
  // Splide
  wp_enqueue_style('splide', '//cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css');
  wp_enqueue_script('splide', '//cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', "", "1.0.1", true);
  // Original
  wp_enqueue_style('my', get_template_directory_uri() . '/assets/css/styles.css', array(), filemtime(get_theme_file_path('/assets/css/styles.css')), false);
  wp_enqueue_script('my', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), filemtime(get_theme_file_path('/assets/js/script.js')), true);
  wp_enqueue_script('sys', get_template_directory_uri() . '/assets/js/script-sys.js', array('jquery'), filemtime(get_theme_file_path('/assets/js/script.js')), true);
}

add_action('wp_enqueue_scripts', 'my_script_init');
