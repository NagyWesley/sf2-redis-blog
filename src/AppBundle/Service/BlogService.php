<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

use AppBundle\Repository\BlogRepository;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Description of BlogService
 *
 * @author nagy
 */
class BlogService implements ContainerAwareInterface
{

    /**
     *
     * @var ContainerInterface
     */
    private $_container;
    
    public function getAllBlogs()
    {
        /**
         * @var BlogRepository
         */
        $blogRepo = $this->_container->get('blog_repo');
        $blogs = $blogRepo->findAll();
        return $blogs;
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->_container = $container;
    }

}
