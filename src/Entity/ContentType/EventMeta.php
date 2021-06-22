<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * EventMeta
 * Event meta data / beyond normal values
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
     * @ORM\Column(name="event_id", type="interger", length=11, nullable=false)
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
     * @return int
     */
    public function getEventMetaId()
    {
        return $this->eventMetaId;
    }

    /**
     * @return int
     */
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

    /**
     * @return string
     */
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

    /**
     * @return string
     */
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
}