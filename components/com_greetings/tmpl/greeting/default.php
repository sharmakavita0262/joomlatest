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

// Import CSS
$wa = $this->document->getWebAssetManager();
$wa->useStyle('com_greetings.show');
?>

<div class="item_fields">

	<table class="table">
		<tr>
			<td class="greeting__title"><?php echo $this->item->title; ?></td>
		</tr>
		<tr>
			<td class="greeting__message"><?php echo nl2br($this->item->message); ?></td>
		</tr>
	</table>

</div>

