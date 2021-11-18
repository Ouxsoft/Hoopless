<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211118041608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE blog (blog_id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, publish_date DATETIME DEFAULT NULL, display_start_date DATETIME DEFAULT NULL, display_end_date DATETIME DEFAULT NULL, summary VARCHAR(255) DEFAULT NULL, body TEXT NOT NULL, created DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, PRIMARY KEY(blog_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
    }

    public function postUp(Schema $schema) : void
    {
        $this->connection->insert('blog', [
            'publish_date' => '2021-11-17',
            'title' => 'Product Review: 8 Tips for Success',
            'body' => <<<HTML
                <h2>Chose Tickets to Showcase</h2>
                <p>
                An organization may be chasing underlying technologies or adopting the latest trend of serverless stack, but chances are
                that isn't the most engaging content for a product review. Favor showcasing tangible tickets over intangible. Chose
                features, bugfixes, etc. that can facilitate a two-side conversation. Product reviews should be a discussion. Design
                them with a structure built around tickets that are discussable. Promote collaboration over ostracization.
                </p>
                
                <h2>Invite Everyone</h2>
                <p>
                Well, you might not be able to invite everyone, but cast a broad net to all willing stakeholders. This could be the
                entire company, if they are users of the system.
                </p>
                
                <h2>Facilitate a Collaboration</h2>
                <p>
                Be mindful of holding the space. Your goal is to facilitate meaningful and production conversation between engineers
                and stakeholders. Product reviews shouldn't be overall formal. People should act authentically and ask questions.
                But they should be structured and respectful of everyone's time. Table conversations that go over time.
                </p>
                
                <h2>Record</h2>
                <p>
                Product reviews take time to digested. They may need to be analyzed or references at a later time. Unless there is a
                reason not to, press the record button. This will help to make informed decisions moving forward and make it easier
                to reach out to clarify open questions.
                </p>
                
                <h2>Outline</h2>
                <p>
                Give a brief introduction and outline the proceedings. A simple "who are we", "why we are here", and "what to expect"
                should suffice. Let the audience know what to expect and how they can engage. Make sure to get to the point though
                quickly. Afterall, we here to show case features and get feedback.
                </p>
                
                <h2>Recap</h2>
                <p>
                It's important to establish a feedback loop for suggestions provided in the previous review. One idea is to provide
                a synopsis of corrective actions made from the last product review during the start of the current product review.
                This helps establish that suggestions are taken seriously and lets stakeholders know their feedback matters.
                </p>
                
                <h2>Let them Shine</h2>
                <p>
                Empower engineers by letting them showcase their work and take ownership. Advise them to avoid unnecessary technical
                jargon that won't be understood by stakeholders. Often stakeholders have their own jargon, albeit not technical, as
                they are the subject matter experts. Allow stakeholders the opportunity to educate and advance engineers
                understanding of the industry.
                </p>
                
                <h2>Review</h2>
                <p>
                Give it a little while and then watch the recording. Take notes. Follow up with individuals to clarify concerns.
                Use the information provided to help your team and software improve.
                </p>
            HTML

        ]);


        $this->connection->insert('blog', [
            'publish_date' => '2021-11-17',
            'title' => 'Trailing Slash',
            'body' => <<<HTML
                <h2>Trailing Slash</h2>
                <p>
                Including the trailing slash inside a variable that is used to generate paths is a anti-pattern. Consumers
                of a variable should add the trailing slash. Otherwise there is no way for them to remove the slash. Even
                if all current occurrences of the variable feature the slash, the future is unknown.
                </p>
            HTML

        ]);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE blog');
    }
}
