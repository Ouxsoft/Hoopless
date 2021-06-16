<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * ContentTypeEntity
 *
 * @ORM\Table(name="content_type_entity")
 * @ORM\Entity
 */
class ContentTypeEntity
{
    /**
     * @var int
     *
     * @ORM\Column(name="entity_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $entityId;

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
     * @ORM\Column(name="timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';

}
