<?php

namespace WriterBundle\Controller;

use AppBundle\Service\BlogService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BlogController extends Controller
{

    /**
     * @Route("/editblog/{id}", name="edit_blog")
     */
    public function editBlogAction($id)
    {
        /**
         * @var BlogService
         */
        $blogService = $this->get('blog_service');
        $blog = $blogService->getBlog($id);
        $form = $this->createFormBuilder($blog)
            ->add('content', TextareaType::class)
            ->add('dateCreated', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
            ->getForm();

        return $this->render('WriterBundle:Blog:editBlog.html.twig',['blog'=>$blog, 'form'=>$form->createView()]);
    }

}
