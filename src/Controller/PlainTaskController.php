<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Entity\Todo\PlainTask;
use App\Form\Type\TaskFormType;

class PlainTaskController extends AbstractController
{
    /**
     *
     * @Route("/addTask", name="addTask")
     */
    public function addTask(Request $request, UserInterface $user): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $task = new PlainTask();
        $form = $this->createForm(TaskFormType::class, $task);

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

        return $this->render('content/add_task_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     *
     * @Route("/removeTask/{taskId}", name="removeTask")
     */
    public function removeTask($taskId): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(PlainTask::class);
        $task = $repository->find($taskId);
        $entityManager->remove($task);
        $entityManager->flush();

        return $this->redirectToRoute('index');
    }

        /**
     *
     * @Route("/updateTask/{taskId}", name="updateTask")
     */
    public function updateTask($taskId, Request $request, UserInterface $user): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository(PlainTask::class);
        $task = $repository->find($taskId);

        $form = $this->createForm(TaskFormType::class, $task);

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

        return $this->render('content/add_task_form.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
