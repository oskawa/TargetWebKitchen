<?php
/*****************************************/ 
/************** S T Y L E S **************/
/****************************************/


function styles_wordpress() {

    /* JAVASCRIPT */

    // wp_deregister_script( 'jquery' );
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); 

    wp_enqueue_script('jquery');

    wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js', '', null, true);
    wp_enqueue_script('owlcarousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', '', null, true);

    //wp_enqueue_script('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js', '', null, true);
    //wp_enqueue_script('masonryjs', 'https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js', '', null, true);

    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', '', null, true);

    /* CSS */
    
    wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css');
    wp_enqueue_style('owlcarousel', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
    wp_enqueue_style('hamburgers', 'https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css');

    //wp_enqueue_style('lightbox', 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css');
    
    wp_enqueue_style('style', get_stylesheet_uri() );
} 
add_action( 'wp_enqueue_scripts', 'styles_wordpress' );

add_filter( 'script_loader_tag', 'add_attribs_to_scripts', 10, 3 );

function add_attribs_to_scripts( $tag, $handle, $src ) {
    $async_scripts = array('jquery-migrate', 'sharethis');

    $defer_scripts = array( 'contact-form-7','jquery-form','wpdm-bootstrap','frontjs','jquery-choosen','fancybox','jquery-colorbox',  'search');

    $integrity = array('bootstrap','owlcarousel', 'scrollreveal', 'masonryjs', 'lightbox');

    if ( in_array( $handle, $defer_scripts ) ) {
        return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
    }
    if ( in_array( $handle, $async_scripts ) ) {
        return '<script src="' . $src . '" async="async" type="text/javascript"></script>' . "\n";
    }
    if ( in_array( $handle, $integrity ) ) {
        if($handle == 'bootstrap') :
            return '<script src="' . $src . '" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>' . "\n";
        elseif ($handle == 'owlcarousel') :
            return '<script src="' . $src . '" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>' . "\n";
        elseif ($handle == 'scrollreveal') :
            return '<script src="' . $src . '" integrity="sha512-yrp2XCY0JvwOgu87K/vTN3IIHolfAJL3SMsFu0ujdKeWWMmFhClABdlxna2TfOhMqX49GbmsIpbZ6fVBE7gleQ==" crossorigin="anonymous"></script>' . "\n";
        elseif ($handle == 'masonryjs') :
            return '<script src="' . $src . '" integrity="sha512-JRlcvSZAXT8+5SQQAvklXGJuxXTouyq8oIMaYERZQasB8SBDHZaUbeASsJWpk0UUrf89DP3/aefPPrlMR1h1yQ==" crossorigin="anonymous"></script>' . "\n";
        elseif ($handle == 'lightbox') :
            return '<script src="' . $src . '" integrity="sha512-k2GFCTbp9rQU412BStrcD/rlwv1PYec9SNrkbQlo6RZCf75l6KcC3UwDY8H5n5hl4v77IDtIPwOk9Dqjs/mMBQ==" crossorigin="anonymous"></script>' . "\n";
        else : 
            return '<script src="' . $src . '" integrity="" crossorigin="anonymous"></script>' . "\n"; 
        endif;
    }
    return $tag; 
} 

add_filter('style_loader_tag', 'add_attribs_to_styles', 10, 4);

function add_attribs_to_styles( $html, $handle, $href, $media ) {
    $integrity = array('bootstrap','owlcarousel', 'hamburgers', 'lightbox');

    if ( in_array( $handle, $integrity ) ) {
        if($handle == 'bootstrap') :
            $html = '<link rel="stylesheet" href="' . $href . '" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous">' . "\n";
        elseif ($handle == 'owlcarousel') :
            $html = '<link rel="stylesheet" href="' . $href . '" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous">' . "\n";
        elseif ($handle == 'hamburgers') :
            $html = '<link rel="stylesheet" href="' . $href . '" integrity="sha512-+mlclc5Q/eHs49oIOCxnnENudJWuNqX5AogCiqRBgKnpoplPzETg2fkgBFVC6WYUVxYYljuxPNG8RE7yBy1K+g==" crossorigin="anonymous">' . "\n";
        elseif ($handle == 'lightbox') :
            $html = '<link rel="stylesheet" href="' . $href . '" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous">' . "\n";
        else : 
            $html = '<link rel="stylesheet" href="' . $href . '" integrity="" crossorigin="anonymous">' . "\n";
        endif;
    }
    return $html; 
}
