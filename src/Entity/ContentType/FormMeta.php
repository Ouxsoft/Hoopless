<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * FormMeta
 * Form meta data values
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
     * @ORM\Column(name="parent_form_meta_id", type="interger", length=11, nullable=false)
     */
    private $parentFormMetaId;

    /**
     * @var int the form the meta values are attached to
     *
     * @ORM\Column(name="form_id", type="interger", length=11, nullable=false)
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
     * @ORM\Column(name="order_id", type="interger", length=11, nullable=false)
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

    /**
     * @return int
     */
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

    /**
     * @return string
     */
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

    /**
     * @return string
     */
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

    /**
     * @return int
     */
    public function getParentFormMetaId(): int
    {
        return $this->parentFormMetaId;
    }

    /**
     * @param int $parentFormMetaId
     */
    public function setParentFormMetaId(int $parentFormMetaId): void
    {
        $this->parentFormMetaId = $parentFormMetaId;
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder(int $order): void
    {
        $this->order = $order;
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