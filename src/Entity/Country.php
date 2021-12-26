<?php

namespace App\Entity;

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

    public function getCountryId(): int
    {
        return $this->countryId;
    }

    public function setCountryId(int $countryId): void
    {
        $this->countryId = $countryId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTwoLetterCode(): string
    {
        return $this->twoLetterCode;
    }

    public function setTwoLetterCode(string $twoLetterCode): void
    {
        $this->twoLetterCode = $twoLetterCode;
    }

    public function getThreeLetterCode(): string
    {
        return $this->threeLetterCode;
    }

    public function setThreeLetterCode(string $threeLetterCode): void
    {
        $this->threeLetterCode = $threeLetterCode;
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
