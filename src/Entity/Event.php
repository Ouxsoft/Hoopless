<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Event
 * A event a thing that happens, especially one of importance.
 * Additional values such as placeId, YouTube URL, reoccurrence/repeat, are stored in EventMeta
 *
 * @ORM\Table(name="event")
 * @ORM\Entity
 */
class Event
{
    /**
     * @var int
     *
     * @ORM\Column(name="event_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $eventId;

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
     * @var string body may contain HTML
     *
     * @ORM\Column(name="body", type="blob", length=65535, nullable=false)
     */
    private $body;
}
