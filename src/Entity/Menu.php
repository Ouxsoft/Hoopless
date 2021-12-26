<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 * A individual menu.
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity
 */
class Menu
{
    /**
     * @var int
     *
     * @ORM\Column(name="menu_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $menuId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="MenuItem", mappedBy="menu")
     * @ORM\JoinColumn(name="menu_id", referencedColumnName="menu_id")
     */
    private $items;

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

    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getItems()
    {
        return $this->items;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getMenuId(): int
    {
        return $this->menuId;
    }
}
