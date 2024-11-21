<?php

defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Model\ListModel;

class GreetingModelGreetings extends ListModel 
{    
    public function __construct($config = array()) 
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                'name', 'name',
                'detail', 'detail'
            );
        }
        parent::__construct($config);
    }        

    protected function populateState($ordering = null, $direction = null) 
    {
        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);
        parent::populateState('id', 'asc');
    }       

    protected function getListQuery() 
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $query = $db->getQuery(true);
        $query->select('*')->from($db->quoteName('#__greetings'));

        if ($this->getState('filter.search') !== '') {                    
            $token = $db->quote('%' . $db->escape($this->getState('filter.search'), true) . '%');
            $searches = array();
            $searches[] = $db->quoteName('name') . ' LIKE ' . $token;
            $searches[] = $db->quoteName('detail') . ' LIKE ' . $token;
            $query->where('(' . implode(' OR ', $searches) . ')');
        }              

        $query->order(
            $db->escape($this->getState('list.ordering', 'id')) . ' ' . 
            $db->escape($this->getState('list.direction', 'ASC'))
        );
        
        return $query;
    }
}

?>