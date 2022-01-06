<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User role
 *
 * Roles assigned to Users
 *
 * @ORM\Table(name="role_resource")
 * @ORM\Entity
 */
class RoleResource
{
    /**
     * @var int
     *
     * @ORM\Column(name="role_resource_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $roleResourceId;

    /**
     * @var int
     *
     * @ORM\Column(name="role_id", type="integer", length=11, nullable=false)
     */
    private $roleId;

    /**
     * @var int
     *
     * @ORM\Column(name="resource_id", type="integer", length=11, nullable=false)
     */
    private $resource_id;

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

    /**
     * @return int
     */
    public function getRoleResourceId(): int
    {
        return $this->roleResourceId;
    }

    /**
     * @param int $roleResourceId
     */
    public function setRoleResourceId(int $roleResourceId): void
    {
        $this->roleResourceId = $roleResourceId;
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

    /**
     * @return int
     */
    public function getResourceId(): int
    {
        return $this->resource_id;
    }

    /**
     * @param int $resource_id
     */
    public function setResourceId(int $resource_id): void
    {
        $this->resource_id = $resource_id;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return DateTime
     */
    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    /**
     * @param DateTime $updated
     */
    public function setUpdated(DateTime $updated): void
    {
        $this->updated = $updated;
    }

    
}
