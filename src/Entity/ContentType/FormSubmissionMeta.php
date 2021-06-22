<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Form Submission Meta
 * Form submission meta data values
 *
 * @ORM\Table(name="form_submssion_meta")
 * @ORM\Entity
 */
class FormSubmissionMeta
{
    /**
     * @var int
     *
     * @ORM\Column(name="form_submssion_meta_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $formSubmissionMetaId;

    /**
     * @var int
     *
     * @ORM\Column(name="form_submission_id", type="interger", length=11, nullable=false)
     */
    private $formSubmissionId;

    /**
     * @var int
     *
     * @ORM\Column(name="form_meta_id", type="interger", length=11, nullable=false)
     */
    private $formMetaId;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=280, nullable=false)
     */
    private $value;

}