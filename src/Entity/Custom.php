<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Custom
 * A custom content entity.
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

    public function getCustomId(): int
    {
        return $this->customId;
    }

    public function setCustomId(int $customId): void
    {
        $this->customId = $customId;
    }

    public function getSchemaId(): int
    {
        return $this->schemaId;
    }

    public function setSchemaId(int $schemaId): void
    {
        $this->schemaId = $schemaId;
    }

    public function getVersionId(): int
    {
        return $this->versionId;
    }

    public function setVersionId(int $versionId): void
    {
        $this->versionId = $versionId;
    }

    public function getGroupId(): int
    {
        return $this->groupId;
    }

    public function setGroupId(int $groupId): void
    {
        $this->groupId = $groupId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
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
