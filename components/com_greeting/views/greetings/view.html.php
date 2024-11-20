<?php
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
use Joomla\CMS\Toolbar\ToolbarHelper;
use \Greeting\Component\Greeting\Administrator\Helper\GreetingHelper;

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
        $state = $this->get('State');
		$canDo = GreetingHelper::getActions();

		ToolbarHelper::title(Text::_('COM_GREETINGS_TITLE_GREETINGS'), "generic");

		$toolbar = Toolbar::getInstance('toolbar');

		// Check if the form exists before showing the add/edit buttons
		$formPath = JPATH_COMPONENT_ADMINISTRATOR . '/src/View/Greetings';

		if (file_exists($formPath))
		{
			if ($canDo->get('core.create'))
			{
				$toolbar->addNew('greeting.add');
			}
		}
    }
}

?>