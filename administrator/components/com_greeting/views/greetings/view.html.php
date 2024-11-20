<?php
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;

class GreetingViewGreetings extends BaseHtmlView 
{    
    function display($tpl = null) 
    {
        $this->items = $this->get('Items');
        $this->pagination = $this->get('Pagination');
        $this->state = $this->get('State');
        $this->addToolbar();
        parent::display($tpl);
    }   

    function addToolbar() 
    {
        ToolbarHelper::title('Greeting List');
        ToolbarHelper::addNew('add');
        ToolbarHelper::editList('edit');
        ToolbarHelper::deleteList('Are you sure?', 'delete');
    }
}

?>