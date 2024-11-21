<?php
defined('_JEXEC') or die;

$h = $params->get('header', 'h4');
$greeting = "<{$h} class='mod_randomgreeting'>{$randomgreeting}</{$h}>";
?>

<?php echo $greeting; ?>