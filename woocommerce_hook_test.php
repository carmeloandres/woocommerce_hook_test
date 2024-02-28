<?php 
/*
Plugin Name: Woocommerce hook test
Plugin URI:  https://carmeloandres.com
Description: Plugin for testing de hooks of woocommerce
Version:     0.0.1
Author:      Carmelo Andrés
Author URI:  https://carmeloandres.com
Text Domain: wht
Domain Path: /Languages
License:     GPLv2 or later
*/
/**
 * Función para evitar que el orden de carga no ejecute los hooks de woocommerce
 */
add_action('after_setup_theme','cargar_hooks_woocommerce'); // carga los hooks despues del setup del theme
function cargar_hooks_woocommerce(){

    /**
     * Hooks para modificar la pagina de producto
     */

    add_action( 'woocommerce_before_single_product', 'wc_print_notices', 10 );
 
    add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
    add_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
     
    add_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
     
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
     
    add_action( 'woocommerce_simple_add_to_cart', 'woocommerce_simple_add_to_cart', 30 );
    add_action( 'woocommerce_grouped_add_to_cart', 'woocommerce_grouped_add_to_cart', 30 );
    add_action( 'woocommerce_variable_add_to_cart', 'woocommerce_variable_add_to_cart', 30 );
    add_action( 'woocommerce_external_add_to_cart', 'woocommerce_external_add_to_cart', 30 );
    add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
    add_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
     
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
    add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
     
    add_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
    add_action( 'woocommerce_review_before_comment_meta', 'woocommerce_review_display_rating', 10 );
    add_action( 'woocommerce_review_meta', 'woocommerce_review_display_meta', 10 );
    add_action( 'woocommerce_review_comment_text', 'woocommerce_review_display_comment_text', 10 );


    /**
     * Hooks para modificar la pagina de tienda
     */
add_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
 
add_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );  // estp funciona en la pagina de categorias de productos
add_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
 
add_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );               // elimana los avisos
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );       // elimina el contador
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );   // elimina el criterio de ordenación
 
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 ); 
 
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
 
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
 
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
 
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );      // elimna el boton de añadir al carrito
 
add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
 
add_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );



    /**
     * Cosas que quitamos
     * Podemos quitar cosas usando los remove_action correspondientes al hook que queremos y la función que 
     * vamos a eliminar
     */

    // En el loop
//    remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10); // elimina el titulo de los productos
//    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10); // elimina el precio de los produtctos en la tienda

    // Antes del loop
    remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20); // elimina el contador de resultados
    remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30); // elimina el orden del catalogo

    // Despues del loop
    remove_action('woocommerce_after_shop_loop','woocommerce_pagination',10); // elimina  la paginacion en los productos

    /**
     * Cosas que agregamos
     * Podemos agregar cosas en los hooks correspondientes con funciones propias o ya creadas
     */

    add_action('woocommerce_shop_loop_item_title','nuestro_contenido',10); // ejecuta la función 'nuestro contenido' en el titulo de los productos

    function nuestro_contenido(){
        //echo('<p>Hola mundo!</p>');
        woocommerce_result_count();
    }

    /**
     * Cosas que reordenamos
     * Podemos usar los hook establecidos para mostrar un contenido haciendo un remove_action del hook y la función y despues
     * hace un add_acction con la función que queremos mostrar en ese lugar. Hay que tener en cuenta que debemos modificar la prioridad
     * para que los remove se ejecuten antes que los add.
     */

    remove_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title',10); // elimina el titulo de los productos
    remove_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price',10); // elimina el precio de los produtctos en la tienda

    add_action('woocommerce_shop_loop_item_title','woocommerce_template_loop_price',15); // elimina el titulo de los productos
    add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_product_title',15); // elimina el precio de los produtctos en la tienda

}