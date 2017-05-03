<?php

namespace Beneylu\BeneyluBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Software
 *
 * @ORM\Table("software")
 * @ORM\Entity(repositoryClass="Beneylu\BeneyluBundle\Repository\SoftwareRepository")
 */
class Software {

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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="os", type="string", length=255)
     */
    private $os;

    /**
     * @ORM\OneToMany(targetEntity="Version", mappedBy="software", cascade={"persist"} ,orphanRemoval=true)
     * @ORM\JoinColumn(nullable=true)
     */
    private $versions;

    /**
     * @ORM\OneToMany(targetEntity="Install", mappedBy="software",orphanRemoval=true)
     */
    private $installations;

    public function __construct() {
        $this->versions = new ArrayCollection();
        $this->installations = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Software
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Set os
     *
     * @param string $os
     * @return Software
     */
    public function setOs($os) {
        $this->os = $os;

        return $this;
    }

    /**
     * Get os
     *
     * @return string 
     */
    public function getOs() {
        return $this->os;
    }

    function getVersions() {
        return $this->versions;
    }

    function setVersions($versions) {
        $this->versions = $versions;
    }

    /**
     * Add versions
     *
     * @param \Beneylu\BeneyluBundle\Entity\Version $versions
     * @return Software
     */
    public function addVersion(\Beneylu\BeneyluBundle\Entity\Version $versions) {
        $this->versions[] = $versions;

        return $this;
    }

    /**
     * Remove versions
     *
     * @param \Beneylu\BeneyluBundle\Entity\Version $versions
     */
    public function removeVersion(\Beneylu\BeneyluBundle\Entity\Version $versions) {
        $this->versions->removeElement($versions);
    }

    /**
     * Add installations
     *
     * @param \Beneylu\BeneyluBundle\Entity\Install $installations
     * @return Software
     */
    public function addInstallation(\Beneylu\BeneyluBundle\Entity\Install $installations) {
        $this->installations[] = $installations;

        return $this;
    }

    /**
     * Remove installations
     *
     * @param \Beneylu\BeneyluBundle\Entity\Install $installations
     */
    public function removeInstallation(\Beneylu\BeneyluBundle\Entity\Install $installations) {
        $this->installations->removeElement($installations);
    }

    /**
     * Get installations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInstallations() {
        return $this->installations;
    }

}
