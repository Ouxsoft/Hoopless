<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Gallery Image
 * A list of images belonging to an image.
 *
 * @ORM\Table(name="gallery_image")
 * @ORM\Entity
 */
class GalleryImage
{
    /**
     * @var int
     *
     * @ORM\Column(name="gallery_image_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $galleryImageId;

    /**
     * @var int
     *
     * @ORM\Column(name="gallery_id", type="integer", length=11, nullable=false)
     */
    private $galleryId;

    /**
     * @var int
     *
     * @ORM\Column(name="image_id", type="integer", length=11, nullable=false)
     */
    private $imageId;

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

    /**
     * @return int
     */
    public function getGalleryImageId()
    {
        return $this->galleryImageId;
    }

    public function getGalleryId(): int
    {
        return $this->galleryId;
    }

    /**
     * @param $galleryId
     */
    public function setGalleryId($galleryId): void
    {
        $this->galleryId = $galleryId;
    }

    public function getImageId(): string
    {
        return $this->imageId;
    }

    /**
     * @param $imageId
     */
    public function setImageId($imageId): void
    {
        $this->imageId = $imageId;
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
