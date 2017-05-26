<?php
/**
 * Created by PhpStorm.
 * User: Zach
 * Date: 4/29/2017
 * Time: 2:59 AM
 */

namespace Rgbvader\OAuth;


use League\OAuth2\Client\Provider\ResourceOwnerInterface;

class User implements ResourceOwnerInterface
{
    protected $data = array();

    public function getId()
    {
        return $this->id;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        return null;
    }

    public function __construct(array $data)
    {
        $this->data = $data;
    }

}