<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Form
 * A form is collects user inputs
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity
 */
class Form
{
    /**
     * @var int
     *
     * @ORM\Column(name="form_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $formId;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

}