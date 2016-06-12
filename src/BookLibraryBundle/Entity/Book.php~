<?php

namespace BookLibraryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Book
 *
 * @ORM\Table(name="book")
 * @ORM\Entity(repositoryClass="BookLibraryBundle\Repository\BookRepository")
 */
class Book
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
     * @var string
     *
     * @ORM\Column(name="publication_year", type="string", length=255, nullable=true)
     */
    private $publicationYear;


    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="books")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */

    private $category;


    /**
     * @ORM\ManyToOne(targetEntity="Author", inversedBy="books")
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */

    private $author;


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
     * @return Book
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
     * Set publicationYear
     *
     * @param string $publicationYear
     *
     * @return Book
     */
    public function setPublicationYear($publicationYear)
    {
        $this->publicationYear = $publicationYear;

        return $this;
    }

    /**
     * Get publicationYear
     *
     * @return string
     */
    public function getPublicationYear()
    {
        return $this->publicationYear;
    }

    /**
     * Set category
     *
     * @param \BookLibraryBundle\Entity\Category $category
     *
     * @return Book
     */
    public function setCategory(\BookLibraryBundle\Entity\Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \BookLibraryBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set author
     *
     * @param \BookLibraryBundle\Entity\Author $author
     *
     * @return Book
     */
    public function setAuthor(\BookLibraryBundle\Entity\Author $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \BookLibraryBundle\Entity\Author
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
