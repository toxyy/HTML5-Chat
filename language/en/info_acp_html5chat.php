<?php
/**
 *
 * HTML5 Chat
 *
 * @copyright (c) 2019, toxyy, https://github.com/toxyy
 * @license       GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'ACP_GLOBAL_SETTINGS'			=> 'Global Settings',
	'ACP_HTML5CHAT'					=> 'HTML5 Chat',
	'ACP_HTML5CHAT_WEBMASTER_ID'	=> 'Webmaster ID',
	'ACP_HTML5CHAT_CHAT_PASSWORD'	=> 'Chat Password',
	'ACP_HTML5CHAT_WIDTH'			=> 'Width',
	'ACP_HTML5CHAT_HEIGHT'			=> 'Height',
	'LOG_HTML5CHAT_DATA' 			=> '<strong>HTML5 Chat data changed</strong><br />» %s'
));
