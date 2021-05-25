<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Entity\Todo\PlainTask;
use App\Entity\Todo\ShoppingTask;

class TodoController extends AbstractController
{
    /**
     *
     * @Route("/", name="index")
     */
    public function index(TokenStorageInterface $user): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $plainTaskRepository = $this->getDoctrine()->getRepository(PlainTask::class);
        $plainTasks = $plainTaskRepository->findAll();
        $plainTasks = $plainTaskRepository->findBy(
            ['userId' => $user->getToken()->getUser()],
        );
        $shoppingTaskRepository = $this->getDoctrine()->getRepository(ShoppingTask::class);
        $shoppingTasks = $shoppingTaskRepository->findAll();
        $shoppingTasks = $shoppingTaskRepository->findBy(
            ['userId' => $user->getToken()->getUser()],
        );

        $tasks = array_merge($plainTasks, $shoppingTasks);

        return $this->render('content/todo.html.twig', [
            'title' => 'Todo List',
            'tasks' => $tasks
        ]);
    }
}
