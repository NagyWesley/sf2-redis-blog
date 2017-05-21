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
use AppBundle\Service\RedisService;

/**
 * Description of BlogService
 *
 * @author nagy
 */
class BlogService implements ContainerAwareInterface
{

    CONST HOMEPAGE_BLOGS_KEY = 'home_page_blogs';
    CONST HOMEPAGE_BLOGS_EXPIRY = 10; //in seconds

    /**
     *
     * @var ContainerInterface
     */

    private $_container;

    public function getHomepageBlogs()
    {
        /**
         * @var RedisService
         */
        $redis = $this->_container->get('redis');

        $blogsInCache = $redis->sMembers(self::HOMEPAGE_BLOGS_KEY);
        if (!empty($blogsInCache)) {
            return $blogsInCache;
        }
        $blogs = $this->getAllBlogs();
        $content = [];
        foreach ($blogs as $blog) {
            $content[] = $blog->getContent();
        }
        $redis->sAdd(self::HOMEPAGE_BLOGS_KEY, $content);
        $redis->expire(self::HOMEPAGE_BLOGS_KEY, self::HOMEPAGE_BLOGS_EXPIRY);

        return $content;
    }

    public function getAllBlogs()
    {
        /**
         * @var BlogRepository
         */
        $blogRepo = $this->_container->get('blog_repo');
        $blogs = $blogRepo->findAll();
        return $blogs;
    }

    public function getBlog($id)
    {
        $blogRepo = $this->_container->get('blog_repo');
        return $blogRepo->find($id);
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->_container = $container;
    }

}
