<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace AppBundle\Service;

class RedisService
{

    /**
     *
     * @var Predis
     */
    private $_predis;

    public function __construct($redis)
    {
        $this->_predis = $redis;
    }

    /**
     * Set value with a key
     * @param type $key
     * @param type $value
     * @return type
     */
    public function set($key, $value)
    {
        return $this->_predis->set($key, $value);
    }

    /**
     * Get Value by key
     * @param type $key
     * @return type
     */
    public function get($key)
    {
        return $this->_predis->get($key);
    }

    /**
     * Append to list with key
     * @param type $list
     * @param type $value
     * @return type
     */
    public function Lappend($list, $value)
    {
        return $this->_predis->rpush($list, $value);
    }

    /**
     * Retrieve from list by 
     * key,range and offsset
     * @param type $list
     * @param type $range
     * @param type $offset
     * @return type
     */
    public function getRange($list, $range, $offset = 0)
    {
        return $this->_predis->lrange($list, $offset, $range);
    }

    /**
     * Add array with a key
     * @param type $key
     * @param type $array
     * @return type
     */
    public function sAdd($key , $array)
    {
        return $this->_predis->sAdd($key , $array);
    }

    /**
     * Get Array by a key
     * @param type $key
     * @return type
     */
    public function sMembers($key)
    {
        return $this->_predis->sMembers($key);
    }
}
