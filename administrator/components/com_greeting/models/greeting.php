<?php
defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\MVC\Model\FormModel;
use Joomla\CMS\Factory;
class GreetingModelGreeting extends FormModel
{
    public function getForm($data = array(), $loadData = false)
    {
        if (isset($_GET['task']) && $_GET['task'] == 'edit') $loadData = true;
        if(isset($_POST['cid']) && is_array($_POST['cid']) && count($_POST['cid']) > 0) $loadData = true;
        $options = array('control' => 'jform', 'load_data' => $loadData);
        $form = $this->loadForm('com_greeting.greeting', 'greeting', $options);
        if (empty($form)) {
            return false;
        }
        return $form;
    }

    public function save($data)
    {
        $db = Factory::getContainer()->get('DatabaseDriver');
        $obj = (object) $data;

        try {
            if ($obj->id) {
                $db->updateObject('ea1bf_greeting_greeting', $obj, 'id');
            } else {
                $db->insertObject('ea1bf_greeting_greeting', $obj, 'id');
            }
        } catch (\RuntimeException $exc) {
            Factory::getApplication()->enqueueMessage($exc->getMessage(), 'error');
            return false;
        }

        return true;
    }

    public function getItem()
    {

        $app = Factory::getApplication();
        $input = $app->input;

        $pk = $input->get('cid', array(), 'array');
    
        if (is_array($pk)) {
            $pk = (int) $pk[0];
        }
    
        if ($pk === 0) {
            return false;
        }
    
        $db = Factory::getContainer()->get('DatabaseDriver');
        $query = $db->getQuery(true);
        $query->select('*')
              ->from($db->quoteName('ea1bf_greeting_greeting'))
              ->where($db->quoteName('id') . ' = ' . $db->quote($pk));
    
        $db->setQuery($query);
    
        try {
            $result = $db->loadObject();
        } catch (RuntimeException $exe) {
             Factory::getApplication()->enqueueMessage($exe->getMessage(), 'error');
            return false;
        }
    
        return $result;
    }

    function delete($id) 
    {
            $db = Factory::getContainer()->get('DatabaseDriver');
            $query = $db->getQuery(true);
            try {
                    $query->delete('ea1bf_greeting_greeting')
                            ->where($db->quoteName('id').'='.$db->quote($id));
                    $db->setQuery($query);
                    $db->execute();
            } catch (RuntimeException $exc) {
                 Factory::getApplication()->enqueueMessage($exc->getMessage(), 'error');
                return false;
            }
            return true;
    } 

    protected function loadFormData()
    {
        $data = $this->getItem();
        return $data;
    }

}