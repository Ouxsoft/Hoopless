<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuItem
 * A individual menu item
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
     * @var string
     *
     * @ORM\Column(name="parent_menu_item_id", type="integer", nullable=true)
     */
    private $parentMenuItemId;

    /**
     * @var string if internal link
     *
     * @ORM\Column(name="page_id", type="integer", nullable=true)
     */
    private $pageId;

    /**
     * @var string if external or hard coded link
     *
     * @ORM\Column(name="url", type="string", length="255", nullable=true)
     */
    private $url;

    /**
     * @var string
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
}
