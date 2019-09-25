<?php
/**
 *
 * HTML5 Chat
 *
 * @copyright (c) 2019, toxyy, https://github.com/toxyy
 * @license       GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace toxyy\html5chat\acp;

class main_info
{
	/**
	 * Set up ACP module.
	 *
	 * @return array
	 */
	public function module()
	{
		return [
			'filename'	=> '\toxyy\html5chat\acp\main_module',
			'title'		=> 'ACP_HTML5CHAT',
			'modes'		=> [
				'settings'	=> [
					'title'	=> 'SETTINGS',
					'auth'	=> 'ext_toxyy/html5chat && acl_a_board',
					'cat'	=> ['ACP_HTML5CHAT']
				]
			]
		];
	}
}
