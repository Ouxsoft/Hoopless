<?php

namespace Ouxsoft\Hoopless\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 * Static content that is timeless
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
     * @ORM\Column(name="page_parent_id", type="integer", nullable=false)
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
}