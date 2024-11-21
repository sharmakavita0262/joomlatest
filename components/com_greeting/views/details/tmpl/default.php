<?php
defined('_JEXEC') or die;

if (!$this->item) {
    echo JText::_('COM_GREETING_ITEM_NOT_FOUND');
    return;
}
?>

<h1><?php echo $this->escape($this->item->title); ?></h1>
<p><?php echo $this->escape($this->item->message); ?></p>
