<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User Role
 *
 * Roles assigned to users
 *
 * @ORM\Table(name="user_role")
 * @ORM\Entity
 */
class UserRole
{
    /**
     * @var int
     *
     * @ORM\Column(name="user_role_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $userRoleId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", length=11, nullable=false)
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="role_id", type="integer", length=11, nullable=false)
     */
    private $roleId;

    /**
     * @return int
     */
    public function getUserRoleId(): int
    {
        return $this->userRoleId;
    }

    /**
     * @param int $userRoleId
     */
    public function setUserRoleId(int $userRoleId): void
    {
        $this->userRoleId = $userRoleId;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @param int $roleId
     */
    public function setRoleId(int $roleId): void
    {
        $this->roleId = $roleId;
    }
}
