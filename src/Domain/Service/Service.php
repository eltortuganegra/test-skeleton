<?php

namespace App\Domain\Service;


interface Service
{
    public function execute(ServiceRequest $serviceRequest): ServiceResponse;
}