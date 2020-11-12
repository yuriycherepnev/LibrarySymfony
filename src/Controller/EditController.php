<?php

namespace App\Controller;

use App\Entity\Library;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EditController extends AbstractController
{
    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit($id, Library $Library, EntityManagerInterface $em): Response
    {
        $repository = $em->getRepository(Library::class);
        $book = $repository->findOneBy(['id'=>$id ]);

        if (isset($_GET['edit']) ) {
            if ($_GET['edit'] == 'edit') {
                if ($_GET['author'] !== '' and $_GET['book'] !== '' and $_GET['year'] !== '') {
                    if (is_numeric($_GET['year'])) {
                        $book->setAuthor($_GET['author']);
                        $book->setBook($_GET['book']);
                        $book->setYear($_GET['year']);
                        $em->persist($book);
                        $em->flush();
                        return $this->redirectToRoute('successEdit');
                    } else {
                        $message = 'Год издания должен быть числом!';
                        return $this->render('edit/index.html.twig', ['message' => $message, 'book'=>$book]);
                    }
                } else {
                    $message = 'Все поля должны быть заполнены!';
                    return $this->render('edit/index.html.twig', ['message' => $message, 'book'=>$book]);
                }
            } else if ($_GET['edit'] == 'delete') {
                $em->remove($Library);
                $em->flush();
                return $this->redirectToRoute('successDelete');
            }
        }
        return $this->render('edit/index.html.twig', ['book'=>$book ]);
    }
}
