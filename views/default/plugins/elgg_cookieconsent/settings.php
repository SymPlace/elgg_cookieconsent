<?php
elgg_require_js('elgg_cookieconsent/cookieconsent_preview');

// layout settings
$layout_settings = elgg_view_field([
	'#type' => 'select',
	'#label' => elgg_echo('elgg_cookieconsent:settings:position'),
	'name' => 'params[position]',
	'value' => $vars['entity']->position,
	'options_values' => array('' => elgg_echo('Banner bottom'), 'top' => elgg_echo('Banner top'), 'bottom-left' => elgg_echo('Floating left'), 'bottom-right' => elgg_echo('Floating right'))
]);

$layout_settings .= elgg_view_field([
	'#type' => 'select',
	'#label' => elgg_echo('elgg_cookieconsent:settings:theme'),
	'name' => 'params[theme]',
	'value' => $vars['entity']->theme,
	'options_values' => array('' => elgg_echo('Block'), 'classic' => elgg_echo('Classic'), 'edgeless' => elgg_echo('Edgeless'))
]);

$layout_settings .= elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('elgg_cookieconsent:settings:color:popup_background'),
	'name' => 'params[popup_background_color]',
	'value' => $vars['entity']->popup_background_color,
	'placeholder' => '#000000'
]);

$layout_settings .= elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('elgg_cookieconsent:settings:color:popup_text'),
	'name' => 'params[popup_text_color]',
	'value' => $vars['entity']->popup_text_color,
	'placeholder' => '#FFFFFF'
]);

$layout_settings .= elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('elgg_cookieconsent:settings:color:button_background'),
	'name' => 'params[button_background_color]',
	'value' => $vars['entity']->button_background_color,
	'placeholder' => '#F1D600'
]);

$layout_settings .= elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('elgg_cookieconsent:settings:color:button_text'),
	'name' => 'params[button_text_color]',
	'value' => $vars['entity']->button_text_color,
	'placeholder' => '#000000'
]);

echo elgg_view_module('inline', elgg_echo('elgg_cookieconsent:settings:layout:title'), $layout_settings);

$content_settings .= elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('elgg_cookieconsent:settings:message'),
	'name' => 'params[message]',
	'value' => $vars['entity']->message,
	'placeholder' => elgg_echo('elgg_cookieconsent:message')
]);

$content_settings .= elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('elgg_cookieconsent:settings:dismiss'),
	'name' => 'params[dismiss]',
	'value' => $vars['entity']->dismiss,
	'placeholder' => elgg_echo('elgg_cookieconsent:dismiss')
]);

$content_settings .= elgg_view_field([
	'#type' => 'url',
	'#label' => elgg_echo('elgg_cookieconsent:settings:link'),
	'#help' => elgg_echo('elgg_cookieconsent:settings:link:note'),
	'name' => 'params[url]',
	'value' => $vars['entity']->url,
]);

$content_settings .= elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('elgg_cookieconsent:settings:learnmorebutton'),
	'#help' => elgg_echo('elgg_cookieconsent:settings:learnmorebutton:note'),
	'name' => 'params[learnMore]',
	'value' => $vars['entity']->learnMore,
	'placeholder' => elgg_echo('elgg_cookieconsent:learnmore')
]);

$content_settings .= "<p><div class='elgg-subtext'>" .elgg_echo('elgg_cookieconsent:settings:save:note')."</div></p>";

echo elgg_view_module('inline', elgg_echo('elgg_cookieconsent:settings:content:title'), $content_settings);



