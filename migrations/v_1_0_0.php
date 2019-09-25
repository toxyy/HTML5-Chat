<?php
/**
 *
 * HTML5 Chat
 *
 * @copyright (c) 2019, toxyy, https://github.com/toxyy
 * @license       GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace toxyy\html5chat\migrations;

class v_1_0_0 extends \phpbb\db\migration\migration
{
	public function update_data()
	{
		return [
			['config.add', ['html5chat_webmaster_id', '']],
			['config.add', ['html5chat_chat_password', '']],
			['config.add', ['html5chat_width', 800]],
			['config.add', ['html5chat_height', 800]],
			['module.add', [
				'acp',
				'ACP_CAT_DOT_MODS',
				'ACP_HTML5CHAT'
			]],
			['module.add', [
				'acp',
				'ACP_HTML5CHAT',
				[
					'module_basename' => '\toxyy\html5chat\acp\main_module',
					'modes'	=> ['settings']
				]
			]]
		];
	}
}
