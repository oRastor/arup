<?php

use Phinx\Migration\AbstractMigration;

class Init extends AbstractMigration
{

    /**
     * Migrate Up.
     */
    public function up()
    {
		$this->execute("
CREATE TABLE `cars` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`recordId` INT(10) UNSIGNED NOT NULL,
	`name` VARCHAR(50) NOT NULL COLLATE 'utf8_unicode_ci',
	`year` YEAR NOT NULL,
	`price` MEDIUMINT(8) UNSIGNED NOT NULL DEFAULT '0',
	`displacement` DECIMAL(3,2) UNSIGNED NOT NULL DEFAULT '0.00',
	`mileage` SMALLINT(5) UNSIGNED NOT NULL DEFAULT '0',
	`addDate` DATETIME NOT NULL,
	`city` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`cityName` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`fullInfoUrl` VARCHAR(200) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`description` VARCHAR(200) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`broken` TINYINT(4) NOT NULL DEFAULT '0',
	`accident` TINYINT(4) NOT NULL DEFAULT '0',
	`customsProblem` TINYINT(4) NOT NULL DEFAULT '0',
	`fuel` ENUM('benzine','diesel','gas','gasBenzine','hybrid','electro','methaneGas','propaneButaneGas','other','undefined') NOT NULL DEFAULT 'undefined' COLLATE 'utf8_unicode_ci',
	`gearbox` ENUM('automatic','adaptive','CVT','manual','tiptronic','undefined') NOT NULL DEFAULT 'undefined' COLLATE 'utf8_unicode_ci',
	`thumbnail` VARCHAR(200) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`),
	UNIQUE INDEX `item_id` (`itemId`)
)
COLLATE='utf8_unicode_ci'
ENGINE=InnoDB
AUTO_INCREMENT=5197");
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}