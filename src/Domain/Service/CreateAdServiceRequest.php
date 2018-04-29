<?php

namespace App\Domain\Service;


class CreateAdServiceRequest
{
    private $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getName()
    {
        return $this->data['name'];
    }

}