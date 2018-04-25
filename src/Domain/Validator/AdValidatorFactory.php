<?php

namespace App\Domain\Validator;


use App\Domain\Entity\Ad;

class AdValidatorFactory
{
    static public function create():AdValidator
    {
        return new AdValidatorImp();
    }

}