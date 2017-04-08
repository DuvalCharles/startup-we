<?php

namespace SUWE\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use SUWE\SondageBundle\Entity\Sondage;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="SUWE\UserBundle\Repository\UserRepository")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks()
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var boolean
     * *
     * @ORM\Column(name="isAnnoncer", type="boolean", nullable=true)
     */
    private $annoncer;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=255, nullable=true)
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="statusPro", type="string", length=255, nullable=true)
     */
    private $statusPro;


    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="string", length=255, nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=true)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="hobbies", type="string", length=500, nullable=true)
     */
    private $hobbies;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbJetons", type="integer", nullable=true)
     */
    private $nbJetons;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalPoints", type="integer", nullable=true)
     */
    private $totalPoints;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string", nullable=true)
     */
    private $societe;

    /**
     * @ORM\OneToOne(targetEntity="SUWE\UserBundle\Entity\Image", cascade={"persist","remove"})
     */
    private $imageUser;

    /**
     * @var Sondage[]
     *
     * @ORM\ManyToMany(targetEntity="SUWE\SondageBundle\Entity\Sondage", mappedBy="participants")
     */
    private $answeredSondages;

    /**
     * @var Sondage[]
     *
     * @ORM\OneToMany(targetEntity="SUWE\SondageBundle\Entity\Sondage", mappedBy="creator")
     */
    private $createdSondages;

    /**
     * @return mixed
     */
    public function getImageUser()
    {
        return $this->imageUser;
    }

    /**
     * @param mixed $imageUser
     */
    public function setImageUser($imageUser)
    {
        $this->imageUser = $imageUser;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return boolean
     */
    public function isAnnoncer()
    {
        return $this->annoncer;
    }

    /**
     * @param boolean $annoncer
     */
    public function setAnnoncer($annoncer)
    {
        $this->annoncer = $annoncer;
    }

    /**
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param string $departement
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;
    }

    /**
     * @return string
     */
    public function getStatusPro()
    {
        return $this->statusPro;
    }

    /**
     * @param string $statusPro
     */
    public function setStatusPro($statusPro)
    {
        $this->statusPro = $statusPro;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * @param string $hobbies
     */
    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;
    }

    /**
     * @return int
     */
    public function getNbJetons()
    {
        return $this->nbJetons;
    }

    /**
     * @param int $nbJetons
     */
    public function setNbJetons($nbJetons)
    {
        $this->nbJetons = $nbJetons;
    }

    /**
     * @return int
     */
    public function getTotalPoints()
    {
        return $this->totalPoints;
    }

    /**
     * @param int $totalPoints
     */
    public function setTotalPoints($totalPoints)
    {
        $this->totalPoints = $totalPoints;
    }

    /**
     * @return string
     */
    public function getSociete()
    {
        return $this->societe;
    }

    /**
     * @param string $societe
     */
    public function setSociete($societe)
    {
        $this->societe = $societe;
    }

    /**
     * @return \SUWE\SondageBundle\Entity\Sondage[]
     */
    public function getAnsweredSondages()
    {
        return $this->answeredSondages;
    }

    /**
     * @param \SUWE\SondageBundle\Entity\Sondage[] $answeredSondages
     */
    public function setAnsweredSondages($answeredSondages)
    {
        $this->answeredSondages = $answeredSondages;
    }

    /**
     * @return \SUWE\SondageBundle\Entity\Sondage[]
     */
    public function getCreatedSondages()
    {
        return $this->createdSondages;
    }

    /**
     * @param \SUWE\SondageBundle\Entity\Sondage[] $createdSondages
     */
    public function setCreatedSondages($createdSondages)
    {
        $this->createdSondages = $createdSondages;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
}