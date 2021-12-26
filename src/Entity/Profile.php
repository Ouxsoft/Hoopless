<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 * A profile is used to show case things.
 *
 * @ORM\Table(name="profile")
 * @ORM\Entity
 */
class Profile
{
    /**
     * @var int
     *
     * @ORM\Column(name="profile_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $profileId;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="middle_name", type="string", length=255, nullable=true)
     */
    private $middleName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="preferred_prounouns", type="string", length=255, nullable=true)
     */
    private $preferredPronouns;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="blob", length=65535, nullable=false)
     */
    private $description;

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

    public function getProfileId(): string
    {
        return $this->profileId;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getMiddleName(): string
    {
        return $this->middleName;
    }

    public function setMiddleName(string $middleName): void
    {
        $this->middleName = $middleName;
    }

    public function getMiddleInitial(): string
    {
        return $this->middelName[0];
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getFullName(): string
    {
        $fullName = '';
        $parts = [$this->firstName, $this->middleName, $this->lastName];

        foreach ($parts as $key => $value) {
            if (null === $value) {
                continue;
            }
            $fullName .= (('' !== $fullName) ? ' ' : '').$value;
        }

        return $fullName;
    }

    public function getPreferredPronouns(): string
    {
        return $this->preferredPronouns;
    }

    public function setPreferredPronouns(string $preferredPronouns): void
    {
        $this->preferredPronouns = $preferredPronouns;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
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
