<?php
/*
Daltonmedia.be
Dries de Krom
*/
elgg_register_event_handler('init', 'system', 'elgg_cookieconsent_init');

elgg_register_plugin_hook_handler('elgg.data', 'site', 'elgg_cookieconsent_config_site');

function elgg_cookieconsent_init() {
        
    if (!elgg_in_context('admin')){
	elgg_require_js('elgg_cookieconsent/cookieconsent');
    }

    $theme = elgg_get_plugin_setting('theme', elgg_cookieconsent);
    if (!($theme)){
	$theme = 'default-custom';
    }
    elgg_extend_view('css/elgg', "css/$theme.css");	
}

function elgg_cookieconsent_config_site($hook, $type, $value, $params) {
    
    $message = elgg_get_plugin_setting('message', elgg_cookieconsent);
    if (!($message)){
	$message = elgg_echo('elgg_cookieconsent:message');
    }
    $dismiss = elgg_get_plugin_setting('dismiss', elgg_cookieconsent);
    if (!($dismiss)){
	$dismiss = elgg_echo('elgg_cookieconsent:dismiss');
    }
    $url = elgg_get_plugin_setting('url', elgg_cookieconsent);
    $learnMore = elgg_get_plugin_setting('learnMore', elgg_cookieconsent);
    if (!($learnMore)){
	$learnMore = elgg_echo('elgg_cookieconsent:learnmore');
    }
    $theme = elgg_get_plugin_setting('theme', elgg_cookieconsent);
    if (!($theme)){
	$theme = false;
    }
    //$settings = elgg_get_plugin_by_id('elgg_cookieconsent')->getAllSettings(); //function seems not to excist? Is in the docs though.
    $settings = [
	'message' => $message,
	'dismiss' => $dismiss,
	'link' => $url,
	'learnMore' => $learnMore,
	'theme' => $theme,
    ];

    // this will be cached client-side
    $value['elgg_cookieconsent']['settings'] = json_encode($settings);
    return $value;
}