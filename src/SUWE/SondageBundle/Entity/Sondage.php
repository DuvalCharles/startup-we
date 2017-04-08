<?php

namespace SUWE\SondageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use SUWE\UserBundle\Entity\User;

/**
 * Sondage
 *
 * @ORM\Table(name="sondage")
 * @ORM\Entity(repositoryClass="SUWE\SondageBundle\Repository\SondageRepository")
 */
class Sondage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="minAge", type="integer")
     */
    private $minAge;

    /**
     * @var int
     *
     * @ORM\Column(name="maxAge", type="integer")
     */
    private $maxAge;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=255)
     */
    private $gender;

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
     * @var string
     *
     * @ORM\Column(name="hobbies", type="string", length=255)
     */
    private $hobbies;

    /**
     * @var string
     *
     * @ORM\Column(name="currentBudget", type="integer")
     */
    private $currentBudget;

    /**
     * @var int
     *
     * @ORM\Column(name="maxBudget", type="integer")
     */
    private $maxBudget;

    /**
     * @var Question[]
     *
     * @ORM\OneToMany(targetEntity="SUWE\SondageBundle\Entity\Question", mappedBy="sondage")
     */
    private $questions;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="SUWE\UserBundle\Entity\User", inversedBy="sondages")
     */
    private $creator;

    /**
     * @var User[]
     *
     * @ORM\ManyToMany(targetEntity="SUWE\UserBundle\Entity\User", inversedBy="sondages")
     */
    private $participants;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->participants = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Sondage
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set minAge
     *
     * @param integer $minAge
     *
     * @return Sondage
     */
    public function setMinAge($minAge)
    {
        $this->minAge = $minAge;

        return $this;
    }

    /**
     * Get minAge
     *
     * @return int
     */
    public function getMinAge()
    {
        return $this->minAge;
    }

    /**
     * Set maxAge
     *
     * @param integer $maxAge
     *
     * @return Sondage
     */
    public function setMaxAge($maxAge)
    {
        $this->maxAge = $maxAge;

        return $this;
    }

    /**
     * Get maxAge
     *
     * @return int
     */
    public function getMaxAge()
    {
        return $this->maxAge;
    }

    /**
     * Set gender
     *
     * @param string $gender
     *
     * @return Sondage
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set departement
     *
     * @param string $departement
     *
     * @return Sondage
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set statusPro
     *
     * @param string $statusPro
     *
     * @return Sondage
     */
    public function setStatusPro($statusPro)
    {
        $this->statusPro = $statusPro;

        return $this;
    }

    /**
     * Get statusPro
     *
     * @return string
     */
    public function getStatusPro()
    {
        return $this->statusPro;
    }

    /**
     * Set hobbies
     *
     * @param string $hobbies
     *
     * @return Sondage
     */
    public function setHobbies($hobbies)
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    /**
     * Get hobbies
     *
     * @return string
     */
    public function getHobbies()
    {
        return $this->hobbies;
    }

    /**
     * Set currentBudget
     *
     * @param string $currentBudget
     *
     * @return Sondage
     */
    public function setCurrentBudget($currentBudget)
    {
        $this->currentBudget = $currentBudget;

        return $this;
    }

    /**
     * Get currentBudget
     *
     * @return string
     */
    public function getCurrentBudget()
    {
        return $this->currentBudget;
    }

    /**
     * Set maxBudget
     *
     * @param integer $maxBudget
     *
     * @return Sondage
     */
    public function setMaxBudget($maxBudget)
    {
        $this->maxBudget = $maxBudget;

        return $this;
    }

    /**
     * Get maxBudget
     *
     * @return int
     */
    public function getMaxBudget()
    {
        return $this->maxBudget;
    }

    /**
     * Add question
     *
     * @param \SUWE\SondageBundle\Entity\Question $question
     *
     * @return Sondage
     */
    public function addQuestion(\SUWE\SondageBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \SUWE\SondageBundle\Entity\Question $question
     */
    public function removeQuestion(\SUWE\SondageBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Set creator
     *
     * @param \SUWE\UserBundle\Entity\User $creator
     *
     * @return Sondage
     */
    public function setCreator(\SUWE\UserBundle\Entity\User $creator = null)
    {
        $this->creator = $creator;

        return $this;
    }

    /**
     * Get creator
     *
     * @return \SUWE\UserBundle\Entity\User
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * Add participant
     *
     * @param \SUWE\UserBundle\Entity\User $participant
     *
     * @return Sondage
     */
    public function addParticipant(\SUWE\UserBundle\Entity\User $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove participant
     *
     * @param \SUWE\UserBundle\Entity\User $participant
     */
    public function removeParticipant(\SUWE\UserBundle\Entity\User $participant)
    {
        $this->participants->removeElement($participant);
    }

    /**
     * Get participants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }
}
