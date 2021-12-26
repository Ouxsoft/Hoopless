<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentTypeEntity.
 *
 * @ORM\Table(name="group")
 * @ORM\Entity
 */
class Group
{
    /**
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    public function getGroupId(): int
    {
        return $this->groupId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}
