<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Form Submission Meta
 * Form submission meta data values.
 *
 * @ORM\Table(name="form_submission_meta")
 * @ORM\Entity
 */
class FormSubmissionMeta
{
    /**
     * @var int
     *
     * @ORM\Column(name="form_submission_meta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $formSubmissionMetaId;

    /**
     * @var int
     *
     * @ORM\Column(name="form_submission_id", type="integer", length=11, nullable=false)
     */
    private $formSubmissionId;

    /**
     * @var int
     *
     * @ORM\Column(name="form_meta_id", type="integer", length=11, nullable=false)
     */
    private $formMetaId;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=280, nullable=false)
     */
    private $value;

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

    public function getFormSubmissionMetaId(): int
    {
        return $this->formSubmissionMetaId;
    }

    public function setFormSubmissionMetaId(int $formSubmissionMetaId): void
    {
        $this->formSubmissionMetaId = $formSubmissionMetaId;
    }

    public function getFormSubmissionId(): int
    {
        return $this->formSubmissionId;
    }

    public function setFormSubmissionId(int $formSubmissionId): void
    {
        $this->formSubmissionId = $formSubmissionId;
    }

    public function getFormMetaId(): int
    {
        return $this->formMetaId;
    }

    public function setFormMetaId(int $formMetaId): void
    {
        $this->formMetaId = $formMetaId;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
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
