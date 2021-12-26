<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Place
 * A place is a particular position or point in space.
 *
 * @ORM\Table(name="place")
 * @ORM\Entity
 */
class Place
{
    /**
     * @var int
     *
     * @ORM\Column(name="place_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $placeId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="blob", length=65535, nullable=false)
     */
    private $description;

    /**
     * @var string Street address line 1
     *
     * @ORM\Column(name="streetAddress1", type="string", length=255, nullable=true)
     */
    private $streetAddress1;

    /**
     * @var string street address line 2, Apartment, Suite, Box number, etc
     *
     * @ORM\Column(name="streetAddress2", type="string", length=255, nullable=true)
     */
    private $streetAddress2;

    /**
     * @var string Locality / City / Town
     *
     * @ORM\Column(name="locality", type="string", length=255, nullable=true)
     */
    private $locality;

    /**
     * @var string State / Province / Region
     *
     * @ORM\Column(name="region", type="string", length=255, nullable=true)
     */
    private $region;

    /**
     * @var string Postal code / ZIP Code
     *
     * @ORM\Column(name="postal_code", type="string", length=255, nullable=true)
     */
    private $postalCode;

    /**
     * @var int
     *
     * @ORM\Column(name="country_id", type="integer", nullable=false)
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="decimal", precision=20, scale=16)
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longitude", type="decimal", precision=20, scale=16)
     */
    private $longitude;

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

    public function getPlaceId(): int
    {
        return $this->placeId;
    }

    public function setPlaceId(int $placeId): void
    {
        $this->placeId = $placeId;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getStreetAddress1(): string
    {
        return $this->streetAddress1;
    }

    public function setStreetAddress1(string $streetAddress1): void
    {
        $this->streetAddress1 = $streetAddress1;
    }

    public function getStreetAddress2(): string
    {
        return $this->streetAddress2;
    }

    public function setStreetAddress2(string $streetAddress2): void
    {
        $this->streetAddress2 = $streetAddress2;
    }

    public function getLocality(): string
    {
        return $this->locality;
    }

    public function setLocality(string $locality): void
    {
        $this->locality = $locality;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function setCountryId(int $countryId): void
    {
        $this->countryId = $countryId;
    }

    public function getLatitude(): string
    {
        return $this->latitude;
    }

    public function setLatitude(string $latitude): void
    {
        $this->latitude = $latitude;
    }

    public function getLongitude(): string
    {
        return $this->longitude;
    }

    public function setLongitude(string $longitude): void
    {
        $this->longitude = $longitude;
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
