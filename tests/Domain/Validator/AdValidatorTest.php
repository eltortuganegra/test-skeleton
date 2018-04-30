<?php

namespace App\Domain\Entity;


use App\Domain\Validator\AdValidatorFactory;
use App\Domain\Validator\AllComponentsMustBeValidException;
use PHPUnit\Framework\TestCase;

class AdValidatorTest extends TestCase
{
    public function testAllComponentsMustBeValid()
    {
        // Assert
        $this->expectException(AllComponentsMustBeValidException::class);

        // Arrange
        $textData = [
            'name' => 'Zombie Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'text' => 'Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro.',
        ];
        $zombieTextComponent = ComponentFactory::createTextComponent($textData);
        $data = [
            'name' => 'Invalid data',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => '',
            'format' => 'noValidFormat',
            'size' => 500,
        ];
        $videoComponent = VideoComponentFactory::create($data);

        $ad = AdFactory::create();
        $ad->addComponent($zombieTextComponent);
        $ad->addComponent($videoComponent);

        $adValidator = AdValidatorFactory::create();

        // Act
        $adValidator->validate($ad);
    }
}