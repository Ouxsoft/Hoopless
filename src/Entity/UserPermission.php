<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentTypeEntity
 *
 * @ORM\Table(name="user_permission")
 * @ORM\Entity
 */
class UserPermission
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_permission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userPermissionId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", length=11, nullable=false)
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="permission_id", type="integer", length=11, nullable=false)
     */
    private $permissionId;

    /**
     * @return int
     */
    public function getUserPermissionId()
    {
        return $this->userPermissionId;
    }

    /**
     * @return int
     */
    public function getUserId() : int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId) : void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getPermissionId() : int
    {
        return $this->permissionId;
    }

    /**
     * @param int $permissionId
     */
    public function setPermissionId(int $permissionId) : void
    {
        $this->permissionId = $permissionId;
    }
}