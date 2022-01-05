<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220105062638 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country ADD numeric_code INT DEFAULT NULL, ADD latitude NUMERIC(10, 8) DEFAULT NULL, ADD longitude NUMERIC(10, 8) DEFAULT NULL');
        $this->addSql('ALTER TABLE menu_item ADD CONSTRAINT FK_D754D550C4663E4 FOREIGN KEY (page_id) REFERENCES page (page_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D754D550C4663E4 ON menu_item (page_id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (address_id)');
        $this->addSql('CREATE INDEX IDX_34DCD176F5B7AF75 ON person (address_id)');
        $this->addSql('ALTER TABLE user DROP INDEX FK_8D93D649217BBB47, ADD UNIQUE INDEX UNIQ_8D93D649217BBB47 (person_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE country DROP numeric_code, DROP latitude, DROP longitude');
        $this->addSql('ALTER TABLE menu_item DROP FOREIGN KEY FK_D754D550C4663E4');
        $this->addSql('DROP INDEX UNIQ_D754D550C4663E4 ON menu_item');
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176F5B7AF75');
        $this->addSql('DROP INDEX IDX_34DCD176F5B7AF75 ON person');
        $this->addSql('ALTER TABLE user DROP INDEX UNIQ_8D93D649217BBB47, ADD INDEX FK_8D93D649217BBB47 (person_id)');
    }
}
