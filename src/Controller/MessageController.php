<?php

namespace App\Controller;

use App\Entity\Capitalize;
use App\Entity\Logger;
use App\Entity\Master;
use App\Entity\SpaceToDashes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MessageController extends AbstractController
{
    #[Route('/', name: 'message')]
    public function getInput(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('message', TextType::class)
            ->add('options', ChoiceType::class, [
                'choices' => [
                    'Capitalize' => 0,
                    'SpaceToDashes' => 1,
                ]])

            ->add('send', SubmitType::class, ['label' => 'Send'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $option = [new Capitalize(), new SpaceToDashes()];
            $master = new Master($option[$task['options']], new Logger());
            $message = $master->logShowMessage($task['message']);

            return $this->render('message/index.html.twig', [
                'form' => $form->createView(),
                'message' => $message,
            ]);

        }
        return $this->render('message/index.html.twig', [
            'form' => $form->createView(),
            'message'=>'Oi',
        ]);
    }
}
