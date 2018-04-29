<?php

namespace App\Domain\Service;


use App\Domain\Entity\AdFactory;
use App\infrastructure\persistence\AdRepository;

class CreateAdService
{
    private $adRepository;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function execute(CreateAdServiceRequest $createAdServiceRequest)
    {
        $ad = AdFactory::create();
        $ad->setName($createAdServiceRequest->getName());

        $this->adRepository->create($ad);

        return new CreateAdServiceResponse($ad);
    }

}