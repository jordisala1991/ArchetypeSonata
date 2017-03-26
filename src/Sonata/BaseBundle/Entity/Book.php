<?php

namespace Sonata\BaseBundle\Entity;

use Application\Sonata\MediaBundle\Entity\Media;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Book
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
    protected $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $abstract;

    /**
     * @Assert\Valid
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"all"})
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $cover;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="books")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $category;

    /**
     * @Assert\Valid
     * @ORM\OneToMany(targetEntity="Review", mappedBy="book", cascade={"all"})
     */
    protected $reviews;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->reviews = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getTitle();
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
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setTitle(string $title)
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
     * Set abstract
     *
     * @param string $abstract
     *
     * @return Book
     */
    public function setAbstract(string $abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }

    /**
     * Set cover
     *
     * @param Media $cover
     *
     * @return Book
     */
    public function setCover(Media $cover = null)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Get cover
     *
     * @return Media
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * Set category
     *
     * @param Category $category
     *
     * @return Book
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add review
     *
     * @param Review $review
     *
     * @return Book
     */
    public function addReview(Review $review)
    {
        $this->reviews[] = $review;

        $review->setBook($this);

        return $this;
    }

    /**
     * Remove review
     *
     * @param Review $review
     */
    public function removeReview(Review $review)
    {
        $this->reviews->removeElement($review);

        $review->setBook(null);
    }

    /**
     * Get reviews
     *
     * @return Collection
     */
    public function getReviews()
    {
        return $this->reviews;
    }
}
