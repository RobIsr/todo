<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Entity\Todo\PlainTask;

class TodoController extends AbstractController
{
    /**
     *
     * @Route("/", name="index")
     */
    public function index(TokenStorageInterface $user): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $repository = $this->getDoctrine()->getRepository(PlainTask::class);
        $tasks = $repository->findAll();
        $tasks = $repository->findBy(
            ['userId' => $user->getToken()->getUser()],
        );
        return $this->render('content/todo.html.twig', [
            'title' => 'Todo List',
            'tasks' => $tasks
        ]);
    }
}
