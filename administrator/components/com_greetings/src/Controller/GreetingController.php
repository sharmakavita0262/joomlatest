<?php
/**
 * @version    CVS: 1.0.1
 * @package    Com_Greetings
 * @author     Joomla! Test Project <admin@joomla.org>
 * @copyright  (C) 2006 Open Source Matters, Inc.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Greetings\Component\Greetings\Administrator\Controller;

\defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\FormController;

/**
 * Greeting controller class.
 *
 * @since  1.0.1
 */
class GreetingController extends FormController
{
	protected $view_list = 'greetings';
}
