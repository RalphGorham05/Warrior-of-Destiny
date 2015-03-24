-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2014 at 11:10 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `game_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `base_character`
--

CREATE TABLE IF NOT EXISTS `base_character` (
  `character_type_id` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `character_type_desc` varchar(100) NOT NULL,
  `hp` int(11) NOT NULL DEFAULT '0',
  `ap` int(11) NOT NULL DEFAULT '0',
  `speed` int(11) NOT NULL DEFAULT '0',
  `strength` int(11) NOT NULL DEFAULT '0',
  `luck` int(11) NOT NULL DEFAULT '0',
  `intelligence` int(11) NOT NULL DEFAULT '0',
  `chi` int(11) NOT NULL DEFAULT '0',
  `stealth` int(11) NOT NULL DEFAULT '0',
  `good_evil_flg` char(1) DEFAULT NULL,
  `npc_flg` char(1) DEFAULT NULL,
  `boss_flg` char(1) DEFAULT NULL,
  PRIMARY KEY (`character_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `base_character`
--

INSERT INTO `base_character` (`character_type_id`, `character_type_desc`, `hp`, `ap`, `speed`, `strength`, `luck`, `intelligence`, `chi`, `stealth`, `good_evil_flg`, `npc_flg`, `boss_flg`) VALUES
(001, 'Boxer', 88, 85, 3, 5, 2, 3, 2, 1, 'g', NULL, NULL),
(002, 'MMA', 88, 85, 3, 3, 2, 2, 3, 3, 'b', NULL, NULL),
(003, 'BJJ', 85, 85, 4, 2, 5, 2, 2, 1, 'g', NULL, NULL),
(004, 'Ninja', 83, 83, 5, 1, 1, 1, 2, 6, 'e', NULL, NULL),
(005, 'Muay Thai', 92, 90, 4, 4, 2, 2, 3, 1, 'e', NULL, NULL),
(006, 'Sambo', 100, 90, 1, 6, 3, 1, 4, 1, 'e', NULL, NULL),
(007, 'Fast', 81, 88, 6, 1, 4, 0, 4, 5, NULL, 't', NULL),
(008, 'Strong', 110, 95, 1, 7, 4, 0, 5, 3, NULL, 't', NULL),
(009, 'Balanced', 93, 93, 4, 4, 4, 0, 4, 4, NULL, 't', NULL),
(010, 'Lucky', 83, 85, 3, 2, 7, 0, 3, 5, NULL, 't', NULL),
(011, 'AP', 82, 110, 3, 2, 5, 0, 7, 3, NULL, 't', NULL),
(012, 'Commander Naked Head Basher', 150, 120, 6, 6, 10, 0, 7, 4, NULL, NULL, 't'),
(013, 'King Pies', 160, 140, 6, 7, 7, 0, 8, 7, NULL, NULL, 't'),
(014, 'Brazilian MotherChoker', 130, 125, 9, 6, 5, 0, 7, 5, NULL, NULL, 't'),
(015, 'Chuck Tyson', 175, 160, 6, 10, 7, 0, 8, 5, NULL, NULL, 't'),
(016, 'Mockodile Crundee', 120, 125, 4, 6, 5, 0, 7, 7, NULL, NULL, 't'),
(017, 'Sir Joffrey', 110, 150, 5, 5, 9, 0, 7, 8, NULL, NULL, 't'),
(018, 'Golden Samurai', 150, 145, 6, 9, 5, 0, 8, 4, NULL, NULL, 't'),
(019, 'Lei Bruce', 180, 200, 10, 8, 8, 0, 7, 4, NULL, NULL, 't'),
(021, 'Monk', 80, 100, 2, 1, 3, 4, 5, 1, 'g', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `boss_character_attack`
--

CREATE TABLE IF NOT EXISTS `boss_character_attack` (
  `attack_id` int(8) NOT NULL AUTO_INCREMENT,
  `attack_desc` varchar(75) NOT NULL,
  `damage` int(11) NOT NULL,
  `cost` int(4) DEFAULT NULL,
  `character_type_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`attack_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `boss_character_attack`
--

INSERT INTO `boss_character_attack` (`attack_id`, `attack_desc`, `damage`, `cost`, `character_type_id`) VALUES
(96, 'Haymaker of the Bishop', 15, 14, 17),
(97, 'The Mountain', 30, 27, 17),
(98, 'Kingslayer', 40, 40, 17),
(99, 'Starfish', 0, 55, 13),
(100, 'Yeti', 22, 20, 13),
(101, 'Abominable Snowman', 35, 30, 13),
(102, '20 Cracks Choke', 25, 27, 14),
(103, 'Hell''s Grip', 20, 15, 14),
(104, 'Black Hole', 40, 40, 14),
(105, '1000 Sticks', 30, 30, 12),
(106, 'Head of Rocks', 22, 20, 12),
(107, 'The Big Stick', 37, 35, 12),
(108, 'Delta Force Stirke', 40, 37, 15),
(109, 'Ear Ripper', 15, 12, 15),
(110, 'Texas Ranger Kick', 27, 25, 15),
(111, 'Boomerang from Down Under', 15, 17, 16),
(112, 'They Call Me Machete', 20, 22, 16),
(113, 'My Crocodile Friend', 45, 50, 16),
(114, 'Sword of Fire', 30, 32, 18),
(115, '500 Slashes', 42, 40, 18),
(116, 'Off With Your Head', 35, 35, 18),
(117, 'Enter the Dragon', 35, 37, 19),
(118, 'Green Hornet', 25, 27, 19),
(119, 'The Last Dragon', 44, 45, 19);

-- --------------------------------------------------------

--
-- Table structure for table `character_attack`
--

CREATE TABLE IF NOT EXISTS `character_attack` (
  `attack_id` int(3) NOT NULL DEFAULT '0',
  `character_type_id` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`character_type_id`,`attack_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `character_attack`
--

INSERT INTO `character_attack` (`attack_id`, `character_type_id`) VALUES
(1, 0),
(2, 0),
(3, 0),
(4, 0),
(5, 0),
(6, 0),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 2),
(32, 2),
(33, 2),
(34, 2),
(35, 2);

-- --------------------------------------------------------

--
-- Table structure for table `character_related_text`
--

CREATE TABLE IF NOT EXISTS `character_related_text` (
  `text_id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `character_type_id` int(10) unsigned zerofill NOT NULL,
  `fight_start` varchar(250) DEFAULT NULL,
  `fight_win` varchar(250) DEFAULT NULL,
  `fight_lose` varchar(250) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`text_id`,`character_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `character_related_text`
--

INSERT INTO `character_related_text` (`text_id`, `character_type_id`, `fight_start`, `fight_win`, `fight_lose`, `bio`) VALUES
(0000000007, 0000000001, 'I''m going to bend you in half.', 'You went night night.', 'I should have ran like Mayweather. ', 'A mild mannered man with a squeaky voice but once he starts fighting becomes a beast.   '),
(0000000008, 0000000002, 'You can''t be someone trained in everything.', 'How did my foot taste?', 'I will continue my journey to master everything. ', 'Looking to master all styles to become best fighter.  All around good fighter,  well versed in various techniques and styles. '),
(0000000009, 0000000003, 'Let me know what you dreamed about after you wake up.', 'All men go to sleep.', 'I need to learn how to strike.', 'Grew up in the slums of Brazil and looking for an outlet, turned to JiuJitsu. As a way to escape the violence that surrounded him, he let BJJ consume him. '),
(0000000010, 0000000004, 'Prepare for the silent death. ', 'How you can beat a shadow?', 'I didnt think you could saw me. ', 'Stealthy assassin trained in the art of deception. It is said that this purveyor of darkness controls the ancient elements. '),
(0000000011, 0000000005, 'I dont break.', 'You break.', 'I have failed the ancient.', 'Abandoned in a beach paradise somewhere in Thailand, grew up to be anything but soft like the sand that surrounded him. Has a body as solid as the sacred elephant. Have limbs as hard as pure steel. '),
(0000000012, 0000000006, 'Prepare for pounding.', 'Nothing can stop me, not even the cold.', 'I must be getting old.', 'Frigid hulk of a man. Can control the ice and withstand radiation after surviving Chernobyl. Bent on path of destruction since losing family in Chernobyl incident. Blames the world.'),
(0000000013, 0000000012, 'My stick is bigger than yours.', 'Did you hear the voices also?', 'The devil made me do it.', ''),
(0000000014, 0000000013, 'yel', 'whewee', 'owah', NULL),
(0000000015, 0000000014, 'Dont let my size fool you, just because I am small.', 'Size doesnt matter when I''m involved', 'You''re lucky that youre bigger than me. ', NULL),
(0000000016, 0000000015, 'Don''t let me see your children.', 'I was a POW and stopped an invasion by myself. What did you do?', 'Oh well', NULL),
(0000000017, 0000000016, 'Aye mate, say hello to my little friend', 'You can''t beat a crocodile.', 'Good fight, mate!', NULL),
(0000000018, 0000000017, 'I will have your head on a spike.', 'Time to see what your head looks like on a spike. ', 'I will have your head on a spike.', NULL),
(0000000019, 0000000018, 'I fight for the honor of myself.', 'Honor is the greatest motivator.', 'I lost my honor. I will kill myself now.', NULL),
(0000000020, 0000000019, 'You must be like water. ', 'Boards dont hit back', 'Even in defeat, I still win.', NULL),
(0000000021, 0000000021, 'You are going to learn today. ', 'Time is the greatest teacher.', 'My bones ache.', 'A wise old man who has studied the Shaolin style for as long as he could remember.  He may be small in stature but he is big in wisdom. ');

-- --------------------------------------------------------

--
-- Table structure for table `geography_city`
--

CREATE TABLE IF NOT EXISTS `geography_city` (
  `city_id` int(2) NOT NULL DEFAULT '0',
  `city_name` varchar(150) NOT NULL,
  `continent_id` int(1) NOT NULL,
  `style` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `geography_city`
--

INSERT INTO `geography_city` (`city_id`, `city_name`, `continent_id`, `style`) VALUES
(1, 'Research Station Alpha', 1, 'Genetics'),
(2, 'Frozen Rock', 1, 'Ice Style'),
(3, 'Peter Island', 1, NULL),
(4, 'New Zealand', 2, 'Taiaha'),
(5, 'Sydney', 2, 'Kangaroo Boxing'),
(6, 'Tasmania', 2, NULL),
(7, 'Okinawa', 3, 'Karate'),
(8, 'Korea', 3, 'Tae KwonDo'),
(9, 'India', 3, 'Gatka'),
(10, 'Shanghai', 3, 'Wing Chun'),
(11, 'Tokyo', 3, 'Aikido'),
(12, 'Mt. Fuji', 3, 'Sumo'),
(13, 'Malaysia', 3, 'Silat'),
(14, 'Temple', 3, 'WuTang'),
(15, 'Israel', 3, 'Krav Maga'),
(16, 'Chinatown', 3, 'Tai Chi'),
(17, 'Hong Kong', 3, NULL),
(18, 'Beijing', 3, NULL),
(19, 'South Africa', 4, 'Nguni Stick Fighting'),
(20, 'Congo', 4, 'Mukumbusu'),
(21, 'Zimbabwe', 4, 'Gwindulumutu'),
(22, 'Liberia', 4, NULL),
(23, 'Nigeria', 4, 'Dambe'),
(24, 'Belgium', 5, 'Kickboxing'),
(25, 'Paris', 5, 'Savate'),
(26, 'London', 5, NULL),
(27, 'Norway', 5, 'Stav'),
(28, 'Switzerland', 5, 'Fencing'),
(29, 'Siberia', 5, 'Systema'),
(30, 'Scotland', 5, 'Shin Kicking'),
(31, 'NYC', 6, 'Wrestling'),
(32, 'Alcatraz', 6, 'Jailhouse Rock'),
(33, 'Boston', 6, 'Oom Yung Doe'),
(34, 'West VA', 6, 'Eye Gouging'),
(35, 'Chicago', 6, 'Street Fighting'),
(36, 'NC', 6, NULL),
(37, 'Montreal', 6, 'Okitchitaw'),
(38, 'Las Vegas', 6, 'The Cane As A Weapon'),
(39, 'LA', 6, 'Chun Kuk Do'),
(40, 'Caritoba', 7, 'Vale Tudo'),
(41, 'Venezuela', 7, 'Vacon'),
(42, 'Argentina', 7, 'Capoeira'),
(43, 'Lima', 7, 'Rumi Maki'),
(44, 'Rio de Janeiro', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `geography_continents`
--

CREATE TABLE IF NOT EXISTS `geography_continents` (
  `continent_id` int(1) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `continent_name` varchar(100) NOT NULL,
  PRIMARY KEY (`continent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `geography_continents`
--

INSERT INTO `geography_continents` (`continent_id`, `continent_name`) VALUES
(1, 'Anartica'),
(2, 'Australia'),
(3, 'Asia'),
(4, 'Africa'),
(5, 'Europe'),
(6, 'North America'),
(7, 'South America');

-- --------------------------------------------------------

--
-- Table structure for table `npc_character`
--

CREATE TABLE IF NOT EXISTS `npc_character` (
  `npc_character_id` int(3) unsigned zerofill NOT NULL DEFAULT '000',
  `npc_character_name` varchar(100) DEFAULT NULL,
  `city_id` int(3) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`npc_character_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `npc_character`
--

INSERT INTO `npc_character` (`npc_character_id`, `npc_character_name`, `city_id`) VALUES
(000, 'Tuco', 040),
(001, 'Dr. Frostman', 001),
(002, 'Ice Guy', 002),
(003, 'Mr. Fubu', 015),
(004, 'Caesar', 016),
(005, 'Lion Spear', 018),
(006, 'Moshing Sandman', 017),
(007, 'Dancing Tortuga', 035),
(008, 'Grace', 033),
(009, 'Smoking Iguana', 036),
(010, 'Chief Mountaintop', 034),
(011, 'Shawn "Cold Stone" Johnson', 025),
(012, '25', 026),
(013, 'One Eyed Pete', 028),
(014, 'Kool Jimmy ', 027),
(015, 'General Clay', 031),
(016, 'Lemon Peel', 029),
(017, 'Dudkoff', 032),
(018, 'Canadian Punisher', 030),
(019, 'Ben Fostershire', 003),
(020, 'Demon of Tazmania', 004),
(021, 'Sean Paul Dame Van', 019),
(022, 'Pierre G.', 020),
(023, 'Erik Thunderborn', 021),
(024, 'Cold Feather', 023),
(025, 'Twinkletoes', 022),
(026, 'Lord Clegane', 024),
(027, 'Pony Tailed Fat Seagull', 009),
(028, 'Chocolate ', 006),
(029, 'Sandstorm', 013),
(030, 'Ghost Faced Chef', 012),
(031, 'Long-Legged Killer', 005),
(032, 'Prince Xianche', 011),
(033, 'Eatsan', 010),
(034, 'Jet Chan', 014),
(035, 'Praying Monster', 007),
(036, 'Donnie Yeoh', 008),
(037, 'Paz', 041),
(038, 'Ace', 042),
(039, 'Vega', 043),
(040, 'Prieto', 043);

-- --------------------------------------------------------

--
-- Table structure for table `npc_character_attack`
--

CREATE TABLE IF NOT EXISTS `npc_character_attack` (
  `attack_id` int(8) NOT NULL AUTO_INCREMENT,
  `attack_name` varchar(75) NOT NULL,
  `damage` int(11) NOT NULL,
  `ap_cost` int(4) DEFAULT NULL,
  `unique_flag` char(1) DEFAULT NULL,
  `cities_id` int(2) DEFAULT NULL,
  PRIMARY KEY (`attack_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

--
-- Dumping data for table `npc_character_attack`
--

INSERT INTO `npc_character_attack` (`attack_id`, `attack_name`, `damage`, `ap_cost`, `unique_flag`, `cities_id`) VALUES
(1, 'Cold As Ice', 32, 30, 'y', 2),
(2, 'Strong Isiquili', 35, 35, 'y', 19),
(3, 'Gorilla Fist', 20, 15, 'y', 20),
(4, 'Glass Covered Fist', 28, 27, 'y', 21),
(5, 'Rooster''s Crow', 22, 20, 'y', 23),
(6, 'Break Kick', 26, 25, 'y', 42),
(7, 'Stone Hands', 29, 30, 'y', 43),
(8, 'Deceptive Strikes', 21, 20, 'y', 41),
(9, 'Neck Breaker', 25, 25, 'y', 40),
(10, 'Jumping Piledriver', 34, 35, 'y', 31),
(11, '104 Hand Blocks', 30, 30, 'y', 32),
(12, 'Cyclops', 32, 30, 'y', 34),
(13, 'Drink the KoolAid', 21, 17, 'y', 33),
(14, 'Whippersnapper', 20, 18, 'y', 38),
(15, 'One Hitter Quitter', 35, 33, 'y', 35),
(16, '3 Ninjas ', 34, 32, 'y', 39),
(17, 'Grandfather''s Fist', 19, 15, 'y', 37),
(18, 'Jumping Nut Buster', 22, 20, 'y', 5),
(19, 'Tu Matauenga', 23, 23, 'y', 4),
(20, 'Epic Split Kick', 36, 38, 'y', 24),
(21, 'Mirrors Edge', 15, 14, '', NULL),
(22, 'Double Spinning Back Kick', 25, 25, 'y', 25),
(23, 'Wrath of Odin', 27, 25, 'y', 27),
(24, 'Pointy End ', 31, 30, 'y', 28),
(25, '20 Pressure Points', 23, 23, 'y', 29),
(26, 'Steel Tipped Boots', 22, 23, 'y', 30),
(27, 'Marked for Death', 24, 23, 'y', 11),
(28, 'Rage of Phoenix', 28, 26, 'y', 8),
(29, 'Drunken Monkey', 29, 27, 'y', 14),
(30, 'Wind Dance', 27, 26, 'y', 16),
(31, 'Nose Crushing Palm', 24, 25, 'y', 15),
(32, 'Demon Kris', 30, 29, 'y', 13),
(33, 'Horse Punch', 30, 30, 'y', 7),
(34, 'Swallower', 27, 28, 'y', 12),
(35, 'Ip', 31, 30, 'y', 10),
(36, '8 armed goddess', 25, 29, 'y', 9),
(37, 'Bull rush', 25, 24, NULL, NULL),
(38, 'Snake Fist', 27, 25, NULL, NULL),
(39, 'Super Knee', 23, 21, NULL, NULL),
(40, 'Fist of Light', 22, 21, NULL, NULL),
(41, 'The Darkness', 21, 20, NULL, NULL),
(42, 'TZA', 27, 25, NULL, NULL),
(43, 'Man of Methods', 30, 31, NULL, NULL),
(44, 'Iron Chef', 28, 27, NULL, NULL),
(45, '20 Legs from Above', 20, 19, NULL, NULL),
(46, 'ShadowWalker', 21, 20, NULL, NULL),
(47, 'Valar Morghulis', 31, 33, NULL, NULL),
(48, '3 Headed Dragon', 32, 34, NULL, NULL),
(49, 'Dancing Master', 29, 27, NULL, NULL),
(50, 'Prickly Needle', 26, 25, NULL, NULL),
(51, 'Shadow of the Night', 25, 26, NULL, NULL),
(52, 'Beastmaster 12', 23, 21, NULL, NULL),
(53, 'Goon Blast', 27, 25, NULL, NULL),
(54, 'Rack of Torture', 20, 22, NULL, NULL),
(55, 'Bottom of the Rock', 30, 31, NULL, NULL),
(56, 'Lovely Cheek Tunes', 31, 32, NULL, NULL),
(57, 'Death Valley NailDriver', 33, 35, NULL, NULL),
(58, 'Atomic Legs', 20, 20, NULL, NULL),
(59, 'Toad Splash', 21, 20, NULL, NULL),
(60, 'WigSplitter', 28, 30, NULL, NULL),
(61, 'Shonuff', 24, 24, NULL, NULL),
(62, 'Devour', 23, 22, NULL, NULL),
(63, 'Black Magic Man', 29, 28, NULL, NULL),
(64, 'Smooth Deviant', 25, 25, NULL, NULL),
(65, 'Bugs Marching', 32, 30, NULL, NULL),
(66, 'No Mercy', 30, 30, NULL, NULL),
(67, 'Ticking Bomb', 29, 30, NULL, NULL),
(68, 'Lie In Your Grave', 34, 32, NULL, NULL),
(69, 'Run This City', 28, 30, NULL, NULL),
(70, 'FrostBite', 25, 28, 'y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `playable_character_attack`
--

CREATE TABLE IF NOT EXISTS `playable_character_attack` (
  `attack_id` int(8) NOT NULL AUTO_INCREMENT,
  `attack_name` varchar(75) NOT NULL,
  `damage` int(11) NOT NULL,
  `ap_cost` int(4) DEFAULT NULL,
  `character_type_id` int(11) DEFAULT NULL,
  `unique_flg` char(1) DEFAULT NULL,
  PRIMARY KEY (`attack_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `playable_character_attack`
--

INSERT INTO `playable_character_attack` (`attack_id`, `attack_name`, `damage`, `ap_cost`, `character_type_id`, `unique_flg`) VALUES
(1, 'Flying Dragon Fists', 10, 14, 21, 'y'),
(2, 'Bald Headed Eagle Strike', 18, 15, 21, 'y'),
(3, 'Shaolin Secret Move of Doom', 20, 35, 21, 'y'),
(4, 'Meditating Dragon', 20, 30, 21, NULL),
(5, 'Iron Palm', 23, 35, 21, NULL),
(6, '18 Tigers', 18, 22, 21, NULL),
(7, 'Meditation', 0, 0, 21, NULL),
(8, 'Healing Prayer', 0, 30, 21, NULL),
(9, 'Cleansing Mist', 15, 20, 21, NULL),
(10, '100 Palms Strike', 23, 40, 21, NULL),
(11, 'Crane Fist', 18, 15, 21, NULL),
(12, 'Tiger Palm', 10, 25, 21, NULL),
(13, 'Dragon’s Wrath', 12, 18, 21, NULL),
(14, '18 Deadly Poles', 21, 35, 21, NULL),
(15, '36 Chambers of Death', 25, 40, 21, NULL),
(16, 'Tattooed Face Ear Bite', 18, 20, 1, 'y'),
(17, 'Floating Butterfly Jab', 8, 13, 1, 'y'),
(18, 'Children Eater Haymaker', 22, 25, 1, 'y'),
(19, 'Sting of the Bumblebee', 20, 20, 1, NULL),
(20, 'Corner Rest', 20, 20, 1, NULL),
(21, 'Double Uppercut', 21, 19, 1, NULL),
(22, '1-2 Combo', 21, 22, 1, NULL),
(23, 'Body shot', 12, 10, 1, NULL),
(24, 'Mayweather', 1, 1, 1, NULL),
(25, 'Dancing Fists', 23, 27, 1, NULL),
(26, 'Okie Doke', 27, 20, 1, NULL),
(27, 'Straight Left', 13, 12, 1, NULL),
(28, 'Lightning Hook', 28, 30, 1, NULL),
(29, 'Below the Belt', 22, 23, 1, NULL),
(30, 'Illegal Headbutt', 23, 26, 1, NULL),
(31, 'Face Crushing Kick', 15, 18, 2, 'y'),
(32, '20 hit combo w/ Takedown', 20, 22, 2, 'y'),
(33, 'Sexy Armbar', 30, 31, 2, 'y'),
(34, 'Silverback Slam', 24, 24, 2, NULL),
(35, 'Lights Out', 18, 20, 2, NULL),
(36, 'Nap Time', 25, 26, 2, NULL),
(37, 'Call Cut Man', 0, 22, 2, NULL),
(38, 'Lay on Top of You', 0, 1, 2, NULL),
(39, '1-2 Combo', 21, 22, 2, NULL),
(40, 'Body shot', 12, 10, 2, NULL),
(41, 'Taste My Foot', 25, 25, 2, NULL),
(42, '40 Knees', 32, 33, 2, NULL),
(43, 'Tornado Elbow', 18, 18, 2, NULL),
(44, 'Tap Out Now', 23, 24, 2, NULL),
(45, 'TKO', 24, 25, 2, NULL),
(46, 'Blood Rushing Choke', 21, 23, 3, 'y'),
(47, 'Never Gonna Let You Go', 22, 25, 3, 'y'),
(48, 'You Better Tap', 28, 30, 3, 'y'),
(49, 'Smother', 0, 1, 3, NULL),
(50, 'Say Gracie', 22, 25, 3, NULL),
(51, 'Leg Snap', 25, 26, 3, NULL),
(52, 'Full Mount', 29, 30, 3, NULL),
(53, 'Rest', 0, 20, 3, NULL),
(54, 'Heel Lock', 24, 22, 3, NULL),
(55, 'Take Your Arm Back', 22, 20, 3, NULL),
(56, '10 G Neck Crank', 27, 25, 3, NULL),
(57, 'Can Opener', 25, 23, 3, NULL),
(58, 'Wake Up, Its Over Already', 30, 30, 3, NULL),
(59, 'Hidden Mist', 20, 18, 4, 'y'),
(60, 'Blowgun Fury', 15, 12, 4, 'y'),
(61, 'Silent Night w/ Stars', 27, 29, 4, 'y'),
(62, 'Slap ''Em Silly', 18, 18, 4, NULL),
(63, 'Typhoon', 28, 29, 4, NULL),
(64, 'Mega Groin Kick', 25, 24, 4, NULL),
(65, 'From the Ground Up', 22, 24, 4, NULL),
(66, 'Walking on Air', 29, 27, 4, NULL),
(67, 'Poison Breath', 32, 30, 4, NULL),
(68, 'You Cant See Me', 29, 25, 4, NULL),
(69, 'Snake Eyes Shadow', 21, 18, 4, NULL),
(70, 'The Fifth Element', 19, 15, 4, NULL),
(71, 'Head buster', 29, 27, 5, 'y'),
(72, 'Elephant Knee Strike', 11, 10, 5, 'y'),
(73, '100 Bones Breaker', 28, 31, 5, 'y'),
(74, 'Ride the Elephant', 15, 14, 5, NULL),
(75, 'Throw Hot Soup in Face', 15, 15, 5, NULL),
(76, 'Stab With Big Knife', 17, 15, 5, NULL),
(77, '80 Elbows', 25, 24, 5, NULL),
(78, 'Don’t Get Me Mad', 17, 21, 5, NULL),
(79, 'Elbow Crazy', 22, 23, 5, NULL),
(80, 'Flying Knee', 18, 18, 5, NULL),
(81, 'Elephant Horns', 20, 19, 5, NULL),
(82, 'Ground Pounder', 32, 33, 6, 'y'),
(83, 'Siberian Head Stomp', 30, 30, 6, 'y'),
(84, 'Mother Russia', 29, 31, 6, 'y'),
(85, 'The Dolph', 28, 30, 6, NULL),
(86, 'Hulker', 25, 27, 6, NULL),
(87, 'Blast of Radiation', 23, 25, 6, NULL),
(88, 'Tombstone Piledriver', 18, 18, 6, NULL),
(89, 'Take a breather', 0, 1, 6, NULL),
(90, 'Lights Out', 27, 30, 6, NULL),
(91, 'Bye Bye', 16, 17, 6, NULL),
(92, 'Cant Stop, Wont Stop', 18, 24, 6, NULL),
(93, 'Super Fist', 21, 23, 6, NULL),
(94, 'The Fedor', 29, 30, 6, NULL),
(95, '10 Megaton Blast', 26, 28, 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `potion`
--

CREATE TABLE IF NOT EXISTS `potion` (
  `potion_id` int(8) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `potion_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`potion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `potion`
--

INSERT INTO `potion` (`potion_id`, `potion_desc`) VALUES
(00000001, 'Min HP'),
(00000002, 'Maj HP'),
(00000003, 'Min AP'),
(00000004, 'Maj Ap');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `password`) VALUES
('new', 'new'),
('test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `user_character`
--

CREATE TABLE IF NOT EXISTS `user_character` (
  `user_id` varchar(50) NOT NULL,
  `character_type_id` int(3) unsigned zerofill NOT NULL,
  `character_level` int(11) NOT NULL DEFAULT '0',
  `hp` int(11) NOT NULL DEFAULT '0',
  `ap` int(11) NOT NULL DEFAULT '0',
  `speed` int(11) NOT NULL,
  `strength` int(11) NOT NULL DEFAULT '0',
  `luck` int(11) NOT NULL DEFAULT '0',
  `intelligence` int(11) NOT NULL DEFAULT '0',
  `chi` int(11) NOT NULL DEFAULT '0',
  `stealth` int(11) NOT NULL DEFAULT '0',
  `attack_id_1` int(8) unsigned zerofill NOT NULL,
  `attack_id_2` int(8) unsigned zerofill NOT NULL,
  `attack_id_3` int(8) unsigned zerofill NOT NULL,
  `xp` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_character`
--

INSERT INTO `user_character` (`user_id`, `character_type_id`, `character_level`, `hp`, `ap`, `speed`, `strength`, `luck`, `intelligence`, `chi`, `stealth`, `attack_id_1`, `attack_id_2`, `attack_id_3`, `xp`) VALUES
('new', 005, 0, 92, 90, 5, 5, 3, 3, 3, 2, 00000072, 00000073, 00000071, 0),
('test', 005, 0, 92, 90, 4, 4, 2, 7, 3, 1, 00000072, 00000073, 00000071, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
