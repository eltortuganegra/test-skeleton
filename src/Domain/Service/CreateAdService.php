<?php

namespace App\Domain\Service;


use App\Domain\Entity\ImageComponent;
use App\Domain\Entity\TextComponent;
use App\Domain\Entity\VideoComponent;
use App\infrastructure\persistence\AdRepository;
use App\infrastructure\persistence\ImageComponentRepository;
use App\infrastructure\persistence\TextComponentRepository;
use App\infrastructure\persistence\VideoComponentRepository;

class CreateAdService
{
    private $adRepository;
    private $ad;
    private $textComponentRepository;
    private $imageComponentRepository;
    private $videoComponentRepository;

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
                } if ($component instanceof ImageComponent) {
                    $this->imageComponentRepository->create($component, $this->ad);
                } if ($component instanceof VideoComponent) {
                    $this->videoComponentRepository->create($component, $this->ad);
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

    public function setImageComponentRepository(ImageComponentRepository $imageComponentRepository)
    {
        $this->imageComponentRepository = $imageComponentRepository;
    }

    public function setVideoComponentRepository(VideoComponentRepository $videoComponentRepository)
    {
        $this->videoComponentRepository = $videoComponentRepository;
    }

}