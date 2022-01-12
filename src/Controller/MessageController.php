<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/', name: 'message')]
    public function getInput(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('message', TextType::class)
            ->add('send', SubmitType::class, ['label' => 'Send'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $message = $task['message'];

            return $this->render('message/index.html.twig', [
                'message' => $message,
                'form' => $form->createView(),
            ]);

        }
        return $this->render('message/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
