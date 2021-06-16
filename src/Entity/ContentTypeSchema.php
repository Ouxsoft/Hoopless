<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * ContentTypeSchema
 *
 * @ORM\Table(name="content_type_schema")
 * @ORM\Entity
 */
class ContentTypeSchema
{
    /**
     * @var int
     *
     * @ORM\Column(name="schema_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $schemaId;

    /**
     * @var int|null
     *
     * @ORM\Column(name="parent_id", type="integer", nullable=true)
     */
    private $parentId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="blob", length=65535, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="machine_name", type="blob", length=65535, nullable=false)
     */
    private $machineName;

    /**
     * @var string
     *
     * @ORM\Column(name="class_name", type="blob", length=65535, nullable=false)
     */
    private $className;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="blob", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
