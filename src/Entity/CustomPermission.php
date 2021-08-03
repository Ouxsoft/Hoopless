<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentTypeGroupAccess
 *
 * @ORM\Table(name="content_type_group_access")
 * @ORM\Entity
 */
class CustomPermission
{
    /**
     * @var int
     *
     * @ORM\Column(name="acl_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $aclId;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer", nullable=false)
     */
    private $type;

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

/*
ContentTypeACL
ContentTypeId
PermissionId
*/