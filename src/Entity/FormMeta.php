<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * FormMeta
 * Form meta data values.
 *
 * @ORM\Table(name="form_meta")
 * @ORM\Entity
 */
class FormMeta
{
    /**
     * @var int
     *
     * @ORM\Column(name="form_meta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $formMetaId;

    /**
     * @var int the parent form meta id, allows hierarchical form structures
     *
     * @ORM\Column(name="parent_form_meta_id", type="integer", length=11, nullable=false)
     */
    private $parentFormMetaId;

    /**
     * @var int the form the meta values are attached to
     *
     * @ORM\Column(name="form_id", type="integer", length=11, nullable=false)
     */
    private $formId;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_key", type="string", length=255, nullable=false)
     */
    private $metaKey;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_value", type="string", length=255, nullable=false)
     */
    private $metaValue;

    /**
     * @var int the order of the form element in relation to other elements
     *
     * @ORM\Column(name="order_id", type="integer", length=11, nullable=false)
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

    /**
     * @return int
     */
    public function getFormMetaId()
    {
        return $this->formMetaId;
    }

    public function getFormId(): int
    {
        return $this->formId;
    }

    /**
     * @param $formId
     */
    public function setFormId($formId): void
    {
        $this->formId = $formId;
    }

    public function getMetaKey(): string
    {
        return $this->metaKey;
    }

    /**
     * @param $metaKey
     */
    public function setMetaKey($metaKey): void
    {
        $this->metaKey = $metaKey;
    }

    public function getMetaValue(): string
    {
        return $this->metaValue;
    }

    /**
     * @param $metaValue
     */
    public function setMetaValue($metaValue): void
    {
        $this->metaValue = $metaValue;
    }

    public function getParentFormMetaId(): int
    {
        return $this->parentFormMetaId;
    }

    public function setParentFormMetaId(int $parentFormMetaId): void
    {
        $this->parentFormMetaId = $parentFormMetaId;
    }

    public function getOrder(): int
    {
        return $this->order;
    }

    public function setOrder(int $order): void
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
