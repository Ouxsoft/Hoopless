<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * PageRevision
 *
 * @ORM\Table(name="page_revision")
 * @ORM\Entity
 */
class PageRevision
{
    const HIDDEN_STATUS = 0;
    const ACTIVE_STATUS = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="page_revision_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $pageRevisionId;

    /**
     * @var int
     *
     * @ORM\Column(name="page_id", type="integer", nullable=false)
     */
    private $pageId;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="string", nullable=false)
     */
    private $body;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer", length=1, nullable=false)
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="user_id", type="integer", length=11, nullable=false)
     */
    private $userId;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false)
     */
    private $updated;


    public function setActive() : void
    {
        $this->status = self::ACTIVE_STATUS;
    }

    public function setHidden() : void
    {
        $this->status = self::HIDDEN_STATUS;
    }

    /**
     * @return int
     */
    public function getPageRevisionId(): int
    {
        return $this->pageRevisionId;
    }

    /**
     * @param int $pageRevisionId
     */
    public function setPageRevisionId(int $pageRevisionId): void
    {
        $this->pageRevisionId = $pageRevisionId;
    }

    /**
     * @return int
     */
    public function getPageId(): int
    {
        return $this->pageId;
    }

    /**
     * @param int $pageId
     */
    public function setPageId(int $pageId): void
    {
        $this->pageId = $pageId;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
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
