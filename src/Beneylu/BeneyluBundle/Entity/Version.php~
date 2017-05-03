<?php

namespace Beneylu\BeneyluBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Version
 *
 * @ORM\Table("version")
 * @ORM\Entity(repositoryClass="Beneylu\BeneyluBundle\Repository\VersionRepository")
 */
class Version {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var boolean
     *
     * @ORM\Column(name="latest", type="boolean")
     */
    private $latest;

    /**
     * @ORM\ManyToOne(targetEntity="Software", inversedBy="versions")
     * @ORM\JoinColumn(name="software_id", referencedColumnName="id")
     */
    private $software;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Version
     */
    public function setReference($reference) {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference() {
        return $this->reference;
    }

    /**
     * Set latest
     *
     * @param boolean $latest
     * @return Version
     */
    public function setLatest($latest) {
        $this->latest = $latest;

        return $this;
    }

    /**
     * Get latest
     *
     * @return boolean 
     */
    public function getLatest() {
        return $this->latest;
    }

    function getSoftware() {
        return $this->software;
    }

    function setSoftware($software) {
        $this->software = $software;
    }

}
