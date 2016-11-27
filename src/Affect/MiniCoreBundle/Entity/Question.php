<?php

namespace Affect\MiniCoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="questions")
 * @ORM\Entity(repositoryClass="Affect\MiniCoreBundle\Repository\QuestionRepository")
 * @ORM\Entity
 */
class Question
{
    /**
     * @var integer
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @ORM\OneToMany(targetEntity="Affect\MiniCoreBundle\Entity\Response", mappedBy="question", cascade={"persist"})
     */
    private $responses;


    public function __construct()
    {
        $this->responses = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Question
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return Response[]
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param Response[] $responses
     */
    public function setResponses($responses)
    {
        $this->responses = $responses;
    }

    /**
     * @param Response $response
     */
    public function addResponse($response)
    {
        $this->responses[] = $response;
    }
}
