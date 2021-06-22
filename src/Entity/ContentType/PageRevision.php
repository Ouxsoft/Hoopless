<?php

namespace Ouxsoft\Hoopless\Entity;

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

}
