<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Snippet
 * A snippet is a short piece of reusable content. It is centrally maintained as to make multiple updates easier.
 *
 * @ORM\Table(name="snippet")
 * @ORM\Entity
 */
class Snippet
{
    /**
     * @var int
     *
     * @ORM\Column(name="snippet_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $snippetId;

    /**
     * @var string may contain HTML
     *
     * @ORM\Column(name="description", type="blob", length=65535, nullable=false)
     */
    private $body;

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

    /**
     * @return int
     */
    public function getSnippetId() : int
    {
        return $this->snippetId;
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
    public function getCreated() : DateTime
    {
        return $this->created;
        ;
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
        return $this->updated;
        ;
    }

    public function setUpdated() : void
    {
        $this->updated = new DateTime('now');
    }
}
