<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * FormSubmission
 * Form submission.
 *
 * @ORM\Table(name="form_submission")
 * @ORM\Entity
 */
class FormSubmission
{
    /**
     * @var int
     *
     * @ORM\Column(name="form_submission_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $formSubmissionId;

    /**
     * @var int the form the meta values are attached to
     *
     * @ORM\Column(name="form_id", type="integer", length=11, nullable=false)
     */
    private $formId;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false)
     */
    private $updated;

    public function getFormSubmissionId(): int
    {
        return $this->formSubmissionId;
    }

    public function setFormSubmissionId(int $formSubmissionId): void
    {
        $this->formSubmissionId = $formSubmissionId;
    }

    public function getFormId(): int
    {
        return $this->formId;
    }

    public function setFormId(int $formId): void
    {
        $this->formId = $formId;
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
