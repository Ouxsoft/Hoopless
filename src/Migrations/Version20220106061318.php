<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220106061318 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE resource (resource_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(resource_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (role_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(role_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_resource (role_resource_id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, resource_id INT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(role_resource_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_role (user_role_id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, role_id INT NOT NULL, PRIMARY KEY(user_role_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE group_permission');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE user_permission');
        $this->addSql('ALTER TABLE file MODIFY event_id INT NOT NULL');
        $this->addSql('ALTER TABLE file DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE file CHANGE event_id file_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE file ADD PRIMARY KEY (file_id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F93CB796C FOREIGN KEY (file_id) REFERENCES file (file_id)');
        $this->addSql('CREATE INDEX IDX_C53D045F93CB796C ON image (file_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `group` (group_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(group_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE group_permission (group_permission_id INT AUTO_INCREMENT NOT NULL, group_id INT NOT NULL, permission_id INT NOT NULL, PRIMARY KEY(group_permission_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE permission (permission_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, description VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(permission_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_permission (user_permission_id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, permission_id INT NOT NULL, PRIMARY KEY(user_permission_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE resource');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_resource');
        $this->addSql('DROP TABLE user_role');
        $this->addSql('ALTER TABLE file MODIFY file_id INT NOT NULL');
        $this->addSql('ALTER TABLE file DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE file CHANGE file_id event_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE file ADD PRIMARY KEY (event_id)');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F93CB796C');
        $this->addSql('DROP INDEX IDX_C53D045F93CB796C ON image');
    }
}
