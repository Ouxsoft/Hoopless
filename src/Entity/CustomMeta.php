<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentTypeEntityValue
 *
 * @ORM\Table(name="custom_meta")
 * @ORM\Entity
 */
class CustomMeta
{
    /**
     * @var int
     *
     * @ORM\Column(name="value_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $valueId;

    /**
     * @var int
     *
     * @ORM\Column(name="type_id", type="integer", nullable=false)
     */
    private $typeId;

    /**
     * @var int
     *
     * @ORM\Column(name="version_id", type="integer", nullable=false)
     */
    private $versionId;

    /**
     * @var string
     *
     * @ORM\Column(name="serialized_value", type="blob", length=65535, nullable=false)
     */
    private $serializedValue;

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
    public function getValueId(): int
    {
        return $this->valueId;
    }

    /**
     * @param int $valueId
     */
    public function setValueId(int $valueId): void
    {
        $this->valueId = $valueId;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     */
    public function setTypeId(int $typeId): void
    {
        $this->typeId = $typeId;
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
     * @return string
     */
    public function getSerializedValue(): string
    {
        return $this->serializedValue;
    }

    /**
     * @param string $serializedValue
     */
    public function setSerializedValue(string $serializedValue): void
    {
        $this->serializedValue = $serializedValue;
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
