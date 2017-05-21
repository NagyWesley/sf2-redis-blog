<?php

namespace WriterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        /**
         * @var BlogService
         */
        $blogService = $this->get('blog_service');
        $blogs = $blogService->getAllBlogs();
        return $this->render('WriterBundle:Default:index.html.twig',['blogs'=>$blogs]);
    }
}
