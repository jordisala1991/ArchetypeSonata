<?php

namespace App\Entity;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setOpinion(?string $opinion): self
    {
        $this->opinion = $opinion;

        return $this;
    }

    public function getOpinion(): ?string
    {
        return $this->opinion;
    }

    public function setRating(?int $rating): self
    {
        $this->rating = $rating;

        return $this;
    }

    public function getRating(): ?int
    {
        return $this->rating;
    }

    public function setBook(?Book $book): self
    {
        $this->book = $book;

        return $this;
    }

    public function getBook(): ?Book
    {
        return $this->book;
    }
}
