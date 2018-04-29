<?php

namespace App\Domain\Service;


use App\Domain\Entity\TextComponent;
use App\infrastructure\persistence\AdRepository;
use App\infrastructure\persistence\TextComponentRepository;


class CreateAdService
{
    private $adRepository;
    private $ad;
    private $textComponentRepository;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function execute(CreateAdServiceRequest $createAdServiceRequest)
    {
        $this->loadAd($createAdServiceRequest);
        $this->createAd();
        if ($this->areThereComponents()) {
            foreach ($this->ad->getComponents() as $component) {
                if ($component instanceof TextComponent) {
                    $this->textComponentRepository->create($component, $this->ad);
                }
            }
        }

        return $this->buildResponse();
    }

    private function loadAd(CreateAdServiceRequest $createAdServiceRequest)
    {
        $this->ad = $createAdServiceRequest->getAd();
    }

    private function createAd()
    {
        $this->adRepository->create($this->ad);
    }

    private function areThereComponents(): bool
    {
        return $this->ad->getAmountComponents() > 0;
    }

    private function buildResponse(): CreateAdServiceResponse
    {
        return new CreateAdServiceResponse($this->ad);
    }

    public function setTextComponentRepository(TextComponentRepository $textComponentRepository)
    {
        $this->textComponentRepository = $textComponentRepository;
    }

}