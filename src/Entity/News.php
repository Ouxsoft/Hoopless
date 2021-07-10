<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * News
 * News is a dynamic content that is relevant for a certain period of time.
 *
 * @todo handle video url, image/gallery connection, events, forms
 *
 * @ORM\Table(name="news")
 * @ORM\Entity
 */
class News
{
    /**
     * @var int
     *
     * @ORM\Column(name="news_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $newsId;

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


    /**
     * @return int
     */
    public function getNewsId() : int
    {
        return $this->newsId;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title) : void
    {
        $this->title = $title;
    }

    /**
     * @return DateTime
     */
    public function getPublishDate() : DateTime
    {
        return $this->publishDate;
    }

    /**
     * @param string $publishDate A date/time string.
     * @throws Exception
     * @link https://www.php.net/manual/en/datetime.formats.php
     */
    public function setPublishDate(string $publishDate) : void
    {
        $this->publishDate = new DateTime($publishDate);
    }

    /**
     * @return DateTime
     */
    public function getDisplayStartDate() : DateTime
    {
        return $this->displayStartDate;
    }

    /**
     * @param string $displayStartDate A date/time string.
     * @throws Exception
     * @link https://www.php.net/manual/en/datetime.formats.php
     */
    public function setDisplayStartDate(string $displayStartDate) : void
    {
        $this->displayStartDate = new DateTime($displayStartDate);
    }

    /**
     * @return DateTime
     */
    public function getDisplayEndDate() : DateTime
    {
        return $this->displayEndDate;
    }

    /**
     * @param string $displayEndDate A date/time string.
     * @throws Exception
     * @link https://www.php.net/manual/en/datetime.formats.php
     */
    public function setDisplayEndDate(string $displayEndDate) : void
    {
        $this->displayEndDate = new DateTime($displayEndDate);
    }

    /**
     * @return string
     */
    public function getSummary() : string
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary(string $summary) : void
    {
        $this->summary = $summary;
    }

    /**
     * @return string
     */
    public function getBody() : string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body) : void
    {
        $this->body = $body;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return DateTime
     */
    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    /**
     * @param DateTime $updated
     */
    public function setUpdated(DateTime $updated): void
    {
        $this->updated = $updated;
    }
}