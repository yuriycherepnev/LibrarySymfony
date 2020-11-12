<?php

namespace App\Controller;

use App\Entity\Library;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController
{
    /**
     * @Route("/list", name="list")
     */
    public function list(EntityManagerInterface $em): Response
    {

        $list = $em->getRepository(Library::class)->findBy([]);
        return $this->render('library/index.html.twig', [ 'list' => $list ]);
    }
}
