<?php
defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;
use Joomla\CMS\Session\Session;
use Joomla\CMS\Router\Route;

class GreetingController extends BaseController
{
    function display($cachable = false, $urlparams = array()) 
    {
        $app = Factory::getApplication();
        $app->input->set('view', 'greetings');
        parent::display($cachable, $urlparams); 
    }

    function add() 
    {
        $app = Factory::getApplication();
        $app->input->set('view', 'greeting');
        parent::display();
    }

    public function edit()
    {
        $app = Factory::getApplication();
        $app->input->set('view', 'greeting');
        parent::display();
    }

    function delete() 
    {
        $app = Factory::getApplication();

        Session::checkToken() or die("Invalid Token");

        // $app = Factory::getApplication();
        $input = $app->input;
        $cid = $input->get('cid', array(), 'array');

        $model = $this->getModel('greeting');

        foreach ($cid as $id) {
            if ($model->delete($id)) {
                $this->setMessage('Deleted successfully');
            } else {
                Factory::getApplication()->enqueueMessage('Delete failed ' . implode('', $model->getErrors()), 'warning');
            }
        }

        $this->setRedirect(Route::_('index.php?option=com_greeting&c=greeting', false));
    }

    public function save()
    {
        if (!Session::checkToken('post')) {
            throw new \Exception('Invalid Token');
        }

        $data = $this->input->post->get('jform', array(), 'array');

        $model = $this->getModel('greeting');

        try {
            if ($model->save($data)) {
                $this->setMessage('Save successfully');
            } else {
                throw new \Exception('Save failed');
            }
        } catch (\Exception $e) {
            $this->setMessage('Save failed: ' . $e->getMessage(), 'error');
        }
        $this->setRedirect(Route::_('index.php?option=com_greeting&view=greeting', false));
    }
}