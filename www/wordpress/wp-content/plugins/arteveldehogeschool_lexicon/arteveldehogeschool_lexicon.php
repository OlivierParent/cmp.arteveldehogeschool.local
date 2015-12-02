<?php
/*
Plugin Name: Artveldehogeschool Grafisch Lexicon Vertalingen
Plugin URI: http://www.arteveldehogeschool.be/
Description: Plugin voor Vertalingen van vaktermen in het Grafisch Lexicon.
Version: 1.0.0
Author: Olivier Parent
Author URI: http://www.olivierparent.be/
Text Domain: arteveldehogeschool
License: GPLv2
*/

/*
 *  Vertalingen inladen met de naam graphic_term-*.mo.
 *
 * @link https://developer.wordpress.org/reference/functions/load_plugin_textdomain/
 * @link http://php.net/manual/en/function.dirname.php
 * @link http://php.net/manual/en/function.basename.php
 */
load_plugin_textdomain('graphic_term', null, basename( dirname( __FILE__ ) ) . '/languages' );


/**
 * Functie om een nieuwe Custom Post Type te registreren met de naam 'graphic_term' in WordPress.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/__/
 * @link https://developer.wordpress.org/reference/functions/_x/
 * @link https://developer.wordpress.org/reference/functions/_n/
 * @link https://developer.wordpress.org/reference/functions/_nx/
 */
function register_graphic_term_post_type() {

    $text_domain = 'graphic_term';

    // Labels voor op de menuknoppen.
    $labels = array(
        'name'               => __( 'Graphic Terms'                  , $text_domain ),
        'singular_name'      => __( 'Graphic Term'                   , $text_domain ),
        'add_new'            => __( 'Add new'                        , $text_domain ),
        'add_new_item'       => __( 'Add new Graphic Term'           , $text_domain ),
        'edit_item'          => __( 'Edit Graphic Term'              , $text_domain ),
        'view_item'          => __( 'View Graphic Term'              , $text_domain ),
        'search_items'       => __( 'Search Graphic Terms'           , $text_domain ),
        'not_found'          => __( 'No Graphic Terms found'         , $text_domain ),
        'not_found_in_trash' => __( 'No Graphic Terms found in Trash', $text_domain ),
    );

    $args = array(
        'labels' => $labels,
        'menu_position' => 25, // @link http://codex.wordpress.org/Function_Reference/register_post_type
        'menu_icon' => 'dashicons-media-default', // @link https://developer.wordpress.org/resource/dashicons/
        'public' => true,
        'supports' => array( 'title', 'editor'/*, 'custom-fields'*/ ),
    );

    register_post_type( 'graphic_term', $args );

}

/*
 * Haak de functie register_graphic_term() vast aan de actie 'init'.
 * De actie 'init' wordt uitgevoerd nadat WordPress ingeladen is, maar voordat de website getoond wordt.
 *
 * @link https://developer.wordpress.org/reference/functions/add_action/
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/init
 */
add_action( 'init', 'register_graphic_term_post_type' );

/**
 * Functie om de meta box van het Custom Post Type 'graphic_term' te tonen.
 *
 * @link https://developer.wordpress.org/reference/functions/get_post_meta/
 * @link https://developer.wordpress.org/reference/functions/esc_html/
 * @link https://developer.wordpress.org/reference/functions/_e/
 *
 * @param $graphic_term
 */
function display_graphic_term_meta_box( $graphic_term ) {

    $text_domain = 'graphic_term';

    $graphic_term_translation = array(
      'fr' => esc_html( get_post_meta( $graphic_term->ID, 'graphic_term_fr', true ) ),
      'en' => esc_html( get_post_meta( $graphic_term->ID, 'graphic_term_en', true ) ),
      'de' => esc_html( get_post_meta( $graphic_term->ID, 'graphic_term_de', true ) ),
    );

    ?>
    <table width="100%">
        <tr>
            <th><?php _e( 'Language', $text_domain ); ?></th>
            <th style="text-align: left"><?php _e( 'Translation', $text_domain ); ?></th>
        </tr>
        <tr>
            <td>français</td>
            <td><input type="text" name="graphic_term_fr" value="<?php echo $graphic_term_translation['fr']; ?>" /></td>
        </tr>
        <tr>
            <td>English</td>
            <td width="100%"><input type="text" name="graphic_term_en" value="<?php echo $graphic_term_translation['en']; ?>" /></td>
        </tr>
        <tr>
            <td>Deutsch</td>
            <td width="100%"><input type="text" name="graphic_term_de" value="<?php echo $graphic_term_translation['de']; ?>" /></td>
        </tr>
    </table>
<?php

}

/**
 * Functie om een metabox 'graphic_term_meta_box' toe te voegen aan de Custom Post Type pagina voor 'graphic_term'.
 *
 * @link https://developer.wordpress.org/reference/functions/add_meta_box/
 */
function add_graphic_term_meta_box() {

    $text_domain = 'graphic_term';

    $id       = 'graphic_term_meta_box';          // Id van de meta box.
    $title    = __('Translations', $text_domain); // Titel van de meta box.
    $callback = 'display_graphic_term_meta_box';  // Roept de functie display_graphic_concept_meta_box() aan.
    $screen   = 'graphic_term'; // Toon de meta box op het scherm voor het Custom Post Type 'graphic_term'.
    $context  = 'normal'; // Context waarin de meta box getoond moet worden. Keuze uit 'normal', 'side' of 'advanced'.

    add_meta_box( $id, $title, $callback, $screen, $context );

}

/*
 * Haak de functie add_graphic_term_meta_box() vast aan de actie 'admin_init'.
 * De actie 'admin_init' wordt uitgevoerd als het beheerdersgedeelte van de website geopend wordt.
 *
 * @link https://developer.wordpress.org/reference/functions/add_action/
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/admin_init
 */
add_action( 'admin_init', 'add_graphic_term_meta_box' );


/**
 * Functie om de metagegevens (de vertalingen) van de Custom Post Type 'graphic_term' op te slaan.
 *
 * @link http://php.net/manual/en/function.isset.php
 * @link http://php.net/manual/en/function.empty.php
 * @link https://developer.wordpress.org/reference/functions/sanitize_text_field/
 * @link https://developer.wordpress.org/reference/functions/update_post_meta/
 *
 * @param $graphic_term_id
 * @param $graphic_term
 */
function save_graphic_term_post_meta_data( $graphic_term_id, $graphic_term ) {

    if ( 'graphic_term' == $graphic_term->post_type ) {

        // Frans
        if ( isset( $_POST['graphic_term_fr'] ) && !empty( $_POST['graphic_term_fr'] ) ) {

            $graphic_term_fr = sanitize_text_field( $_POST['graphic_term_fr'] );

            update_post_meta( $graphic_term_id, 'graphic_term_fr',  $graphic_term_fr);
        }

        // Engels
        if ( isset( $_POST['graphic_term_en'] ) && !empty( $_POST['graphic_term_en'] ) ) {

            $graphic_term_en = sanitize_text_field( $_POST['graphic_term_en'] );

            update_post_meta( $graphic_term_id, 'graphic_term_en', $graphic_term_en );
        }

        // Duits
        if ( isset( $_POST['graphic_term_de'] ) && !empty( $_POST['graphic_term_de'] ) ) {

            $graphic_term_de = sanitize_text_field( $_POST['graphic_term_de'] );

            update_post_meta( $graphic_term_id, 'graphic_term_de', $graphic_term_de );
        }

    }

}

/*
 * Haak de functie save_graphic_term_post_meta_data() vast aan de actie 'save_post'.
 *
 * @link https://developer.wordpress.org/reference/functions/add_action/
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/save_post
 */
add_action( 'save_post', 'save_graphic_term_post_meta_data', null , $accepted_args = 2 /* parameters: $graphic_term_id en $graphic_term) */ );


// PAGINA OM CUSTOM POST TYPES VAN TYPE 'graphic_term' TE UPLOADEN

/**
 * Nieuwe pagina om een CSV-bestand (Comma Separated Values) met Grafische termen te uploaden.
 *
 * @link http://php.net/manual/en/function.isset.php
 * @link http://php.net/manual/en/function.ini-set.php
 * @link http://php.net/manual/en/function.fopen.php
 * @link http://php.net/manual/en/function.fgetcsv.php
 * @link http://php.net/manual/en/function.fclose.php
 * @link http://php.net/manual/en/function.count.php
 * @link https://developer.wordpress.org/reference/functions/get_current_user_id/
 * @link https://developer.wordpress.org/reference/functions/wp_insert_post/
 */
function upload_graphic_terms_page() {

    $text_domain = 'graphic_term';

    ?>
    <h2><?php echo __('Upload Graphic Terms', $text_domain); ?></h2>
    <form action="" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
        <input type="file" name="csv-graphic-terms">
        <button type="submit" class="button"><?php echo __('Upload', $text_domain); ?></button>
    </form>
<?php
    if (isset($_FILES['csv-graphic-terms']) && !$_FILES['csv-graphic-terms']['error']) {
        $graphic_terms = array();

        // Bestand inlezen, regel per regel
        $file_name = $_FILES['csv-graphic-terms']['tmp_name'];

        ini_set('auto_detect_line_endings', '1'); // In het geval deze optie in php.ini niet aan zou staan.

        $file = fopen($file_name, 'r');

        if ($file) {
            $i = 0;
            while ($line = fgetcsv($file, null, ';')) {
                if ($i++ > 0) {
                    if ($i % 2 === 0) {
                        $graphic_terms[] = array(
                            'title'   => $line[0],
                            'content' => null,
                            'fr'      => $line[1],
                            'en'      => $line[2],
                            'de'      => $line[3],
                        );
                    } else {
                        $previous_item = count($graphic_terms) - 1;
                        $graphic_terms[$previous_item]['content'] = $line[0];
                    }
                }
            }
            fclose($file);
        }

        $user_ID = get_current_user_id();

        $added_count = 0;

        // Ingelezen gegevens verwerken
        foreach ($graphic_terms as $graphic_term) {

            $post = array(
                'post_title'   => $graphic_term['title'],
                'post_content' => $graphic_term['content'],
                'post_status'  => 'publish',
                'post_type'    => 'graphic_term',
                'post_author'  => $user_ID,
            );

            // Voer de ingesloten code enkel uit als de grafische term nog NIET bestaat.
            if ( !post_graphic_term_exists( $post['post_title'] ) ) {
                // Grafische term toevoegen aan de databasetabel 'wp_post'.
                $graphic_term_id = wp_insert_post($post);

                // Metagegevens (vertalingen) toevoegen voor de nieuwe grafische term aan de databasetabel 'wp_postmeta'.
                if ($graphic_term_id) {
                    $added_count++;
                    foreach (array('en', 'fr', 'de') as $lang) {
                        $key = 'graphic_term_' . $lang;
                        update_post_meta( $graphic_term_id, $key, $graphic_term[$lang] );
                    }
                }
            }

        }

        echo "<p>{$added_count} grafische termen toegevoegd!</p>";
    }

}

/**
 * Voegt menu-item toe voor de uploadpagina.
 *
 * @link https://developer.wordpress.org/reference/functions/add_menu_page/
 * @link https://developer.wordpress.org/reference/functions/add_submenu_page/
 */
function add_upload_graphic_terms_submenu_page() {

    $text_domain = 'graphic_term';

    $parent_slug = 'edit.php?post_type=graphic_term';
    $page_title  = __('Upload Graphic Terms', $text_domain ); // Titel van de pagina (<title>-element)
    $menu_title  = __('Upload Graphic Terms', $text_domain );
    $capability  = 'publish_posts'; // @link http://codex.wordpress.org/Roles_and_Capabilities
    $menu_slug   = 'upload-graphic-terms';
    $callback    = 'upload_graphic_terms_page';
    $icon_url    = 'dashicons-media-spreadsheet'; // @link https://developer.wordpress.org/resource/dashicons/
    $position    = 27; // @link https://developer.wordpress.org/reference/functions/add_menu_page/

    add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $callback );
    add_menu_page (                 $page_title, $menu_title, $capability, $menu_slug, $callback, $icon_url, $position );
}

/*
 * Haak de functie add_upload_graphic_terms_submenu_page() vast aan de actie 'admin_init'.
 * De actie 'admin_init' wordt uitgevoerd als het beheerdersgedeelte van de website geopend wordt.
 *
 * @link https://developer.wordpress.org/reference/functions/add_action/
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/admin_init
 */
add_action( 'admin_menu', 'add_upload_graphic_terms_submenu_page' );

/**
 * Controleer of de grafische term al bestaat. Deze functie is gebaseerd op de functie 'post_exists()'.
 *
 * @link https://developer.wordpress.org/reference/functions/post_exists/
 * @link https://developer.wordpress.org/reference/functions/sanitize_post_field/
 * @link https://developer.wordpress.org/reference/functions/wp_unslash/
 * @link https://developer.wordpress.org/reference/classes/wpdb/
 * @link https://developer.wordpress.org/reference/classes/wpdb/get_var/
 * @link https://developer.wordpress.org/reference/classes/wpdb/prepare/
 *
 * @param $title
 * @param string $content
 * @param string $date
 *
 * @return int
 */
function post_graphic_term_exists($title, $content = '', $date = '') {
    global $wpdb;

    $post_title   = wp_unslash( sanitize_post_field( 'post_title'  , $title  , 0, 'db' ) );
    $post_content = wp_unslash( sanitize_post_field( 'post_content', $content, 0, 'db' ) );
    $post_date    = wp_unslash( sanitize_post_field( 'post_date'   , $date   , 0, 'db' ) );

    $query = "SELECT ID FROM $wpdb->posts WHERE 1=1";
    $args = array();

    $query .= ' AND post_type = %s';
    $args[] = 'graphic_term';

    if ( !empty ( $date ) ) {
        $query .= ' AND post_date = %s';
        $args[] = $post_date;
    }

    if ( !empty ( $title ) ) {
        $query .= ' AND post_title = %s';
        $args[] = $post_title;
    }

    if ( !empty ( $content ) ) {
        $query .= 'AND post_content = %s';
        $args[] = $post_content;
    }

    if ( !empty ( $args ) )
        return (int) $wpdb->get_var( $wpdb->prepare($query, $args) );

    return 0;
}
