<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * EventMeta
 * Event meta data. Information related to an event that is beyond normal/standard values.
 *
 * @ORM\Table(name="event_meta")
 * @ORM\Entity
 */
class EventMeta
{
    /**
     * @var int
     *
     * @ORM\Column(name="event_meta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eventMetaId;

    /**
     * @var int
     *
     * @ORM\Column(name="event_id", type="integer", length=11, nullable=false)
     */
    private $eventId;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_key", type="string", length=255, nullable=false)
     */
    private $metaKey;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_value", type="string", length=255, nullable=false)
     */
    private $metaValue;

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
    public function getEventMetaId()
    {
        return $this->eventMetaId;
    }

    public function getEventId(): int
    {
        return $this->eventId;
    }

    /**
     * @param $eventId
     */
    public function setEventId($eventId): void
    {
        $this->eventId = $eventId;
    }

    public function getMetaKey(): string
    {
        return $this->metaKey;
    }

    /**
     * @param $metaKey
     */
    public function setMetaKey($metaKey): void
    {
        $this->metaKey = $metaKey;
    }

    public function getMetaValue(): string
    {
        return $this->metaValue;
    }

    /**
     * @param $metaValue
     */
    public function setMetaValue($metaValue): void
    {
        $this->metaValue = $metaValue;
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
