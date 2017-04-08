<?php

namespace SUWE\SondageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Response
 *
 * @ORM\Table(name="response")
 * @ORM\Entity(repositoryClass="SUWE\SondageBundle\Repository\ResponseRepository")
 */
class Response
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
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @var Question
     *
     * @ORM\ManyToOne(targetEntity="SUWE\SondageBundle\Entity\Question", inversedBy="question")
     */
    private $question;


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
     * @return Response
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
     * Set score
     *
     * @param integer $score
     *
     * @return Response
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set question
     *
     * @param \SUWE\SondageBundle\Entity\Question $question
     *
     * @return Response
     */
    public function setQuestion(\SUWE\SondageBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \SUWE\SondageBundle\Entity\Question
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
