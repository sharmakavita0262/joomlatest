<?php
/**
 * @version    CVS: 1.0.1
 * @package    Com_Greetings
 * @author     Joomla! Test Project <admin@joomla.org>
 * @copyright  (C) 2006 Open Source Matters, Inc.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Greetings\Component\Greetings\Administrator\Field;

defined('JPATH_BASE') or die;

use \Joomla\CMS\Form\FormField;
use \Joomla\CMS\Factory;

/**
 * Supports an HTML select list of categories
 *
 * @since  1.0.1
 */
class ModifiedbyField extends \Joomla\CMS\Form\FormField
{
	/**
	 * The form field type.
	 *
	 * @var    string
	 * @since  1.0.1
	 */
	protected $type = 'modifiedby';

	/**
	 * Method to get the field input markup.
	 *
	 * @return  string    The field input markup.
	 *
	 * @since   1.0.1
	 */
	protected function getInput()
	{
		// Initialize variables.
		$html   = array();
		$user = Factory::getApplication()->getIdentity();
		$html[] = '<input type="hidden" name="' . $this->name . '" value="' . $user->id . '" />';
		if (!$this->hidden)
		{
			$html[] = "<div>" . $user->name . " (" . $user->username . ")</div>";
		}

		return implode($html);
	}
}
