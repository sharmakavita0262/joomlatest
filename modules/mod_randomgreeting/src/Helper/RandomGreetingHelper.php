<?php

namespace My\Module\RandomGreeting\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Application\SiteApplication;
use Joomla\CMS\Factory;
use Joomla\Registry\Registry;
use Joomla\Database\DatabaseAwareInterface;
use Joomla\Database\DatabaseAwareTrait;
use Joomla\Database\DatabaseInterface;
use Joomla\Module\Logged\Administrator\Helper\LoggedHelper;
use Joomla\CMS\Language\Text;

class RandomGreetingHelper implements DatabaseAwareInterface
{
    use DatabaseAwareTrait;

    public function getRandomGreeting(SiteApplication $app)
    {
        $db   = $this->getDatabase();
        
        $query = $db->getQuery(true)
            ->select($db->quoteName(['a.message']))
            ->from($db->quoteName('#__greetings', 'a'));

        $db->setQuery($query);

        try {
            $greetings = (array) $db->loadObjectList();

            return $greetings[array_rand($greetings)]->message;
        } catch (\RuntimeException $e) {
            $app->enqueueMessage(Text::_('JERROR_AN_ERROR_HAS_OCCURRED'), 'error');
            return '';
        }
    }

    public function countAjax() {

        $user = Factory::getApplication()->getIdentity();
        if ($user->id == 0)  // not logged on
        {
            throw new \Exception(Text::_('JERROR_ALERTNOAUTHOR'));
        }
        else
        {
            $params = new Registry(array('count' => 0));
            $app = Factory::getApplication();
            $db = Factory::getContainer()->get(DatabaseInterface::class);
            $users = LoggedHelper::getList($params, $app, $db);
            return (string)count($users);
        }
    }
}