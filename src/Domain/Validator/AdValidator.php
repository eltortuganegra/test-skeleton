<?php

namespace App\Domain\Validator;


use App\Domain\Entity\Ad;

interface AdValidator
{
    public function validate(Ad $ad): bool;
}