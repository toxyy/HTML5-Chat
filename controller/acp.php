<?php
/**
 *
 * HTML5 Chat
 *
 * @copyright (c) 2019, toxyy, https://github.com/toxyy
 * @license       GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace toxyy\html5chat\controller;

class acp
{
	/** @var \phpbb\config\config */
	protected $config;
	/** @var \phpbb\template\template */
	protected $template;
	/** @var \phpbb\request\request */
	protected $request;
	/** @var \phpbb\language\language */
	protected $language;
	/** @var \phpbb\user */
	protected $user;
	/** @var \phpbb\log\log */
	protected $log;

	/**
	 * Controller constructor.
	 *
	 * @param \phpbb\config\config		$config
	 * @param \phpbb\template\template	$template
	 * @param \phpbb\request\request	$request
	 * @param \phpbb\language\language	$language
	 * @param \phpbb\user				$user
	 * @param \phpbb\log\log			$log
	 *
	 * @return void
	 */
	public function __construct(
		\phpbb\config\config $config,
		\phpbb\template\template $template,
		\phpbb\request\request $request,
		\phpbb\language\language $language,
		\phpbb\user $user,
		\phpbb\log\log $log
	)
	{
		$this->config		= $config;
		$this->template		= $template;
		$this->request		= $request;
		$this->language		= $language;
		$this->user			= $user;
		$this->log			= $log;
	}

	/**
	 * Settings mode page.
	 *
	 * @param string $u_action
	 *
	 * @return void
	 */
	public function settings_mode($u_action = '')
	{
		if (empty($u_action))
		{
			return;
		}

		// Request form data
		if ($this->request->is_set_post('submit'))
		{
			if (!check_form_key('toxyy_html5chat'))
			{
				trigger_error(
					$this->language->lang('FORM_INVALID') .
					adm_back_link($u_action),
					E_USER_WARNING
				);
			}

			$this->config->set(
				'html5chat_webmaster_id',
				$this->request->variable('html5chat_webmaster_id', '')
			);

			$this->config->set(
				'html5chat_chat_password',
				$this->request->variable('html5chat_chat_password', '')
			);

			$this->config->set(
				'html5chat_width',
				$this->request->variable('html5chat_width', 0)
			);

			$this->config->set(
				'html5chat_height',
				$this->request->variable('html5chat_height', 0)
			);

			// Admin log
			$this->log->add(
				'admin',
				$this->user->data['user_id'],
				$this->user->ip,
				'LOG_HTML5CHAT_DATA',
				false,
				[$this->language->lang('SETTINGS')]
			);

			// Confirm dialog
			trigger_error(
				$this->language->lang('CONFIG_UPDATED') .
				adm_back_link($u_action)
			);
		}

		// Assign template variables
		$this->template->assign_vars([
			'HTML5CHAT_WEBMASTER_ID'	=> $this->config['html5chat_webmaster_id'],
			'HTML5CHAT_CHAT_PASSWORD' 	=> $this->config['html5chat_chat_password'],
			'HTML5CHAT_WIDTH' 			=> (int) $this->config['html5chat_width'],
			'HTML5CHAT_HEIGHT' 			=> (int) $this->config['html5chat_height']
		]);
	}
}
