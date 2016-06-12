<?php
namespace BookLibraryBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BookLibraryBundle\Entity\Author;
use BookLibraryBundle\Entity\Category;
use BookLibraryBundle\Entity\Book;
use League\Csv\Reader;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;


class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        $dataRootPath = $this->container->get('kernel')->getRootDir();
        $csv = Reader::createFromPath($dataRootPath . '/Resources/data/booker-prize.csv');
        $csv->setDelimiter(';');

        $keys = $csv->fetchOne();
        $csv->setOffset(1);
        $rows = $csv->fetchAssoc($keys);
        $category = new Category();
        $category->setName('Booker Prize Winners');
        $manager->persist($category);

        foreach ($rows as $row) {
            $author_arr = explode(' ', $row['author']);
            $lastName = array_pop($author_arr);
            $firstName = implode(' ', $author_arr);

            $author = new Author();
            $author->setFirstname($firstName);
            $author->setLastname($lastName);
            $manager->persist($author);

            $book = new Book();
            $book->setAuthor($author);
            $book->setCategory($category);
            $book->setTitle($row['title']);
            $book->setPublicationYear($row['year']);
            $manager->persist($book);

            $manager->flush();

            dump($book);

        }

        //$csv = Reader::createFromPath(get_include_path());

        /*$author = new Author();
        $author->setFirstname("Herman");
        $author->setLastname("Melville");
        $manager->persist($author);

        $category = new Category();
        $category->setName("Fiction");
        $manager->persist($category);

        $book = new Book();
        $book->setTitle('Moby Dick');
        $book->setAuthor($author);
        $book->setCategory($category);
        $manager->persist($book);

        $manager->flush();*/
    }
}
?>