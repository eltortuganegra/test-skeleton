<?php

namespace App\Domain\Service;


use App\infrastructure\persistence\AdRepository;

class PublishAdService implements Service
{
    private $adRepository;
    private $ad;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function execute(ServiceRequest $serviceRequest): ServiceResponse
    {
        $this->findAd($serviceRequest);
        $this->publish();
        $this->updateRepository();
        $response = $this->getResponse();

        return $response;
    }

    protected function findAd(ServiceRequest $serviceRequest)
    {
        $this->ad = $this->adRepository->getById($serviceRequest->getAdId());
    }

    protected function publish(): void
    {
        $this->ad->publish();
    }

    protected function updateRepository(): void
    {
        $this->adRepository->update($this->ad);
    }

    protected function getResponse(): PublishAdServiceResponse
    {
        $response = new PublishAdServiceResponse($this->ad);

        return $response;
    }

}