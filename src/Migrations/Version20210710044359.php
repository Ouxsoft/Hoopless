<?php

declare(strict_types=1);

namespace Ouxsoft\Hoopless\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210710044359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE content_type_group_access (acl_id INT AUTO_INCREMENT NOT NULL, type INT NOT NULL, user_id BLOB NOT NULL, timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(acl_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content_type_schema (schema_id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name BLOB NOT NULL, machine_name BLOB NOT NULL, class_name BLOB NOT NULL, description BLOB NOT NULL, timestamp DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(schema_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE news CHANGE body body TEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE content_type_group_access');
        $this->addSql('DROP TABLE content_type_schema');
        $this->addSql('ALTER TABLE news CHANGE body body BLOB NOT NULL');
    }
}
