<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** @ORM\Entity */
class Book
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string|null
     *
     * @Assert\NotNull
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $abstract;

    /**
     * @var Media|null
     *
     * @Assert\Valid
     * @ORM\ManyToOne(targetEntity="Media", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $cover;

    /**
     * @var Category|null
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="books")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $category;

    /**
     * @var Collection<int, Review>
     *
     * @Assert\Valid
     * @ORM\OneToMany(targetEntity="Review", mappedBy="book", cascade={"all"})
     */
    private $reviews;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->getTitle() ?? '';
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setAbstract(?string $abstract): self
    {
        $this->abstract = $abstract;

        return $this;
    }

    public function getAbstract(): ?string
    {
        return $this->abstract;
    }

    public function setCover(?Media $cover): self
    {
        $this->cover = $cover;

        return $this;
    }

    public function getCover(): ?Media
    {
        return $this->cover;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function addReview(Review $review): self
    {
        $this->reviews[] = $review;

        $review->setBook($this);

        return $this;
    }

    public function removeReview(Review $review): self
    {
        $this->reviews->removeElement($review);

        $review->setBook(null);

        return $this;
    }

    /** @return Collection<int, Review> */
    public function getReviews(): ?Collection
    {
        return $this->reviews;
    }
}
