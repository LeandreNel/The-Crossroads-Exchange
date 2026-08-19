-- The Crossroads Exchange database schema and seed data
-- Compatible with MySQL 8.0+ and MariaDB 10.5+

CREATE DATABASE IF NOT EXISTS crossroads_exchange
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE crossroads_exchange;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS trade_responses;
DROP TABLE IF EXISTS game_sessions;
DROP TABLE IF EXISTS ending_tiers;
DROP TABLE IF EXISTS visitors;
DROP TABLE IF EXISTS starting_stock;
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS characters;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE characters (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  slug VARCHAR(32) NOT NULL,
  name VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  location_title VARCHAR(150) NOT NULL,
  location_description TEXT NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_characters_slug (slug)
) ENGINE = InnoDB;

CREATE TABLE items (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  image_path VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_items_name (name)
) ENGINE = InnoDB;

CREATE TABLE starting_stock (
  item_id INT UNSIGNED NOT NULL,
  quantity INT UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (item_id),
  CONSTRAINT fk_starting_stock_item
    FOREIGN KEY (item_id) REFERENCES items (id)
    ON DELETE CASCADE
) ENGINE = InnoDB;

CREATE TABLE visitors (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  display_order TINYINT UNSIGNED NOT NULL,
  name VARCHAR(100) NOT NULL,
  role VARCHAR(100) NOT NULL,
  avatar_path VARCHAR(255) NOT NULL,
  quote TEXT NOT NULL,
  request_item_id INT UNSIGNED NOT NULL,
  offer_item_id INT UNSIGNED NOT NULL,
  accept_reputation SMALLINT NOT NULL DEFAULT 0,
  reject_reputation SMALLINT NOT NULL DEFAULT 0,
  PRIMARY KEY (id),
  UNIQUE KEY uq_visitors_display_order (display_order),
  CONSTRAINT fk_visitors_request_item
    FOREIGN KEY (request_item_id) REFERENCES items (id),
  CONSTRAINT fk_visitors_offer_item
    FOREIGN KEY (offer_item_id) REFERENCES items (id)
) ENGINE = InnoDB;

CREATE TABLE ending_tiers (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  minimum_reputation INT NOT NULL,
  title VARCHAR(50) NOT NULL,
  summary TEXT NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY uq_ending_tiers_minimum_reputation (minimum_reputation)
) ENGINE = InnoDB;

CREATE TABLE game_sessions (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  character_id INT UNSIGNED NOT NULL,
  reputation INT NOT NULL DEFAULT 0,
  current_visitor_order TINYINT UNSIGNED NOT NULL DEFAULT 0,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  completed_at TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_game_sessions_character
    FOREIGN KEY (character_id) REFERENCES characters (id)
) ENGINE = InnoDB;

CREATE TABLE trade_responses (
  id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  session_id BIGINT UNSIGNED NOT NULL,
  visitor_id INT UNSIGNED NOT NULL,
  accepted BOOLEAN NOT NULL,
  reputation_change SMALLINT NOT NULL,
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  UNIQUE KEY uq_trade_responses_session_visitor (session_id, visitor_id),
  CONSTRAINT fk_trade_responses_session
    FOREIGN KEY (session_id) REFERENCES game_sessions (id)
    ON DELETE CASCADE,
  CONSTRAINT fk_trade_responses_visitor
    FOREIGN KEY (visitor_id) REFERENCES visitors (id)
) ENGINE = InnoDB;

INSERT INTO characters (slug, name, description, location_title, location_description) VALUES
  ('witch', 'The Witch', 'Herbs, hexes, and a suspiciously good cup of tea.', 'The Witch''s Hollow', 'A crooked little hut with smoke curling the wrong color and jars judging you from every windowsill. Whoever knocks today, you''ll brew them something - the question is which kind.'),
  ('blacksmith', 'The Blacksmith', 'Every hammer swing has two possible futures.', 'The Ember Forge', 'Sparks drift up through the chimney gap like tiny fireflies who took a wrong turn. Someone''s always waiting outside with a very specific request and an unconvincing excuse. What you shape is honest - what happens to it after isn''t your problem. Probably.'),
  ('alchemist', 'The Alchemist', 'One tiny measurement away from ''oops''.', 'The Peppermint Atelier', 'A pocket-sized cottage with a mint-green door that always looks like it''s smiling. Inside, pastel potions fizz softly on tiny shelves, each one glowing like it''s keeping a sweet little secret. A drowsy cat in a star-speckled apron guards a teacup cauldron bubbling with sparkles. The whole place smells like honey, peppermint, and gentle magic.'),
  ('rogue', 'The Rogue', 'Finders keepers, askers... also keepers, technically.', 'The Hollow Den', 'A lantern-lit little stash behind a door that definitely isn''t supposed to be there. Everything down here has a story nobody''s telling. No judgment, no backstories - just good deals and questionable provenance.');

INSERT INTO items (name, image_path) VALUES
  ('Iron Ingot', 'img/ironIngot.png'),
  ('Obsidian Shard', 'img/obsidianShard.png'),
  ('Lantern Oil', 'img/lanternOil.png'),
  ('Wolfbane Sprig', 'img/wolfbaneSprig.png'),
  ('Harvest Bread', 'img/harvestBread.png'),
  ('Moonstone', 'img/moonStone.png'),
  ('Healing Poultice', 'img/healingPoultrice.png'),
  ('Blessed Candle', 'img/blessedCandle.png'),
  ('Grave Dust', 'img/graveDust.png'),
  ('Stolen Ring', 'img/stolenRing.png'),
  ('Cursed Coin', 'img/cursedCoin.png');

INSERT INTO starting_stock (item_id, quantity)
SELECT id, CASE name
  WHEN 'Iron Ingot' THEN 2
  WHEN 'Lantern Oil' THEN 1
  WHEN 'Wolfbane Sprig' THEN 1
  WHEN 'Harvest Bread' THEN 2
  ELSE 0
END
FROM items;

INSERT INTO visitors
  (display_order, name, role, avatar_path, quote, request_item_id, offer_item_id, accept_reputation, reject_reputation)
SELECT 1, 'Old Bramblewick', 'the hedge healer', 'img/oldBramblewick.png', 'My granddaughter''s fever won''t break, and the herb woman two villages over wants coin I don''t have. A sprig of wolfsbane, prepared right, is all a poultice like this one needs. I''ll trade you one I''ve already made - it''s done its work on worse.', request.id, offer.id, 2, -1
FROM items request CROSS JOIN items offer WHERE request.name = 'Wolfbane Sprig' AND offer.name = 'Healing Poultice'
UNION ALL
SELECT 2, 'Tomas Ironhand', 'the fair smith', 'img/thomasIronhand.png', 'Give me the iron, and I''ll shape you something with a real edge. Splitting kindling, mostly - maybe skinning game if the winter''s bad. You have my word it won''t leave these hills.', request.id, offer.id, 1, -1
FROM items request CROSS JOIN items offer WHERE request.name = 'Iron Ingot' AND offer.name = 'Obsidian Shard'
UNION ALL
SELECT 3, 'Grix the Pawnbroker', 'no questions asked', 'img/grixThePawnbroker.png', 'Oil for iron. I don''t ask what you''re lighting, you don''t ask where these ingots have been. Fair trade either way, far as I''m concerned.', request.id, offer.id, 0, 0
FROM items request CROSS JOIN items offer WHERE request.name = 'Lantern Oil' AND offer.name = 'Iron Ingot'
UNION ALL
SELECT 4, 'Sister Marrow', 'the plague-witch', 'img/sisterMarrow.png', 'There''s a man in the valley who wronged my sister and sleeps easy every night for it. Wolfsbane''s sweet enough in a stew he''d never notice. Give it to me, and I''ll give you dust that listens better than any prayer you''ve said.', request.id, offer.id, -2, 1
FROM items request CROSS JOIN items offer WHERE request.name = 'Wolfbane Sprig' AND offer.name = 'Grave Dust'
UNION ALL
SELECT 5, 'Yenna the Wayfinder', 'the traveling cartographer', 'img/yennaTheWayfinder.png', 'Six families waiting past the ridge, empty bellies, no light to walk by after dark. Bread for a moonstone - it''ll guide you same as it''ll guide them, but they need it more tonight.', request.id, offer.id, 2, -1
FROM items request CROSS JOIN items offer WHERE request.name = 'Harvest Bread' AND offer.name = 'Moonstone'
UNION ALL
SELECT 6, 'Brother Aldous', 'the quiet monk', 'img/brotherAldous.png', 'There''s a woman two villages over who hasn''t slept without pain in a year. If you''re carrying a poultice, give it to me and I''ll trade you a candle that''s outlasted worse storms than the one you''re walking into.', request.id, offer.id, 2, -1
FROM items request CROSS JOIN items offer WHERE request.name = 'Healing Poultice' AND offer.name = 'Blessed Candle'
UNION ALL
SELECT 7, 'The Widow in Grey', 'keeper of secrets', 'img/theWidowInGrey.png', 'I know a man who''d pay well to learn where his brother''s hiding. One letter, sealed with grave dust instead of wax, and he''ll believe every word of it. Hand it over, and I''ll give you a ring taken off a hand that won''t be missing it.', request.id, offer.id, -2, 1
FROM items request CROSS JOIN items offer WHERE request.name = 'Grave Dust' AND offer.name = 'Stolen Ring'
UNION ALL
SELECT 8, 'The Tithe Collector', 'faceless and patient', 'img/theTitheCollector.png', 'That ring isn''t yours to keep - I know whose hand it came off, and I know where to find them. Hand it over, and what''s left of that debt gets collected quietly. Everyone sleeps easier when these things get settled.', request.id, offer.id, 1, 0
FROM items request CROSS JOIN items offer WHERE request.name = 'Stolen Ring' AND offer.name = 'Cursed Coin';

INSERT INTO ending_tiers (minimum_reputation, title, summary) VALUES
  (10, 'Saintly', 'You traded with more hearts than pockets. Your judgement left the crossroads a kinder place.'),
  (5, 'Honest', 'You kept more promises than you broke. No songs written about you, but no curses either.'),
  (1, 'Pragmatic', 'You balanced mercy and survival. The crossroads remember you as practical and wary.'),
  (-4, 'Questionable', 'You walked a thin line. Some left grateful, others left suspicious.'),
  (-999, 'Sinister', 'You took more than you gave. The crossroads whisper your name with a shiver.');
