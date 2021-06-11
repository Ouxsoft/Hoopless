<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ContentTypeEntityValueRevision
 *
 * @ORM\Table(name="content_type_entity_value_revision")
 * @ORM\Entity
 */
class ContentTypeEntityValueRevision
{
    /**
     * @var int
     *
     * @ORM\Column(name="revision_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $revisionId;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="value", type="integer", nullable=false)
     */
    private $value;

    /**
     * @var string
     *
     * @ORM\Column(name="user_id", type="blob", length=65535, nullable=false)
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
