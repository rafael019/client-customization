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

//Verifica se o arquivo de tradução está sendo carregado na pasta correta
function client_customization_load_text_domain()
{
    load_plugin_textdomain('client-customization', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('init', 'client_customization_load_text_domain');

function add_message_post($content)
{
    // Verifica se o conteúdo atual é é diferente de uma página.
    if (!is_page() && is_single()) {
        $site_name = get_bloginfo('name');
        $site_url =  get_bloginfo('url');
        $message_translate = __('<p><b>This content is created by: %s (%s)</b></p>', 'client-customization');
        $message = sprintf($message_translate, $site_name, $site_url);
        // Se for exibe o conteúdo do post e a mensage.
        return $content . $message;
    } else {
        // Se for uma página exibe somente o conteúdo sem a mensagem.
        return $content;
    }
};

add_filter('the_content', 'add_message_post', 10);
