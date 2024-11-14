<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;

$document = $app->getDocument();

$h = $params->get('header', 'h4');
$greeting = "<{$h} class='mod_randomgreeting'>{$randomgreeting}</{$h}>";

Text::script('MOD_RANDOMGREETING_AJAX_OK');
Text::script('JLIB_JS_AJAX_ERROR_OTHER');
?>

<?php echo $greeting; ?>