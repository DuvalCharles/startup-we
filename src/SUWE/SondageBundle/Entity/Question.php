<?php

namespace SUWE\SondageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="SUWE\SondageBundle\Repository\QuestionRepository")
 */
class Question
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
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var Sondage
     *
     * @ORM\ManyToOne(targetEntity="SUWE\SondageBundle\Entity\Sondage", inversedBy="questions")
     */
    private $sondage;

    /**
     * @var Response[]
     *
     * @ORM\OneToMany(targetEntity="SUWE\SondageBundle\Entity\Response", mappedBy="question")
     */
    private $responses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->responses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set type
     *
     * @param string $type
     *
     * @return Question
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Question
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
     * Set sondage
     *
     * @param \SUWE\SondageBundle\Entity\Sondage $sondage
     *
     * @return Question
     */
    public function setSondage(\SUWE\SondageBundle\Entity\Sondage $sondage = null)
    {
        $this->sondage = $sondage;

        return $this;
    }

    /**
     * Get sondage
     *
     * @return \SUWE\SondageBundle\Entity\Sondage
     */
    public function getSondage()
    {
        return $this->sondage;
    }

    /**
     * Add response
     *
     * @param \SUWE\SondageBundle\Entity\Response $response
     *
     * @return Question
     */
    public function addResponse(\SUWE\SondageBundle\Entity\Response $response)
    {
        $this->responses[] = $response;

        return $this;
    }

    /**
     * Remove response
     *
     * @param \SUWE\SondageBundle\Entity\Response $response
     */
    public function removeResponse(\SUWE\SondageBundle\Entity\Response $response)
    {
        $this->responses->removeElement($response);
    }

    /**
     * Get responses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getResponses()
    {
        return $this->responses;
    }
}
