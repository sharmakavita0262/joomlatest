<?php
/**
 * @version    CVS: 1.0.1
 * @package    Com_Greetings
 * @author     Joomla! Test Project <admin@joomla.org>
 * @copyright  (C) 2006 Open Source Matters, Inc.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;
use \Joomla\CMS\Session\Session;
use Joomla\Utilities\ArrayHelper;


?>

<div class="item_fields">

	<table class="table">
		

		<tr>
			<th><?php echo Text::_('COM_GREETINGS_FORM_LBL_GREETING_MESSAGE'); ?></th>
			<td><?php echo nl2br($this->item->message); ?></td>
		</tr>

		<tr>
			<th><?php echo Text::_('COM_GREETINGS_FORM_LBL_GREETING_TITLE'); ?></th>
			<td><?php echo $this->item->title; ?></td>
		</tr>

	</table>

</div>
