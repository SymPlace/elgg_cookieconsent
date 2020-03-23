<?php
/**
* Elgg Cookieconsent
*
* @package elgg_cookieconsent
* @author Dries de Krom, oseg
* @copyright (C) Daltonmedia.be 2016, (C) Arttic 2018, (C) oseg 2018
*/

elgg_register_event_handler('init', 'system', 'elgg_cookieconsent_init');

elgg_register_plugin_hook_handler('elgg.data', 'site', 'elgg_cookieconsent_config_site');

function elgg_cookieconsent_init() {
    elgg_define_js('cookieconsent', array(
	    'src' => '/mod/elgg_cookieconsent/vendors/cookieconsent/build/cookieconsent.min.js',
    ));
    elgg_extend_view('css/elgg', 'cookieconsent/cookieconsent.min.css');
        
    if (!elgg_in_context('admin')){
	elgg_require_js('elgg_cookieconsent/cookieconsent_init');
    }
}

function elgg_cookieconsent_config_site($hook, $type, $value, $params) {
    
    $message = elgg_get_plugin_setting('message', 'elgg_cookieconsent');
    if (!($message)){
	$message = elgg_echo('elgg_cookieconsent:message');
    }
    $dismiss = elgg_get_plugin_setting('dismiss', 'elgg_cookieconsent');
    if (!($dismiss)){
	$dismiss = elgg_echo('elgg_cookieconsent:dismiss');
    }
    $url = elgg_get_plugin_setting('url', 'elgg_cookieconsent');
    $learnMore = elgg_get_plugin_setting('learnMore', 'elgg_cookieconsent');
    if (!($learnMore)){
	$learnMore = elgg_echo('elgg_cookieconsent:learnmore');
    }
    $theme = elgg_get_plugin_setting('theme', 'elgg_cookieconsent');
    if (!($theme)){
	$theme = 'block';
    }
    $position = elgg_get_plugin_setting('position', 'elgg_cookieconsent');
    if (!($position)){
	$position = 'bottom';
    }
    $popup_background_color = elgg_get_plugin_setting('popup_background_color', 'elgg_cookieconsent');
    if (!($popup_background_color) || !preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $popup_background_color)){
	$popup_background_color = '#000000';
    }
    $popup_text_color = elgg_get_plugin_setting('popup_text_color', 'elgg_cookieconsent');
    if (!($popup_text_color) || !preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $popup_text_color)){
	$popup_text_color = '#FFFFFF';
    }
    $button_background_color = elgg_get_plugin_setting('button_background_color', 'elgg_cookieconsent');
    if (!($button_background_color) || !preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $button_background_color)){
	$button_background_color = '#F1D600';
    }
    $button_text_color = elgg_get_plugin_setting('button_text_color', 'elgg_cookieconsent');
    if (!($button_text_color) || !preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $button_text_color)){
	$button_text_color = '#000000';
    }
    //$settings = elgg_get_plugin_by_id('elgg_cookieconsent')->getAllSettings(); //function seems not to excist? Is in the docs though.
    $settings = [
	'message' => $message,
	'dismiss' => $dismiss,
	'link' => $url,
	'learnMore' => $learnMore,
	'theme' => $theme,
	'position' => $position,
	'popup_background_color' => $popup_background_color,
	'popup_text_color' => $popup_text_color,
	'button_background_color' => $button_background_color,
	'button_text_color' => $button_text_color,
    ];

    // this will be cached client-side
    $value['elgg_cookieconsent']['settings'] = json_encode($settings);
    return $value;
}
