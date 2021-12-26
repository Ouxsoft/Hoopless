<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Blog
 * Blog is series of content contributed by an individual person or group.
 *
 * @todo handle video url, image/gallery connection, events, forms
 * @todo add author / User Profile
 *
 * @ORM\Table(name="blog")
 * @ORM\Entity
 */
class Blog
{
    /**
     * @var int
     *
     * @ORM\Column(name="blog_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $blogId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="publish_date", type="datetime", nullable=true)
     */
    private $publishDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="display_start_date", type="datetime", nullable=true)
     */
    private $displayStartDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="display_end_date", type="datetime", nullable=true)
     */
    private $displayEndDate;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=255, nullable=true)
     */
    private $summary;

    /**
     * @var string body may contain HTML
     *
     * @ORM\Column(name="body", type="text", length=65535, nullable=false)
     */
    private $body;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $created;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updated;

    public function getBlogId(): int
    {
        return $this->blogId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPublishDate(): DateTime
    {
        return $this->publishDate;
    }

    /**
     * @param string $publishDate a date/time string
     *
     * @throws Exception
     *
     * @see https://www.php.net/manual/en/datetime.formats.php
     */
    public function setPublishDate(string $publishDate): void
    {
        $this->publishDate = new DateTime($publishDate);
    }

    public function getDisplayStartDate(): DateTime
    {
        return $this->displayStartDate;
    }

    /**
     * @param string $displayStartDate a date/time string
     *
     * @throws Exception
     *
     * @see https://www.php.net/manual/en/datetime.formats.php
     */
    public function setDisplayStartDate(string $displayStartDate): void
    {
        $this->displayStartDate = new DateTime($displayStartDate);
    }

    public function getDisplayEndDate(): DateTime
    {
        return $this->displayEndDate;
    }

    /**
     * @param string $displayEndDate a date/time string
     *
     * @throws Exception
     *
     * @see https://www.php.net/manual/en/datetime.formats.php
     */
    public function setDisplayEndDate(string $displayEndDate): void
    {
        $this->displayEndDate = new DateTime($displayEndDate);
    }

    public function getSummary(): string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): void
    {
        $this->summary = $summary;
    }

    public function getBody(): string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    public function getCreated(): DateTime
    {
        return $this->created;
    }

    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    public function setUpdated(DateTime $updated): void
    {
        $this->updated = $updated;
    }
}
