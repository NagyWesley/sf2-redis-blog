<?php

namespace AppBundle\Controller;

use AppBundle\Service\BlogService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{

    /**
     * @Route("/", name="writer")
     */
    public function indexAction(Request $request)
    {
//        $this->get('translator')->setLocale('en');
        /**
         * @var BlogService
         */
        $blogService = $this->get('blog_service');
        $blogs = $blogService->getHomepageBlogs();
        return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
                'blogs' => $blogs
        ]);
    }

}
