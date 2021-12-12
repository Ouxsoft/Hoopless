<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210710031913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE country (country_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, two_letter_code VARCHAR(2) DEFAULT NULL, three_letter_code VARCHAR(3) DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(country_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE custom (custom_id INT AUTO_INCREMENT NOT NULL, schema_id INT NOT NULL, version_id INT NOT NULL, group_id INT NOT NULL, user_id INT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(custom_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE custom_meta (value_id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, version_id INT NOT NULL, serialized_value BLOB NOT NULL, user_id INT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(value_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (event_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, publish_date DATETIME DEFAULT NULL, display_start_date DATETIME DEFAULT NULL, display_end_date DATETIME DEFAULT NULL, body BLOB NOT NULL, PRIMARY KEY(event_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_meta (event_meta_id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, meta_key VARCHAR(255) NOT NULL, meta_value VARCHAR(255) NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(event_meta_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE file (event_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, filename VARCHAR(255) DEFAULT NULL, mime_type VARCHAR(255) DEFAULT NULL, path VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(event_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form (form_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(form_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_meta (form_meta_id INT AUTO_INCREMENT NOT NULL, parent_form_meta_id INT NOT NULL, form_id INT NOT NULL, meta_key VARCHAR(255) NOT NULL, meta_value VARCHAR(255) NOT NULL, order_id INT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(form_meta_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_submission (form_submission_id INT AUTO_INCREMENT NOT NULL, form_id INT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(form_submission_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE form_submission_meta (form_submission_meta_id INT AUTO_INCREMENT NOT NULL, form_submission_id INT NOT NULL, form_meta_id INT NOT NULL, value VARCHAR(280) NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(form_submission_meta_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (gallery_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(gallery_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery_image (gallery_image_id INT AUTO_INCREMENT NOT NULL, gallery_id INT NOT NULL, image_id INT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(gallery_image_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `group` (group_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(group_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE group_permission (group_permission_id INT AUTO_INCREMENT NOT NULL, group_id INT NOT NULL, permission_id INT NOT NULL, PRIMARY KEY(group_permission_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (image_id INT AUTO_INCREMENT NOT NULL, file_id INT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(image_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE news (news_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, publish_date DATETIME DEFAULT NULL, display_start_date DATETIME DEFAULT NULL, display_end_date DATETIME DEFAULT NULL, summary VARCHAR(255) DEFAULT NULL, body BLOB NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(news_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page (page_id INT AUTO_INCREMENT NOT NULL, page_parent_id INT NOT NULL, title VARCHAR(255) DEFAULT NULL, url VARCHAR(255) DEFAULT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(page_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_revision (page_revision_id INT AUTO_INCREMENT NOT NULL, page_id INT NOT NULL, body VARCHAR(255) NOT NULL, status INT NOT NULL, user_id INT NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(page_revision_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE permission (permission_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(permission_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE place (place_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, description BLOB NOT NULL, streetAddress1 VARCHAR(255) DEFAULT NULL, streetAddress2 VARCHAR(255) DEFAULT NULL, locality VARCHAR(255) DEFAULT NULL, region VARCHAR(255) DEFAULT NULL, postal_code VARCHAR(255) DEFAULT NULL, country_id INT NOT NULL, latitude NUMERIC(20, 16) NOT NULL, longitude NUMERIC(20, 16) NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(place_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (profile_id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) DEFAULT NULL, middle_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, preferred_prounouns VARCHAR(255) DEFAULT NULL, description BLOB NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(profile_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE snippet (snippet_id INT AUTO_INCREMENT NOT NULL, description BLOB NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(snippet_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (tag_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(tag_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (user_id INT AUTO_INCREMENT NOT NULL, password VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, email_address VARCHAR(255) NOT NULL, PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_permission (user_permission_id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, permission_id INT NOT NULL, PRIMARY KEY(user_permission_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function postUp(Schema $schema) : void
    {
        $this->connection->insert('news', [
            'publish_date' => '2021-04-29',
            'title' => 'PHPMarkup',
            'body' => '<p>We have decided to rename LivingMarkup to PHPMarkup to better reflect the purpose of the library.
            To be honest, this is the third time we have had to renamed the library (formally LivingMarkup was known as PXP).</p>
            <p>We hope PHPMarkup better conveys the purpose of the library. In the same way that PHP is interpreted into C to 
            allow developers to write powerful applications, PHPMarkup is a library that allows 
            curators to use markup to safely instantiate PHP classes and invoke methods.</p>
            <p>Other than that, PHPMarkup has become a relatively stable library. It is actually amazing how well it
             helps us run sites and minimize the code we need to maintain.</p>'
        ]);
        $this->connection->insert('news', [
            'publish_date' => '2020-08-08',
            'title' => 'LHTML Elements Behind Hoopless',
            'body' => '<p>We take a quick look at the if statment, variable, and redacted LHTML elements used in Hoopless.</p>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/2w9vNNlsSRg" frameborder="0" 
           allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'
        ]);
        $this->connection->insert('news', [
            'publish_date' => '2020-08-07',
            'title' => 'LHTML Add Custom Element',
            'body' => '<p>See how easy it is to create your own custom LHTML elements using Hoopless. In this example we create 
        our own custom Alert elements that acts as a CSS abstraction layer to generate Bootstrap 4 alerts.</p>
       <iframe width="560" height="315" src="https://www.youtube.com/embed/HxZ2qitsUUs" frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'
        ]);
        $this->connection->insert('news', [
            'publish_date' => '2020-08-07',
            'title' => 'LHTML Under the Hood',
            'body' => '<p>LHTML works to make communicate the elements of design between team members while still delivering top 
            notch HTML to the web browser</p>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/L4u2qh5Elco" frameborder="0" 
           allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="allowfullscreen"></iframe>'
        ]);
        $this->connection->insert('news', [
            'publish_date' => '2019-01-28',
            'title' => 'Reworking The Language of the Web',
            'body' => '<p>There is something fundamentally wrong about the way web teams work together to build websites.
           The problem is the language they\'re using, HTML, was not designed to communicate within teams but to a 
           browser. That makes it a poor choice to help empower team members, encourage effective communication, 
           and encode the message that is the site between stakeholders.</p>
           <p>Watch what we intend to do about it.</p>
           <iframe width="560" height="315" src="https://www.youtube.com/embed/6zEXsQKPL_M" frameborder="0" 
           allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
           allowfullscreen="allowfullscreen"></iframe>'
        ]);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE custom');
        $this->addSql('DROP TABLE custom_meta');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_meta');
        $this->addSql('DROP TABLE file');
        $this->addSql('DROP TABLE form');
        $this->addSql('DROP TABLE form_meta');
        $this->addSql('DROP TABLE form_submission');
        $this->addSql('DROP TABLE form_submission_meta');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE gallery_image');
        $this->addSql('DROP TABLE `group`');
        $this->addSql('DROP TABLE group_permission');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE page_revision');
        $this->addSql('DROP TABLE permission');
        $this->addSql('DROP TABLE place');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE snippet');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_permission');
    }
}
