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

class main_module
{
	/** @var string */
	public $u_action;
	/** @var string */
	public $tpl_name;
	/** @var string */
	public $page_title;
	/** @var \phpbb\template\template */
	protected $template;
	/** @var \phpbb\language\language */
	protected $language;
	/** @var \toxyy\html5chat\controller\acp */
	protected $acp_controller;

	/**
	 * ACP module constructor.
	 *
	 * @return void
	 */
	public function __construct()
	{
		global $phpbb_container;

		$this->template = $phpbb_container->get('template');
		$this->language = $phpbb_container->get('language');
		$this->acp_controller = $phpbb_container->get('toxyy.html5chat.acp.controller');
	}

	/**
	 * Main module method.
	 *
	 * @param string $id
	 * @param string $mode
	 *
	 * @return void
	 */
	public function main($id, $mode)
	{
		add_form_key('toxyy_html5chat');

		switch ($mode)
		{
			case 'settings':
				$this->tpl_name = 'acp_html5chat';
				$this->page_title = sprintf(
					'%s - %s',
					$this->language->lang('SETTINGS'),
					$this->language->lang('ACP_HTML5CHAT')
				);
				$this->acp_controller->settings_mode($this->u_action);
			break;

			default:
				trigger_error(
					$this->language->lang('NO_MODE') .
					adm_back_link($this->u_action),
					E_USER_WARNING
				);
			break;
		}

		// Assign global template variables
		$this->template->assign_var('U_ACTION', $this->u_action);
	}
}
