<?php
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;
use Joomla\CMS\Factory;

class GreetingViewGreeting extends BaseHtmlView
{
    function display($tpl = null)
    {
        $this->form = $this->get('Form');
        $this->addToolbar();
        parent::display($tpl);
    }

    function addToolbar()
    {
        ToolbarHelper::save();
        ToolbarHelper::cancel();
    }
}