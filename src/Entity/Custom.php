<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Custom
 * A custom content entity
 *
 * @ORM\Table(name="custom")
 * @ORM\Entity
 */
class Custom
{
    /**
     * @var int
     *
     * @ORM\Column(name="custom_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $customId;

    /**
     * @var int
     *
     * @ORM\Column(name="schema_id", type="integer", nullable=false)
     */
    private $schemaId;

    /**
     * @var int
     *
     * @ORM\Column(name="version_id", type="integer", nullable=false)
     */
    private $versionId;

    /**
     * @var int
     *
     * @ORM\Column(name="group_id", type="integer", nullable=false)
     */
    private $groupId;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

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
    public function getCustomId(): int
    {
        return $this->customId;
    }

    /**
     * @param int $customId
     */
    public function setCustomId(int $customId): void
    {
        $this->customId = $customId;
    }

    /**
     * @return int
     */
    public function getSchemaId(): int
    {
        return $this->schemaId;
    }

    /**
     * @param int $schemaId
     */
    public function setSchemaId(int $schemaId): void
    {
        $this->schemaId = $schemaId;
    }

    /**
     * @return int
     */
    public function getVersionId(): int
    {
        return $this->versionId;
    }

    /**
     * @param int $versionId
     */
    public function setVersionId(int $versionId): void
    {
        $this->versionId = $versionId;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     */
    public function setGroupId(int $groupId): void
    {
        $this->groupId = $groupId;
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
