<?php

namespace App\Controller;

use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroPostController extends AbstractController
{
    #[Route('/micro-post', name: 'app_micro_post')]
    public function index(MicroPostRepository $posts): Response
    {

        return $this->render('micro_post/index.html.twig', [
            'posts' => $posts->findAll(),
        ]);
    }

    #[Route('/micro-post/{post}', name: 'app_micro_post_show')]
    public function showOne(MicroPost $post): Response
    {
        return $this->render('micro_post/show.html.twig', [
            'post' => $post
        ]);
    }

    #[Route('/micro-post/add', name: 'app_micro_post_add', priority: 2)]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $microPost = new MicroPost();
        $form = $this->createFormBuilder($microPost)
            ->add('title')
            ->add('text')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $post = $form->getData();
            $post->setCreated(new DateTime());

            $entityManager->persist($post);
            $entityManager->flush();

            //Add flash message
            $this->addFlash('success', 'Post successfully posted');
            return $this->redirectToRoute('app_micro_post');
            //Redirect


        }

        return $this->render('micro_post/add.html.twig',
            [
                'form' => $form
            ]);
    }
 #[Route('/micro-post/{post}/edit', name: 'app_micro_post_edit')]
    public function edit(MicroPost $post, Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createFormBuilder($post)
            ->add('title')
            ->add('text')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $post = $form->getData();

            $entityManager->persist($post);
            $entityManager->flush();

            //Add flash message
            $this->addFlash('success', 'Post successfully updated');
            return $this->redirectToRoute('app_micro_post');
            //Redirect


        }

        return $this->render('micro_post/add.html.twig',
            [
                'form' => $form
            ]);
    }
}
