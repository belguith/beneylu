<?php

namespace Beneylu\BeneyluBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Install
 *
 * @ORM\Table("install")
 * @ORM\Entity(repositoryClass="Beneylu\BeneyluBundle\Repository\InstallRepository")
 */
class Install {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity="Version")
     */
    private $version;

    /**
     * @ORM\ManyToOne(targetEntity="Software", inversedBy="installations")
     * @ORM\JoinColumn(name="software_id", referencedColumnName="id")
     */
    private $software;

    /**
     * @ORM\ManyToOne(targetEntity="Device", inversedBy="installations")
     * @ORM\JoinColumn(name="device_id", referencedColumnName="id")
     */
    private $device;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Install
     */
    public function setDate($date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate() {
        return $this->date;
    }

    function getVersion() {
        return $this->version;
    }

    function setVersion($version) {
        $this->version = $version;
    }

    function getSoftware() {
        return $this->software;
    }

    function getDevice() {
        return $this->device;
    }

    function setSoftware($software) {
        $this->software = $software;
    }

    function setDevice($device) {
        $this->device = $device;
    }

}
