<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\MVC\Controller\BaseController;

$app = Factory::getApplication();
$input = $app->input;

ComponentHelper::getComponent('com_greeting');

$controllerName = $input->getCmd('controller', 'greeting');
$controllerName = $controllerName ?: 'greeting';
$controllerClass = 'GreetingController' . ucfirst($controllerName);

$controllerPath = __DIR__ . '/controllers/' . strtolower($controllerName) . '_controller.php';

if (file_exists($controllerPath)) {
    require_once $controllerPath;
}

if (!class_exists($controllerClass)) {
    $controllerClass = 'GreetingController';
    require_once __DIR__ . '/controllers/greeting_controller.php';
}

$controller = new $controllerClass();
$controller->execute($input->get('task'));
$controller->redirect();