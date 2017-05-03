<?php

namespace Beneylu\BeneyluBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Device
 *
 * @ORM\Table("device")
 * @ORM\Entity(repositoryClass="Beneylu\BeneyluBundle\Repository\DeviceRepository")
 */
class Device {

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
     * @ORM\OneToMany(targetEntity="Install", mappedBy="device")
     */
    private $installations;

    public function __construct() {

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
     * @return Device
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
     * @return Device
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

    function getInstallations() {
        return $this->installations;
    }

    function setInstallations($installations) {
        $this->installations = $installations;
    }

    /**
     * Add installations
     *
     * @param \Beneylu\BeneyluBundle\Entity\Install $installations
     * @return Device
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

}
