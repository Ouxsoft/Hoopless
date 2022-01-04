<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211224033039 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_item ADD title VARCHAR(255) DEFAULT NULL');
        $this->addSql("INSERT INTO `menu` (`menu_id`, `name`, `created`, `updated`) VALUES (NULL, 'Site Footer', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        $this->addSql("INSERT INTO `page` (`page_id`, `page_parent_id`, `title`, `url`, `keywords`, `template`, `created`, `updated`) VALUES (NULL, '1', 'Backend', '/backend', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        $this->addSql("INSERT INTO `page` (`page_id`, `page_parent_id`, `title`, `url`, `keywords`, `template`, `created`, `updated`) VALUES (NULL, '23', 'Login', '/backend/login', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        $this->addSql("INSERT INTO `menu_item` (`menu_item_id`, `menu_id`, `parent_menu_item_id`, `page_id`, `url`, `order`, `created`, `updated`, `title`) VALUES (NULL, '3', NULL, '3', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL), (NULL, '3', NULL, '24', NULL, NULL, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, NULL)");

        // about menu
        $this->addSQL("INSERT INTO `menu` (`menu_id`, `name`, `created`, `updated`) VALUES (NULL, 'About', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE menu_item DROP title');
    }
}
