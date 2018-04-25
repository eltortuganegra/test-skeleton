<?php

namespace App\Domain\Validator;

use App\Domain\Entity\Ad;
use App\Domain\Entity\Component;
use App\Domain\Entity\ImageComponent;
use App\Domain\Entity\TextComponent;
use App\Domain\Entity\VideoComponent;

class AdValidatorImp implements AdValidator
{
    private $validator;

    public function validate(Ad $ad): bool
    {
        foreach ($ad->getComponents() as $component) {
            $this->validateComponent($component);
        }
    }

    public function validateComponent($component): void
    {
        $this->loadValidator($component);
        $this->executeValidator();
    }

    private function loadValidator(Component $component)
    {
        if ($this->isComponentAnImageComponent($component)) {
            $this->loadValidatorWithAnImageComponentValidator($component);
        } else if ($this->isComponentATextComponent($component)) {
            $this->loadValidatorWithATextComponentValidator($component);
        } else if ($this->isComponentAVideoComponent($component)) {
            $this->loadValidatorWithVideoComponentValidator($component);
        } else {
            $this->unsetValidator();
        }
    }

    private function isComponentAnImageComponent(Component $component): bool
    {
        return $component instanceof ImageComponent;
    }

    private function loadValidatorWithAnImageComponentValidator(Component $component): void
    {
        $this->validator = ImageComponentValidatorFactory::create($component);
    }

    private function isComponentATextComponent(Component $component): bool
    {
        return $component instanceof TextComponent;
    }

    private function loadValidatorWithATextComponentValidator(Component $component): void
    {
        $this->validator = TextComponentValidatorFactory::create($component);
    }

    private function isComponentAVideoComponent(Component $component): bool
    {
        return $component instanceof VideoComponent;
    }

    private function loadValidatorWithVideoComponentValidator(Component $component): void
    {
        $this->validator = VideoComponentValidatorFactory::create($component);
    }

    private function unsetValidator(): void
    {
        $this->validator = null;
    }

    private function executeValidator()
    {
        if ( ! $this->validator->validate()) {
            throw new AllComponentsMustBeValidException();
        }
    }

}