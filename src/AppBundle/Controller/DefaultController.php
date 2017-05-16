<?php

namespace AppBundle\Controller;

use AppBundle\Service\BlogService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
      
        /**
         * @var BlogService
         */
        $blogService = $this->get('blog_service');
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
                'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
                'blogs' => $blogService->getAllBlogs()
        ]);
    }

}
