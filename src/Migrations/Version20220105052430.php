<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220105052430 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (address_id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, street_address_1 VARCHAR(255) DEFAULT NULL, street_address_2 VARCHAR(255) DEFAULT NULL, locality VARCHAR(255) DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, INDEX IDX_D4E6F81F92F3E70 (country_id), PRIMARY KEY(address_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE person (person_id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, address_id INT DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(person_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD person_id INT NOT NULL, DROP first_name, DROP last_name');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81F92F3E70 FOREIGN KEY (country_id) REFERENCES country (country_id)');
        $this->addSql('ALTER TABLE menu_item ADD CONSTRAINT FK_D754D550CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (menu_id)');
        $this->addSql('ALTER TABLE menu_item ADD CONSTRAINT FK_D754D550C4663E4 FOREIGN KEY (page_id) REFERENCES page (page_id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649217BBB47 FOREIGN KEY (person_id) REFERENCES person (person_id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176217BBB47 FOREIGN KEY (person_id) REFERENCES user (person_id)');
        $this->addSql('ALTER TABLE place DROP streetAddress1, DROP streetAddress2, DROP locality, DROP region, DROP postal_code, DROP country_id');
        $this->addSql('CREATE INDEX IDX_D754D550CCD7E912 ON menu_item (menu_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D754D550C4663E4 ON menu_item (page_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649217BBB47 ON user (person_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE IF EXISTS address');
        $this->addSql('DROP TABLE IF EXISTS person');
        $this->addSql('ALTER TABLE place ADD streetAddress1 VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, ADD streetAddress2 VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, ADD locality VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, ADD region VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, ADD postal_code VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, ADD country_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, ADD last_name VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, DROP person_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649217BBB47');
        $this->addSql('ALTER TABLE menu_item DROP FOREIGN KEY FK_D754D550CCD7E912');
        $this->addSql('ALTER TABLE menu_item DROP FOREIGN KEY FK_D754D550C4663E4');
        $this->addSql('DROP INDEX IDX_D754D550CCD7E912 ON menu_item');
        $this->addSql('DROP INDEX UNIQ_D754D550C4663E4 ON menu_item');
        $this->addSql('DROP INDEX UNIQ_8D93D649217BBB47 ON user');
    }
}
