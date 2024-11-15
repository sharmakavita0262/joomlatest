<?php

namespace My\Module\RandomGreeting\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Application\SiteApplication;
use Joomla\Database\DatabaseAwareInterface;
use Joomla\Database\DatabaseAwareTrait;
use Joomla\CMS\Language\Text;

class RandomGreetingHelper implements DatabaseAwareInterface
{
    use DatabaseAwareTrait;

    /**
     * Method to get a random greeting
     *
     * @param   SiteApplication  $app  The application object
     *
     * @return  string  The random greeting
     *
     * @since   1.0.0
     */
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
}