<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Person
 * A person represents a single real world individual.
 *
 * @ORM\Table(name="person")
 * @ORM\Entity
 */
class Person
{
    /**
     * @var int
     *
     * @ORM\Column(name="person_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $personId;

    /**
     * @var string|null first name
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string middle name
     *
     * @ORM\Column(name="middle_name", type="string", length=255, nullable=true)
     */
    private $middleName;

    /**
     * @var string last name
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToOne(targetEntity="User", mappedBy="person")
     * @ORM\JoinColumn(name="person_id", referencedColumnName="person_id")
     */
    private $user;

    /**
     * @var int address id
     *
     * @ORM\Column(name="address_id", type="integer", nullable=true)
     */
    private $addressId;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="person")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="address_id")
     */
    private $address;

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

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->address = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lasttName;
    }

    public function setLastName(string $lastName): void
    {
        $this->firstName = $lastName;
    }

    public function getFullName() : string
    {
        $parts = [
            $this->firstName,
            $this->middleName,
            $this->lastName
        ];
        $fullName = '';
        foreach($parts as $part){
            if(!empty($part)){
                $fullName .= (($fullName !== '') ? ' ' : '') . $part;
            }
        }

        return $fullName;
    }
}
