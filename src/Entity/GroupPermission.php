<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentTypeEntity.
 *
 * @ORM\Table(name="group_permission")
 * @ORM\Entity
 */
class GroupPermission
{
    /**
     * @var int
     *
     * @ORM\Column(name="group_permission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $groupPermissionId;

    /**
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer", length=11, nullable=false)
     */
    private $groupId;

    /**
     * @var int
     *
     * @ORM\Column(name="permission_id", type="integer", length=11, nullable=false)
     */
    private $permissionId;

    /**
     * @return int
     */
    public function getGroupPermissionId()
    {
        return $this->groupPermissionId;
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }

    public function setGroupId(int $groupId): void
    {
        $this->groupId = $groupId;
    }

    public function getPermissionId(): int
    {
        return $this->permissionId;
    }

    public function setPermissionId(int $permissionId): void
    {
        $this->permissionId = $permissionId;
    }
}
