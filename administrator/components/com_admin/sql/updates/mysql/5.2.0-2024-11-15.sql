--
-- Table structure for table `#__greetings`
--

CREATE TABLE IF NOT EXISTS `#__greetings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `message` TEXT,
  `timestamp` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 DEFAULT COLLATE=utf8mb4_unicode_ci COMMENT='Secure TUF Updates';

-- Add mod_articles module
INSERT INTO `#__extensions` (`package_id`, `name`, `type`, `element`, `folder`, `client_id`, `enabled`, `access`, `protected`, `locked`, `manifest_cache`, `params`, `custom_data`) VALUES
(0, 'mod_articles', 'module', 'mod_articles', '', 0, 1, 0, 0, 1, '', '', '');


--
-- Dumping data for table `#__modules`
--

INSERT INTO `#__modules` (`asset_id`, `title`, `note`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `published`, `module`, `access`, `showtitle`, `params`, `client_id`, `language`) VALUES
(109, 'Random Greeting', '', '', 1, 'main-top', NULL, NULL, NULL, NULL, 1, 'mod_randomgreeting', 1, 0, '{\"header\":\"h4\",\"module_tag\":\"main\",\"bootstrap_size\":\"1\",\"header_tag\":\"h3\",\"header_class\":\"\",\"style\":\"0\"}', 0, '*');