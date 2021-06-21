<?php

namespace Ouxsoft\Hoopless\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 * A country is a distinct territorial body or political entity.
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var int
     *
     * @ORM\Column(name="country_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $countryId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string two-letter country code (defined in ISO 3166-1)
     *
     * @ORM\Column(name="two_letter_code", type="string", length=2, nullable=true)
     */
    private $twoLetterCode;

    /**
     * @var string three-letter country code (defined in ISO 3166-1),
     *
     * @ORM\Column(name="three_letter_code", type="string", length=3, nullable=true)
     */
    private $threeLetterCode;
}