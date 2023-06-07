<?php namespace Template\BusinessLogic\Libraries;

use CodeIgniter\RESTful\ResourceController;

class Api extends ResourceController
{
    public function __construct()
    {
        helper('avegacms');
    }

    /**
     * @return array
     */
    public function posts(): array
    {
        return $this->respond(['data' => service('content')->getPosts($this->request->getGet())]);
    }

    public function services()
    {
        return $this->respond(['data' => array_column(service('Content')->getServices(), 'title')]);
    }
}