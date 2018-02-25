<?php

namespace App\BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Review
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @Assert\NotNull
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @Assert\NotNull
     * @ORM\Column(type="text")
     */
    protected $opinion;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $rating;

    /**
     * @ORM\ManyToOne(targetEntity="Book", inversedBy="reviews")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $book;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return Review
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set opinion.
     *
     * @param string $opinion
     *
     * @return Review
     */
    public function setOpinion($opinion)
    {
        $this->opinion = $opinion;

        return $this;
    }

    /**
     * Get opinion.
     *
     * @return string
     */
    public function getOpinion()
    {
        return $this->opinion;
    }

    /**
     * Set rating.
     *
     * @param int $rating
     *
     * @return Review
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating.
     *
     * @return int
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set book.
     *
     * @param Book $book
     *
     * @return Review
     */
    public function setBook(Book $book = null)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book.
     *
     * @return Book
     */
    public function getBook()
    {
        return $this->book;
    }
}
