<?php

declare(strict_types=1);

namespace Ouxsoft\Hoopless\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210710053110 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page CHANGE page_parent_id page_parent_id INT DEFAULT NULL');
    }


    public function postUp(Schema $schema): void
    {
        $this->connection->insert('page',
            [
                'page_id' => 1,
                'page_parent_id' => null,
                'title' => 'Home',
                'url' => '/',
            ]
        );
        $this->connection->insert('page',
            [
                'page_id' => 2,
                'page_parent_id' => 1,
                'title' => 'About',
                'url' => '/about/',
            ]
        );
        $this->connection->insert('page',
            [
                'page_id' => 3,
                'page_parent_id' => 1,
                'title' => 'Editing Guide',
                'url' => '/help/',
            ]
        );
        $this->connection->insert('page',
            [
                'page_id' => 4,
                'page_parent_id' => 3,
                'title' => 'PHPMarkup',
                'url' => '/help/phpmarkup/',
            ]
        );
        $this->connection->insert('page',
            [
                'page_id' => 5,
                'page_parent_id' => 4,
                'title' => 'Code Element',
                'url' => '/help/phpmarkup/elements/code',
            ]
        );
        $this->connection->insert('page',
            [
                'page_id' => 6,
                'page_parent_id' => 4,
                'title' => 'Examples Element',
                'url' => '/help/phpmarkup/elements/examples',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 7,
                'page_parent_id' => 4,
                'title' => 'Footer Element',
                'url' => '/help/phpmarkup/elements/footer',
            ]
        );


        $this->connection->insert('page',
            [
                'page_id' => 8,
                'page_parent_id' => 4,
                'title' => 'Head Element',
                'url' => '/help/phpmarkup/elements/head',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 9,
                'page_parent_id' => 4,
                'title' => 'Header Element',
                'url' => '/help/phpmarkup/elements/header',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 10,
                'page_parent_id' => 4,
                'title' => 'If Statement Element',
                'url' => '/help/phpmarkup/elements/if-statement',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 11,
                'page_parent_id' => 4,
                'title' => 'Images Element',
                'url' => '/help/phpmarkup/elements/images',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 12,
                'page_parent_id' => 4,
                'title' => 'Main Element',
                'url' => '/help/phpmarkup/elements/main',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 13,
                'page_parent_id' => 4,
                'title' => 'Nav Element',
                'url' => '/help/phpmarkup/elements/nav',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 14,
                'page_parent_id' => 4,
                'title' => 'Partial Element',
                'url' => '/help/phpmarkup/elements/partial',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 15,
                'page_parent_id' => 4,
                'title' => 'Redact Element',
                'url' => '/help/phpmarkup/elements/redact',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 16,
                'page_parent_id' => 4,
                'title' => 'Variables Element',
                'url' => '/help/phpmarkup/elements/variables',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 17,
                'page_parent_id' => 1,
                'title' => 'News',
                'url' => '/news/',
            ]
        );

        $this->connection->insert('page',
            [
                'page_id' => 18,
                'page_parent_id' => 1,
                'title' => 'Projects',
                'url' => '/project/',
            ]
        );
        $this->connection->insert('page',
            [
                'page_id' => 19,
                'page_parent_id' => 1,
                'title' => 'LuckByDice',
                'url' => '/project/luckbydice',
            ]
        );
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page CHANGE page_parent_id page_parent_id INT NOT NULL');
    }
}
