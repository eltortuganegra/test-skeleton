<?php

namespace App\Domain\Entity;

use PHPUnit\Framework\TestCase;

class AdTest extends TestCase
{
    public function testDefaultStateIsStopped()
    {
        // Arrange
        $ad = AdFactory::create();

        // Act
        $status = $ad->getStatus();

        // Assert
        $this->assertEquals('stopped', $status);
    }

    public function testAdCanChangeStatusToPublishing()
    {
        // Arrange
        $ad = AdFactory::create();
        $ad->publish();

        // Act
        $status = $ad->getStatus();

        // Assert
        $this->assertEquals('publishing', $status, 'Status is not publishing.');
    }

    public function testAdCanChangeStatusToPublished()
    {
        // Arrange
        $ad = AdFactory::create();
        $ad->published();

        // Act
        $status = $ad->getStatus();

        // Assert
        $this->assertEquals('published', $status, 'Status is not published.');
    }

    public function testCreateAnAdAndAddATextComponent()
    {
        // Arrange
        $textData = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'text' => 'Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro.',
        ];
        $textComponent = ComponentFactory::createTextComponent($textData);
        $ad = AdFactory::create();
        $ad->addComponent($textComponent);

        // Act
        $components = $ad->getComponents();

        // Assert
        $this->assertEquals($textComponent, $components[0]);
    }

    public function testCreateAnAdAddSeveralComponents()
    {
        // Arrange
        $textData = [
            'name' => 'Zombie Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'text' => 'Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro.',
        ];
        $zombieTextComponent = ComponentFactory::createTextComponent($textData);
        $textData = [
            'name' => 'Hodor',
            'position' => '40,50,60',
            'width' => 50,
            'height' => 100,
            'text' => 'Hodor, hodor. Hodor. Hodor, HODOR hodor, hodor hodor hodor - hodor hodor hodor!',
        ];
        $hodorTextComponent = ComponentFactory::createTextComponent($textData);

        $ad = AdFactory::create();
        $ad->addComponent($zombieTextComponent);
        $ad->addComponent($hodorTextComponent);

        // Act
        $components = $ad->getComponents();

        // Assert
        $this->assertEquals($hodorTextComponent, $components[1]);
    }


}
