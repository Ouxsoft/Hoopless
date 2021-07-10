<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * FormSubmission
 * Form submission
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

    /**
     * @return int
     */
    public function getFormSubmissionId(): int
    {
        return $this->formSubmissionId;
    }

    /**
     * @param int $formSubmissionId
     */
    public function setFormSubmissionId(int $formSubmissionId): void
    {
        $this->formSubmissionId = $formSubmissionId;
    }

    /**
     * @return int
     */
    public function getFormId(): int
    {
        return $this->formId;
    }

    /**
     * @param int $formId
     */
    public function setFormId(int $formId): void
    {
        $this->formId = $formId;
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