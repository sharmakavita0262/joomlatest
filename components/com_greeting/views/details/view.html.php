<?php
defined('_JEXEC') or die;

class GreetingViewDetails extends JViewLegacy
{
    protected $item;

    public function display($tpl = null)
    {
        $model = $this->getModel();
        $this->item = $model->getItem();

        if (!$this->item) {
            throw new Exception(JText::_('COM_GREETING_ITEM_NOT_FOUND'), 404);
        }

        parent::display($tpl);
    }
}
