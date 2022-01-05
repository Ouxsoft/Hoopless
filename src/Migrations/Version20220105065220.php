<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220105065220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176F5B7AF75 FOREIGN KEY (address_id) REFERENCES address (address_id)');
        $this->addSql('CREATE INDEX IDX_34DCD176F5B7AF75 ON person (address_id)');
        $this->addSql('ALTER TABLE place ADD address_id INT NOT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (address_id)');
        $this->addSql('CREATE INDEX IDX_741D53CDF5B7AF75 ON place (address_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE person DROP FOREIGN KEY FK_34DCD176F5B7AF75');
        $this->addSql('DROP INDEX IDX_34DCD176F5B7AF75 ON person');
        $this->addSql('ALTER TABLE place DROP FOREIGN KEY FK_741D53CDF5B7AF75');
        $this->addSql('DROP INDEX IDX_741D53CDF5B7AF75 ON place');
        $this->addSql('ALTER TABLE place DROP address_id');
    }
}
