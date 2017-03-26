<?php

namespace Sonata\BaseBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Category
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
     * @ORM\OneToMany(targetEntity="Book", mappedBy="category")
     */
    protected $books;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->books = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getName();
    }

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
     * @return Category
     */
    public function setName(string $name)
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
     * Add book.
     *
     * @param Book $book
     *
     * @return Category
     */
    public function addBook(Book $book)
    {
        $this->books[] = $book;

        return $this;
    }

    /**
     * Remove book.
     *
     * @param Book $book
     */
    public function removeBook(Book $book)
    {
        $this->books->removeElement($book);
    }

    /**
     * Get books.
     *
     * @return Collection
     */
    public function getBooks()
    {
        return $this->books;
    }
}
