-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Creato il: Mar 27, 2021 alle 13:20
-- Versione del server: 8.0.23
-- Versione PHP: 7.4.16
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `economy`
--
CREATE DATABASE IF NOT EXISTS `economy` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `economy`;
--
-- Database: `php_bb`
--
CREATE DATABASE IF NOT EXISTS `php_bb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_bb`;

-- --------------------------------------------------------

--
-- Struttura della tabella `phpbb_profile_fields_data`
--

CREATE TABLE `phpbb_profile_fields_data` (
     `user_id` int UNSIGNED NOT NULL DEFAULT '0',
     `pf_phpbb_interests` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
     `pf_phpbb_occupation` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
     `pf_phpbb_location` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_phpbb_youtube` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_phpbb_skype` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_phpbb_icq` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_phpbb_facebook` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_phpbb_googleplus` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_phpbb_website` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_phpbb_twitter` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_phpbb_yahoo` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_phpbb_aol` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
     `pf_callsign` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
     `pf_vid` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `phpbb_profile_fields_data`
--

INSERT INTO `phpbb_profile_fields_data` (`user_id`, `pf_phpbb_interests`, `pf_phpbb_occupation`, `pf_phpbb_location`, `pf_phpbb_youtube`, `pf_phpbb_skype`, `pf_phpbb_icq`, `pf_phpbb_facebook`, `pf_phpbb_googleplus`, `pf_phpbb_website`, `pf_phpbb_twitter`, `pf_phpbb_yahoo`, `pf_phpbb_aol`, `pf_callsign`, `pf_vid`) VALUES
(1, '', '', '', '', '', '', '', '', '', '', '', '', 'SCI001', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `phpbb_users`
--

CREATE TABLE `phpbb_users` (
   `user_id` int UNSIGNED NOT NULL,
   `user_type` tinyint NOT NULL DEFAULT '0',
   `group_id` mediumint UNSIGNED NOT NULL DEFAULT '3',
   `user_permissions` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
   `user_perm_from` mediumint UNSIGNED NOT NULL DEFAULT '0',
   `user_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_regdate` int UNSIGNED NOT NULL DEFAULT '0',
   `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `username_clean` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_passchg` int UNSIGNED NOT NULL DEFAULT '0',
   `user_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_email_hash` bigint NOT NULL DEFAULT '0',
   `user_birthday` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_lastvisit` int UNSIGNED NOT NULL DEFAULT '0',
   `user_lastmark` int UNSIGNED NOT NULL DEFAULT '0',
   `user_lastpost_time` int UNSIGNED NOT NULL DEFAULT '0',
   `user_lastpage` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_last_confirm_key` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_last_search` int UNSIGNED NOT NULL DEFAULT '0',
   `user_warnings` tinyint NOT NULL DEFAULT '0',
   `user_last_warning` int UNSIGNED NOT NULL DEFAULT '0',
   `user_login_attempts` tinyint NOT NULL DEFAULT '0',
   `user_inactive_reason` tinyint NOT NULL DEFAULT '0',
   `user_inactive_time` int UNSIGNED NOT NULL DEFAULT '0',
   `user_posts` mediumint UNSIGNED NOT NULL DEFAULT '0',
   `user_lang` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_timezone` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_dateformat` varchar(64) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'd M Y H:i',
   `user_style` mediumint UNSIGNED NOT NULL DEFAULT '0',
   `user_rank` mediumint UNSIGNED NOT NULL DEFAULT '0',
   `user_colour` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_new_privmsg` int NOT NULL DEFAULT '0',
   `user_unread_privmsg` int NOT NULL DEFAULT '0',
   `user_last_privmsg` int UNSIGNED NOT NULL DEFAULT '0',
   `user_message_rules` tinyint UNSIGNED NOT NULL DEFAULT '0',
   `user_full_folder` int NOT NULL DEFAULT '-3',
   `user_emailtime` int UNSIGNED NOT NULL DEFAULT '0',
   `user_topic_show_days` smallint UNSIGNED NOT NULL DEFAULT '0',
   `user_topic_sortby_type` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 't',
   `user_topic_sortby_dir` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'd',
   `user_post_show_days` smallint UNSIGNED NOT NULL DEFAULT '0',
   `user_post_sortby_type` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 't',
   `user_post_sortby_dir` varchar(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'a',
   `user_notify` tinyint UNSIGNED NOT NULL DEFAULT '0',
   `user_notify_pm` tinyint UNSIGNED NOT NULL DEFAULT '1',
   `user_notify_type` tinyint NOT NULL DEFAULT '0',
   `user_allow_pm` tinyint UNSIGNED NOT NULL DEFAULT '1',
   `user_allow_viewonline` tinyint UNSIGNED NOT NULL DEFAULT '1',
   `user_allow_viewemail` tinyint UNSIGNED NOT NULL DEFAULT '1',
   `user_allow_massemail` tinyint UNSIGNED NOT NULL DEFAULT '1',
   `user_options` int UNSIGNED NOT NULL DEFAULT '230271',
   `user_avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_avatar_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_avatar_width` smallint UNSIGNED NOT NULL DEFAULT '0',
   `user_avatar_height` smallint UNSIGNED NOT NULL DEFAULT '0',
   `user_sig` mediumtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
   `user_sig_bbcode_uid` varchar(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_sig_bbcode_bitfield` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_jabber` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_actkey` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_newpasswd` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_form_salt` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
   `user_new` tinyint UNSIGNED NOT NULL DEFAULT '1',
   `user_reminded` tinyint NOT NULL DEFAULT '0',
   `user_reminded_time` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dump dei dati per la tabella `phpbb_users`
--

INSERT INTO `phpbb_users` (`user_id`, `user_type`, `group_id`, `user_permissions`, `user_perm_from`, `user_ip`, `user_regdate`, `username`, `username_clean`, `user_password`, `user_passchg`, `user_email`, `user_email_hash`, `user_birthday`, `user_lastvisit`, `user_lastmark`, `user_lastpost_time`, `user_lastpage`, `user_last_confirm_key`, `user_last_search`, `user_warnings`, `user_last_warning`, `user_login_attempts`, `user_inactive_reason`, `user_inactive_time`, `user_posts`, `user_lang`, `user_timezone`, `user_dateformat`, `user_style`, `user_rank`, `user_colour`, `user_new_privmsg`, `user_unread_privmsg`, `user_last_privmsg`, `user_message_rules`, `user_full_folder`, `user_emailtime`, `user_topic_show_days`, `user_topic_sortby_type`, `user_topic_sortby_dir`, `user_post_show_days`, `user_post_sortby_type`, `user_post_sortby_dir`, `user_notify`, `user_notify_pm`, `user_notify_type`, `user_allow_pm`, `user_allow_viewonline`, `user_allow_viewemail`, `user_allow_massemail`, `user_options`, `user_avatar`, `user_avatar_type`, `user_avatar_width`, `user_avatar_height`, `user_sig`, `user_sig_bbcode_uid`, `user_sig_bbcode_bitfield`, `user_jabber`, `user_actkey`, `user_newpasswd`, `user_form_salt`, `user_new`, `user_reminded`, `user_reminded_time`) VALUES
(1, 0, 3, '', 0, '', 0, 'testuser', '', '$2y$10$vF8QZwH6YkmPHzvDC5qT/.EZYYSsolDzUsdmBcxzCbVHdoy.KLxga', 0, '', 0, '', 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, '', '', 'd M Y H:i', 0, 0, '', 0, 0, 0, 0, -3, 0, 0, 't', 'd', 0, 't', 'a', 0, 1, 0, 1, 1, 1, 1, 230271, '', '', 0, 0, '', '', '', '', '', '', '', 1, 0, 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `phpbb_profile_fields_data`
--
ALTER TABLE `phpbb_profile_fields_data`
    ADD PRIMARY KEY (`user_id`);

--
-- Indici per le tabelle `phpbb_users`
--
ALTER TABLE `phpbb_users`
    ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username_clean` (`username_clean`),
  ADD KEY `user_birthday` (`user_birthday`),
  ADD KEY `user_email_hash` (`user_email_hash`),
  ADD KEY `user_type` (`user_type`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `phpbb_users`
--
ALTER TABLE `phpbb_users`
    MODIFY `user_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
