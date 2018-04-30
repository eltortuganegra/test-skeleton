<?php

namespace App\Domain\Service;


use App\Domain\Entity\AdFactory;
use App\Domain\Entity\ImageComponentFactory;
use App\Domain\Entity\TextComponentFactory;
use App\Domain\Entity\VideoComponentFactory;

class CreateAdServiceRequest implements ServiceRequest
{
    private $ad;

    public function __construct(array $data)
    {
        $this->createAd($data);
        if ($this->isThereOneOrMoreComponents($data)) {
            $this->createComponents($data);
        }
    }

    private function createAd(array $data)
    {
        $this->ad = AdFactory::create($data);
    }

    private function isThereOneOrMoreComponents(array $data): bool
    {
        return key_exists('components', $data);
    }

    private function createComponents(array $data)
    {
        foreach ($data['components'] as $componentData) {
            $this->addComponentToAd($componentData);
        }
    }

    private function addComponentToAd($componentData): void
    {
        if ($componentData['type'] == 'TextComponent') {
            $component = TextComponentFactory::create($componentData);
        } else if ($componentData['type'] == 'ImageComponent') {
            $component = ImageComponentFactory::create($componentData);
        } else if ($componentData['type'] == 'VideoComponent') {
            $component = VideoComponentFactory::create($componentData);
        }

        $this->ad->addComponent($component);
    }

    public function getAd()
    {
        return $this->ad;
    }

}