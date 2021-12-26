<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 * Static content that is timeless.
 *
 * @ORM\Table(name="page")
 * @ORM\Entity
 */
class Page
{
    /**
     * @var int
     *
     * @ORM\Column(name="page_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pageId;

    /**
     * @var int
     *
     * @ORM\Column(name="page_parent_id", type="integer", nullable=true)
     */
    private $pageParentId;

    /**
     * @var string title used for page
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="template", type="string", length=255, nullable=true)
     */
    private $template;

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

    public function getPageId(): int
    {
        return $this->pageId;
    }

    public function getPageParentId(): int
    {
        return $this->pageParentId;
    }

    public function setPageParentId(int $pageParentId): void
    {
        $this->pageParentId = $pageParentId;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }

    public function getTemplate(): string
    {
        return $this->template;
    }

    public function setTemplate(string $template): void
    {
        $this->template = $template;
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
