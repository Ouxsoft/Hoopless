<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * MenuItem
 * A individual menu item.
 *
 * @ORM\Table(name="menu_item")
 * @ORM\Entity
 */
class MenuItem
{
    /**
     * @var int
     *
     * @ORM\Column(name="menu_item_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $menuItemId;

    /**
     * @var int the menu which the item belongs to
     *
     * @ORM\Column(name="menu_id", type="integer", nullable=false)
     */
    private $menuId;

    /**
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="items")
     * @ORM\JoinColumn(name="menu_id", referencedColumnName="menu_id")
     */
    private $menu;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parent_menu_item_id", type="integer", nullable=true)
     */
    private $parentMenuItemId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length="255", nullable=true)
     */
    private $title;

    /**
     * @var int|null if internal link
     *
     * @ORM\Column(name="page_id", type="integer", nullable=true)
     */
    private $pageId;

    /**
     * @var Page|null
     * @ORM\ManyToOne(targetEntity="Page")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="page_id")
     */
    private $page;

    /**
     * @var string|null if external or hard coded link
     *
     * @ORM\Column(name="url", type="string", length="255", nullable=true)
     */
    private $url;

    /**
     * @var int|null
     *
     * @ORM\Column(name="order", type="integer", nullable=true)
     */
    private $order;

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
        $this->menu = new ArrayCollection();
    }

    public function getMenuItemId(): int
    {
        return $this->menuItemId;
    }

    public function getMenuId(): int
    {
        return $this->menuId;
    }

    public function setMenuId(int $menuId): void
    {
        $this->menuId = $menuId;
    }

    public function getParentMenuItemId(): ?int
    {
        return $this->parentMenuItemId;
    }

    public function setParentMenuItemId(?int $parentMenuItemId): void
    {
        $this->parentMenuItemId = $parentMenuItemId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getPageId(): ?int
    {
        return $this->pageId;
    }

    /**
     * @return Page
     */
    public function getPage(): ?Page
    {
        return $this->page;
    }

    public function setPageId(?int $pageId): void
    {
        $this->pageId = $pageId;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): void
    {
        $this->url = $url;
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): void
    {
        $this->order = $order;
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
