<?php

namespace Ouxsoft\Hoopless\Entity;

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
     * @var string Street address line 2, Apartment, Suite, Box number, etc.
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

}