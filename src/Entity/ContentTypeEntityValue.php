<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * ContentTypeEntityValue
 *
 * @ORM\Table(name="content_type_entity_value")
 * @ORM\Entity
 */
class ContentTypeEntityValue
{
    /**
     * @var int
     *
     * @ORM\Column(name="value_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $valueId;

    /**
     * @var int
     *
     * @ORM\Column(name="type_id", type="integer", nullable=false)
     */
    private $typeId;

    /**
     * @var int
     *
     * @ORM\Column(name="version_id", type="integer", nullable=false)
     */
    private $versionId;

    /**
     * @var string
     *
     * @ORM\Column(name="serialized_value", type="blob", length=65535, nullable=false)
     */
    private $serializedValue;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $timestamp = 'CURRENT_TIMESTAMP';


}
