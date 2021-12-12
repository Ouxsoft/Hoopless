<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211210054636 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_item ADD menu_id INT NOT NULL');
        $this->addSql('ALTER TABLE `menu_item` CHANGE `menu_id` `menu_id` INT NOT NULL AFTER `menu_item_id` ');
    }

    public function postUp(Schema $schema) : void
    {
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`) VALUES (NULL, '1', '4', NULL, NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP), (NULL, '1', '5', NULL, NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");

        $this->addSql("UPDATE `menu_item` SET `parent_menu_item_id` = NULL, `page_id` = '3' WHERE `menu_item`.`menu_item_id` = 2");
        $this->addSql("UPDATE `menu_item` SET `parent_menu_item_id` = NULL, `page_id` = '4' WHERE `menu_item`.`menu_item_id` = 3");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_item DROP menu_id');
    }
}
