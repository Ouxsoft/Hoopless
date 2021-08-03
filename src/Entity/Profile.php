<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Laminas\Validator\Date;

/**
 * Profile
 * A profile is used to show case things
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

    /**
     * @return string
     */
    public function getProfileId() : string
    {
        return $this->profileId;
    }

    /**
     * @return string
     */
    public function getFirstName() : string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName) : void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getMiddleName() : string
    {
        return $this->middleName;
    }

    /**
     * @param string $middleName
     */
    public function setMiddleName(string $middleName) : void
    {
        $this->middleName = $middleName;
    }

    /**
     * @return string
     */
    public function getMiddleInitial() : string
    {
        return $this->middelName[0];
    }

    /**
     * @return string
     */
    public function getLastName() : string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName) : void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getFullName() : string
    {
        $fullName = '';
        $parts = [$this->firstName, $this->middleName, $this->lastName];

        foreach($parts as $key => $value){
            if($value === null){
                continue;
            }
            $fullName .= (($fullName !== '') ? ' ' : '') . $value;
        }

        return $fullName;
    }

    /**
     * @return string
     */
    public function getPreferredPronouns() : string
    {
        return $this->preferredPronouns;
    }

    /**
     * @param string $preferredPronouns
     */
    public function setPreferredPronouns(string $preferredPronouns) : void
    {
        $this->preferredPronouns = $preferredPronouns;
    }

    /**
     * @return string
     */
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }

    /**
     * @return DateTime
     */
    public function getCreated(): DateTime
    {
        return $this->created;
    }

    /**
     * @param DateTime $created
     */
    public function setCreated(DateTime $created): void
    {
        $this->created = $created;
    }

    /**
     * @return DateTime
     */
    public function getUpdated(): DateTime
    {
        return $this->updated;
    }

    /**
     * @param DateTime $updated
     */
    public function setUpdated(DateTime $updated): void
    {
        $this->updated = $updated;
    }

}