<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211212044950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE menu (menu_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(menu_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_item (menu_item_id INT AUTO_INCREMENT NOT NULL, menu_id INT NOT NULL, parent_menu_item_id INT DEFAULT NULL, page_id INT DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, `order` INT DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(menu_item_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');

        $this->addSql("INSERT INTO `menu` (`menu_id`, `name`, `created`, `updated`) VALUES (NULL, 'Help', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '1', NULL, '3', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '1', NULL, '4', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");

        $this->addSql("INSERT INTO `menu` (`menu_id`, `name`, `created`, `updated`) VALUES (NULL, 'LHTML Elements', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '5', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '6', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '7', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '8', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '10', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '11', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '13', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '14', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '15', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '2', NULL, '16', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_item');
    }
}
