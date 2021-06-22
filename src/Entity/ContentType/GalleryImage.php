<?php

namespace Ouxsoft\Hoopless\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * Gallery Image
 * A list of images belonging to an image
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
     * @ORM\Column(name="gallery_id", type="interger", length=11, nullable=false)
     */
    private $galleryId;

    /**
     * @var int
     *
     * @ORM\Column(name="image_id", type="interger", length=11, nullable=false)
     */
    private $imageId;

    /**
     * @return int
     */
    public function getGalleryImageId()
    {
        return $this->galleryImageId;
    }

    /**
     * @return int
     */
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

    /**
     * @return string
     */
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
}