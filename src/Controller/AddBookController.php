<?php

namespace App\Controller;

use App\Entity\Library;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddBookController extends AbstractController
{
    /**
     * @Route("/add/book", name="add_book")
     */
    public function book(EntityManagerInterface $em): Response
    {
        if ($_GET['author'] !== '' and $_GET['book'] !== '' and $_GET['year'] !== '') {
            if (is_numeric($_GET['year'])) {

                $book = new Library();
                $book->setAuthor($_GET['author']);
                $book->setBook($_GET['book']);
                $book->setYear($_GET['year']);
                $em->persist($book);
                $em->flush();
                $list = $em->getRepository(Library::class)->findBy([]);
                $message = 'Книга успешно добавлена в библиотеку.';
                return $this->redirectToRoute('successAdd');

                //return $this->render('book/index.html.twig', ['message' => $message]);
            } else {
                $message = 'Год издания должен быть числом!';
                return $this->render('book/index.html.twig', ['message' => $message]);
            }
        } else {
          $message = 'Все поля должны быть заполнены!';
          return $this->render('book/index.html.twig', ['message' => $message]);
        }
    }
}
