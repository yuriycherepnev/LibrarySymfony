<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
    * @Route("/book", name="book")
    */
    public function book(): Response
    {
        return $this->render('book/index.html.twig', []);
    }
    /**
     * @Route("/successAdd", name="successAdd")
     */
    public function successAdd(): Response
    {
        $message = 'Книга успешно добавлена в библиотеку.';
        return $this->render('book/index.html.twig', ['message' => $message]);
    }
    /**
     * @Route("/successEdit", name="successEdit")
     */
    public function successEdit(): Response
    {
        $message = 'Книга успешно отредактирована.';
        return $this->render('book/index.html.twig', ['message' => $message]);
    }
    /**
     * @Route("/successDelete", name="successDelete")
     */
    public function successDelete(): Response
    {
        $message = 'Книга успешно удалена.';
        return $this->render('book/index.html.twig', ['message' => $message]);
    }
}
