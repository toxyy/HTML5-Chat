<?php
/**
 *
 * HTML5 Chat
 *
 * @copyright (c) 2019, toxyy, https://github.com/toxyy
 * @license       GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace toxyy\html5chat\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class listener implements EventSubscriberInterface
{
	/** @var \phpbb\controller\helper */
	protected $helper;
	/** @var \phpbb\template\template */
	protected $template;

	/**
	 * Listener constructor.
	 *
	 * @param \phpbb\controller\helper			$helper
	 * @param \phpbb\template\template			$template
	 *
	 * @return void
	 */
	public function __construct(
		\phpbb\controller\helper $helper,
		\phpbb\template\template $template
	)
	{
		$this->helper 			= $helper;
		$this->template 		= $template;
	}

	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'	=> 'load_language_on_setup',
			'core.page_header'	=> 'page_header',
		);
	}

	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'toxyy/html5chat',
			'lang_set' => 'html5chat_common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	public function page_header($event)
	{
		$this->template->assign_vars([
			'U_HTML5_CHAT' => $this->helper->route('html5chat_entry'),
		]);
	}
}
