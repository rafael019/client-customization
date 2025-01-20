<?php

/**
 * Plugin Name:     Client Customization
 * Plugin URI:https://www.yogh.com.br/
 * Description:     Plugins with Project Customization
 * Author:          Yogh Soluções
 * Author URI:      https://www.yogh.com.br/
 * Text Domain:     client-customization
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Client_Customization
 */

// If this file is called directly, abort.
if (! defined('ABSPATH')) {
    die('not allowed');
}

add_filter('the_content', function ($content) {
    // Verifica se o conteúdo atual é é diferente de uma página.
    if (!is_page() && is_single()) {
        $message = '<p><b>This content is created by: ' . get_bloginfo('name') . ' (' . get_bloginfo('url') . ')</b></p>';
        // Se for exibe o conteúdo do post e a mensage.
        return $content . $message;
    } else {
        // Se for uma página exibe somente o conteúdo sem a mensagem.
        return $content;
    }
}, 10);
