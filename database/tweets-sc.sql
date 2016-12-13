-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Dez-2016 às 16:05
-- Versão do servidor: 5.6.31-0ubuntu0.14.04.2
-- versão do PHP: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `tweets-sc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1480631130),
('m130524_201442_init', 1480631133);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tweet`
--

CREATE TABLE IF NOT EXISTS `tweet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `qtTrue` int(11) DEFAULT '0',
  `qtFalse` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tweet`
--

INSERT INTO `tweet` (`id`, `content`, `qtTrue`, `qtFalse`) VALUES
(1, '{\r\n    "contributors": null, \r\n    "coordinates": null, \r\n    "created_at": "Fri Dec 02 00:45:01 +0000 2016", \r\n    "entities": {\r\n        "hashtags": [], \r\n        "media": [\r\n            {\r\n                "display_url": "pic.twitter.com/gcDWFJbBB2", \r\n                "expanded_url": "https://twitter.com/g1/status/804486492936605696/photo/1", \r\n                "id": 804448968935612416, \r\n                "id_str": "804448968935612416", \r\n                "indices": [\r\n                    106, \r\n                    129\r\n                ], \r\n                "media_url": "http://pbs.twimg.com/media/Cyn6EzlWIAAmIyh.jpg", \r\n                "media_url_https": "https://pbs.twimg.com/media/Cyn6EzlWIAAmIyh.jpg", \r\n                "sizes": {\r\n                    "large": {\r\n                        "h": 240, \r\n                        "resize": "fit", \r\n                        "w": 460\r\n                    }, \r\n                    "medium": {\r\n                        "h": 240, \r\n                        "resize": "fit", \r\n                        "w": 460\r\n                    }, \r\n                    "small": {\r\n                        "h": 240, \r\n                        "resize": "fit", \r\n                        "w": 460\r\n                    }, \r\n                    "thumb": {\r\n                        "h": 150, \r\n                        "resize": "crop", \r\n                        "w": 150\r\n                    }\r\n                }, \r\n                "type": "photo", \r\n                "url": "https://t.co/gcDWFJbBB2"\r\n            }\r\n        ], \r\n        "symbols": [], \r\n        "urls": [\r\n            {\r\n                "display_url": "glo.bo/2fVZUIS", \r\n                "expanded_url": "http://glo.bo/2fVZUIS", \r\n                "indices": [\r\n                    82, \r\n                    105\r\n                ], \r\n                "url": "https://t.co/jSBeff5ZTq"\r\n            }\r\n        ], \r\n        "user_mentions": []\r\n    }, \r\n    "extended_entities": {\r\n        "media": [\r\n            {\r\n                "display_url": "pic.twitter.com/gcDWFJbBB2", \r\n                "expanded_url": "https://twitter.com/g1/status/804486492936605696/photo/1", \r\n                "id": 804448968935612416, \r\n                "id_str": "804448968935612416", \r\n                "indices": [\r\n                    106, \r\n                    129\r\n                ], \r\n                "media_url": "http://pbs.twimg.com/media/Cyn6EzlWIAAmIyh.jpg", \r\n                "media_url_https": "https://pbs.twimg.com/media/Cyn6EzlWIAAmIyh.jpg", \r\n                "sizes": {\r\n                    "large": {\r\n                        "h": 240, \r\n                        "resize": "fit", \r\n                        "w": 460\r\n                    }, \r\n                    "medium": {\r\n                        "h": 240, \r\n                        "resize": "fit", \r\n                        "w": 460\r\n                    }, \r\n                    "small": {\r\n                        "h": 240, \r\n                        "resize": "fit", \r\n                        "w": 460\r\n                    }, \r\n                    "thumb": {\r\n                        "h": 150, \r\n                        "resize": "crop", \r\n                        "w": 150\r\n                    }\r\n                }, \r\n                "type": "photo", \r\n                "url": "https://t.co/gcDWFJbBB2"\r\n            }\r\n        ]\r\n    }, \r\n    "favorite_count": 62, \r\n    "favorited": false, \r\n    "geo": null, \r\n    "id": 804486492936605696, \r\n    "id_str": "804486492936605696", \r\n    "in_reply_to_screen_name": null, \r\n    "in_reply_to_status_id": null, \r\n    "in_reply_to_status_id_str": null, \r\n    "in_reply_to_user_id": null, \r\n    "in_reply_to_user_id_str": null, \r\n    "is_quote_status": false, \r\n    "lang": "pt", \r\n    "place": null, \r\n    "possibly_sensitive": false, \r\n    "retweet_count": 15, \r\n    "retweeted": false, \r\n    "source": "<a href=\\"https://about.twitter.com/products/tweetdeck\\" rel=\\"nofollow\\">TweetDeck</a>", \r\n    "text": "Alckmin pede libera\\u00e7\\u00e3o de celulares nas salas de aula das escolas estaduais de SP https://t.co/jSBeff5ZTq https://t.co/gcDWFJbBB2", \r\n    "truncated": false, \r\n    "user": {\r\n        "contributors_enabled": false, \r\n        "created_at": "Tue Sep 11 04:05:49 +0000 2007", \r\n        "default_profile": false, \r\n        "default_profile_image": false, \r\n        "description": "O portal de not\\u00edcias da Globo", \r\n        "entities": {\r\n            "description": {\r\n                "urls": []\r\n            }, \r\n            "url": {\r\n                "urls": [\r\n                    {\r\n                        "display_url": "g1.com.br", \r\n                        "expanded_url": "http://g1.com.br", \r\n                        "indices": [\r\n                            0, \r\n                            22\r\n                        ], \r\n                        "url": "http://t.co/f4ZCAE4llQ"\r\n                    }\r\n                ]\r\n            }\r\n        }, \r\n        "favourites_count": 105, \r\n        "follow_request_sent": false, \r\n        "followers_count": 8694549, \r\n        "following": false, \r\n        "friends_count": 240, \r\n        "geo_enabled": false, \r\n        "has_extended_profile": false, \r\n        "id": 8802752, \r\n        "id_str": "8802752", \r\n        "is_translation_enabled": false, \r\n        "is_translator": false, \r\n        "lang": "pt", \r\n        "listed_count": 16620, \r\n        "location": "Brasil", \r\n        "name": "G1", \r\n        "notifications": false, \r\n        "profile_background_color": "F0F0F0", \r\n        "profile_background_image_url": "http://pbs.twimg.com/profile_background_images/378800000030360744/cce1da5d2f091b9eb6a9eb9e37c28831.jpeg", \r\n        "profile_background_image_url_https": "https://pbs.twimg.com/profile_background_images/378800000030360744/cce1da5d2f091b9eb6a9eb9e37c28831.jpeg", \r\n        "profile_background_tile": false, \r\n        "profile_banner_url": "https://pbs.twimg.com/profile_banners/8802752/1471946432", \r\n        "profile_image_url": "http://pbs.twimg.com/profile_images/652253314210467840/gdCnHsYD_normal.jpg", \r\n        "profile_image_url_https": "https://pbs.twimg.com/profile_images/652253314210467840/gdCnHsYD_normal.jpg", \r\n        "profile_link_color": "A80000", \r\n        "profile_sidebar_border_color": "FFFFFF", \r\n        "profile_sidebar_fill_color": "FFFFFF", \r\n        "profile_text_color": "000000", \r\n        "profile_use_background_image": false, \r\n        "protected": false, \r\n        "screen_name": "g1", \r\n        "statuses_count": 503790, \r\n        "time_zone": "Brasilia", \r\n        "translator_type": "none", \r\n        "url": "http://t.co/f4ZCAE4llQ", \r\n        "utc_offset": -7200, \r\n        "verified": true\r\n    }\r\n}', 0, 0),
(2, '{\r\n    "contributors": null, \r\n    "coordinates": null, \r\n    "created_at": "Tue Dec 13 00:30:02 +0000 2016", \r\n    "entities": {\r\n        "hashtags": [], \r\n        "media": [\r\n            {\r\n                "display_url": "pic.twitter.com/TUHjhhsWCs", \r\n                "expanded_url": "https://twitter.com/g1/status/808468990112792580/photo/1", \r\n                "id": 808424472487268356, \r\n                "id_str": "808424472487268356", \r\n                "indices": [\r\n                    74, \r\n                    97\r\n                ], \r\n                "media_url": "http://pbs.twimg.com/media/CzgZxkZWEAQvMGg.jpg", \r\n                "media_url_https": "https://pbs.twimg.com/media/CzgZxkZWEAQvMGg.jpg", \r\n                "sizes": {\r\n                    "large": {\r\n                        "h": 246, \r\n                        "resize": "fit", \r\n                        "w": 466\r\n                    }, \r\n                    "medium": {\r\n                        "h": 246, \r\n                        "resize": "fit", \r\n                        "w": 466\r\n                    }, \r\n                    "small": {\r\n                        "h": 246, \r\n                        "resize": "fit", \r\n                        "w": 466\r\n                    }, \r\n                    "thumb": {\r\n                        "h": 150, \r\n                        "resize": "crop", \r\n                        "w": 150\r\n                    }\r\n                }, \r\n                "type": "photo", \r\n                "url": "https://t.co/TUHjhhsWCs"\r\n            }\r\n        ], \r\n        "symbols": [], \r\n        "urls": [\r\n            {\r\n                "display_url": "glo.bo/2gzjaxS", \r\n                "expanded_url": "http://glo.bo/2gzjaxS", \r\n                "indices": [\r\n                    50, \r\n                    73\r\n                ], \r\n                "url": "https://t.co/jopeXozkKt"\r\n            }\r\n        ], \r\n        "user_mentions": []\r\n    }, \r\n    "extended_entities": {\r\n        "media": [\r\n            {\r\n                "display_url": "pic.twitter.com/TUHjhhsWCs", \r\n                "expanded_url": "https://twitter.com/g1/status/808468990112792580/photo/1", \r\n                "id": 808424472487268356, \r\n                "id_str": "808424472487268356", \r\n                "indices": [\r\n                    74, \r\n                    97\r\n                ], \r\n                "media_url": "http://pbs.twimg.com/media/CzgZxkZWEAQvMGg.jpg", \r\n                "media_url_https": "https://pbs.twimg.com/media/CzgZxkZWEAQvMGg.jpg", \r\n                "sizes": {\r\n                    "large": {\r\n                        "h": 246, \r\n                        "resize": "fit", \r\n                        "w": 466\r\n                    }, \r\n                    "medium": {\r\n                        "h": 246, \r\n                        "resize": "fit", \r\n                        "w": 466\r\n                    }, \r\n                    "small": {\r\n                        "h": 246, \r\n                        "resize": "fit", \r\n                        "w": 466\r\n                    }, \r\n                    "thumb": {\r\n                        "h": 150, \r\n                        "resize": "crop", \r\n                        "w": 150\r\n                    }\r\n                }, \r\n                "type": "photo", \r\n                "url": "https://t.co/TUHjhhsWCs"\r\n            }\r\n        ]\r\n    }, \r\n    "favorite_count": 11, \r\n    "favorited": false, \r\n    "geo": null, \r\n    "id": 808468990112792580, \r\n    "id_str": "808468990112792580", \r\n    "in_reply_to_screen_name": null, \r\n    "in_reply_to_status_id": null, \r\n    "in_reply_to_status_id_str": null, \r\n    "in_reply_to_user_id": null, \r\n    "in_reply_to_user_id_str": null, \r\n    "is_quote_status": false, \r\n    "lang": "pt", \r\n    "place": null, \r\n    "possibly_sensitive": false, \r\n    "retweet_count": 7, \r\n    "retweeted": false, \r\n    "source": "<a href=\\"https://about.twitter.com/products/tweetdeck\\" rel=\\"nofollow\\">TweetDeck</a>", \r\n    "text": "Idoso morre ao entrar por engano em favela no Rio https://t.co/jopeXozkKt https://t.co/TUHjhhsWCs", \r\n    "truncated": false, \r\n    "user": {\r\n        "contributors_enabled": false, \r\n        "created_at": "Tue Sep 11 04:05:49 +0000 2007", \r\n        "default_profile": false, \r\n        "default_profile_image": false, \r\n        "description": "O portal de not\\u00edcias da Globo", \r\n        "entities": {\r\n            "description": {\r\n                "urls": []\r\n            }, \r\n            "url": {\r\n                "urls": [\r\n                    {\r\n                        "display_url": "g1.com.br", \r\n                        "expanded_url": "http://g1.com.br", \r\n                        "indices": [\r\n                            0, \r\n                            22\r\n                        ], \r\n                        "url": "http://t.co/f4ZCAE4llQ"\r\n                    }\r\n                ]\r\n            }\r\n        }, \r\n        "favourites_count": 105, \r\n        "follow_request_sent": false, \r\n        "followers_count": 8730694, \r\n        "following": false, \r\n        "friends_count": 240, \r\n        "geo_enabled": false, \r\n        "has_extended_profile": false, \r\n        "id": 8802752, \r\n        "id_str": "8802752", \r\n        "is_translation_enabled": false, \r\n        "is_translator": false, \r\n        "lang": "pt", \r\n        "listed_count": 16691, \r\n        "location": "Brasil", \r\n        "name": "G1", \r\n        "notifications": false, \r\n        "profile_background_color": "F0F0F0", \r\n        "profile_background_image_url": "http://pbs.twimg.com/profile_background_images/378800000030360744/cce1da5d2f091b9eb6a9eb9e37c28831.jpeg", \r\n        "profile_background_image_url_https": "https://pbs.twimg.com/profile_background_images/378800000030360744/cce1da5d2f091b9eb6a9eb9e37c28831.jpeg", \r\n        "profile_background_tile": false, \r\n        "profile_banner_url": "https://pbs.twimg.com/profile_banners/8802752/1471946432", \r\n        "profile_image_url": "http://pbs.twimg.com/profile_images/652253314210467840/gdCnHsYD_normal.jpg", \r\n        "profile_image_url_https": "https://pbs.twimg.com/profile_images/652253314210467840/gdCnHsYD_normal.jpg", \r\n        "profile_link_color": "A80000", \r\n        "profile_sidebar_border_color": "FFFFFF", \r\n        "profile_sidebar_fill_color": "FFFFFF", \r\n        "profile_text_color": "000000", \r\n        "profile_use_background_image": false, \r\n        "protected": false, \r\n        "screen_name": "g1", \r\n        "statuses_count": 504876, \r\n        "time_zone": "Brasilia", \r\n        "translator_type": "none", \r\n        "url": "http://t.co/f4ZCAE4llQ", \r\n        "utc_offset": -7200, \r\n        "verified": true\r\n    }\r\n}', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'usuario1', '-XZOWh8hxeODXIAjk3mwupBy6MajGnAS', '$2y$13$XJiFRlsgn0uxs4MudBDJZuBiGt0wSAdBTFoWVmPW/5BZJDjDjB7Hy', NULL, 'usuario1@gmail.com', 10, 1480635263, 1480635263);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_ev_tweet`
--

CREATE TABLE IF NOT EXISTS `user_ev_tweet` (
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`tweet_id`),
  KEY `fk_user_has_tweet_tweet1_idx` (`tweet_id`),
  KEY `fk_user_has_tweet_user_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user_ev_tweet`
--

INSERT INTO `user_ev_tweet` (`user_id`, `tweet_id`, `type`) VALUES
(1, 1, 1),
(1, 2, 2);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `user_ev_tweet`
--
ALTER TABLE `user_ev_tweet`
  ADD CONSTRAINT `fk_user_has_tweet_tweet1` FOREIGN KEY (`tweet_id`) REFERENCES `tweet` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_has_tweet_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
