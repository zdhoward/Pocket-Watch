CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` bigint(20) unsigned NOT NULL auto_increment,
  `user_id` bigint(20) NOT NULL REFERENCES `users`(`user_id`),
  `session_key` varchar(60) NOT NULL,
  `session_address` varchar(100) NOT NULL,
  `session_useragent` varchar(200) NOT NULL,
  `session_expires` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY (`session_id`),
  KEY `idx_session_key` (`session_key`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
