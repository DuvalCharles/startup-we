<?php

namespace SUWE\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use SUWE\SondageBundle\Entity\Sondage;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="SUWE\UserBundle\Repository\UserRepository")
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
     */
    private $annoncer;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=255)
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="statusPro", type="string", length=255)
     */
    private $statusPro;


    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="string", length=255)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="hobbies", type="string", length=500)
     */
    private $hobbies;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbJetons", type="integer")
     */
    private $nbJetons;

    /**
     * @var integer
     *
     * @ORM\Column(name="totalPoints", type="integer")
     */
    private $totalPoints;

    /**
     * @var string
     *
     * @ORM\Column(name="societe", type="string")
     */
    private $societe;

    /**
     * @var string
     *
     * @ORM\Column(name="imageName", type="string")
     */
    private $imageName;

    /**
     * @var Sondage[]
     *
     * @ORM\ManyToMany(targetEntity="SUWE\SondageBundle\Entity\Sondage", mappedBy="participants", nullable=true)
     */
    private $answeredSondages;


    /**
     * @var Sondage[]
     *
     * @ORM\OneToMany(targetEntity="SUWE\SondageBundle\Entity\Sondage", mappedBy="creator", nullable=true)
     */
    private $createdSondages;


}