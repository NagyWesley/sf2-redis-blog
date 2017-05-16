<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Service;

class RedisService
{

    private $_redis;

    public function __construct($redis)
    {
        $this->_redis = $redis;
    }

    public function set($key, $value)
    {
        $this->_redis->set($key, $value);
    }
    
    public function get($key)
    {
        $this->_redis->get($key);
    }

}
