<?php
/**
 *
 * HTML5 Chat
 *
 * @copyright (c) 2019, toxyy, https://github.com/toxyy
 * @license       GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace toxyy\html5chat;

use phpbb\extension\base;

class ext extends base
{
	/**
	 * phpBB 3.2.x and PHP 7+
	 */
	public function is_enableable()
	{
		$config = $this->container->get('config');

		// check phpbb and phpb versions
		$is_enableable = (phpbb_version_compare($config['version'], '3.2', '>=') && version_compare(PHP_VERSION, '7', '>='));
		return $is_enableable;
	}

	function enable_step($old_state)
	{
		switch ($old_state)
		{
			case '': // Empty means nothing has run yet
				if (empty($old_state))
				{
					$this->container->get('user')->add_lang_ext('toxyy/html5chat', 'info_acp_html5chat');
					$this->container->get('template')->assign_var('L_EXTENSION_ENABLE_SUCCESS', $this->container->get('user')->lang['EXTENSION_ENABLE_SUCCESS']);
				}

				// Run parent enable step method
				return parent::enable_step($old_state);

			break;

			default:
				// Run parent enable step method
				return parent::enable_step($old_state);

			break;
		}
	}
}
