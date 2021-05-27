<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Todo\ShoppingTask;
use App\Form\Type\ShoppingTaskType;

class ShoppingTaskController extends AbstractController
{
    /**
     *
     * @Route("/addShoppingTask", name="addShoppingTask")
     */
    public function addShoppingTask(Request $request, UserInterface $user): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $task = new ShoppingTask();
        $form = $this->createForm(ShoppingTaskType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $data = $form->getData();
            $task->setUserId($user->getId());
            $task->setTitle($data["Title"]);
            $task->setProducts($data["Products"]);

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('content/add_shopping_task.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     *
     * @Route("/removeShoppingTask/{taskId}", name="removeShoppingTask")
     */
    public function removeShoppingTask($taskId): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(ShoppingTask::class);
        $task = $repository->find($taskId);
        $entityManager->remove($task);
        $entityManager->flush();

        return $this->redirectToRoute('index');
    }

    /**
     *
     * @Route("/updateShoppingTask/{taskId}", name="updateShoppingTask")
     */
    public function updateShoppingTask($taskId, Request $request, UserInterface $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(ShoppingTask::class);
        $task = $repository->find($taskId);

        $form = $this->createForm(ShoppingTaskType::class, $task);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();
            $task->setUserId($user->getId());

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }

        return $this->render('content/add_shopping_task.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
