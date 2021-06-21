<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Laminas\Validator\Date;

/**
 * Tag
 * A tag is used to label/identify content
 *
 * @ORM\Table(name="tag")
 * @ORM\Entity
 */
class Tag
{
    /**
     * @var int
     *
     * @ORM\Column(name="tag_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tagId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

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
    public function getTagId() : int
    {
        return $this->tagId;
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
    public function getCreated() : DateTime
    {
        return $this->created;;
    }

    public function setCreated() : void
    {
        $this->created = new DateTime('now');
    }

    /**
     * @return DateTime
     */
    public function getUpdated() : DateTime
    {
        return $this->updated;;
    }

    public function setUpdated() : void
    {
        $this->updated = new DateTime('now');
    }
}
