<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\AdStatusFactory;
use PHPUnit\Framework\TestCase;

class AdTest extends TestCase
{
    public function testWhenAnAdIsCreatedItsDefaultStatusIsPublishing()
    {
        // Arrange
        $ad = AdFactory::create();

        // Act
        $status = $ad->getStatus();

        // Assert
        $this->assertEquals(AdStatusFactory::AD_STATUS_PUBLISHING, $status->getValue());
    }

    public function testIfAnAdIsPublishedThenItsStatusIsChangedToPublished()
    {
        // Arrange
        $ad = AdFactory::create();
        $ad->publish();

        // Act
        $status = $ad->getStatus();

        // Assert
        $this->assertEquals(AdStatusFactory::AD_STATUS_PUBLISHED, $status->getValue(), 'Status is not published.');
    }

    public function testIfAnAdIsStoppedThenItsStatusIsChangedToStopped()
    {
        // Arrange
        $ad = AdFactory::create();
        $ad->stop();

        // Act
        $status = $ad->getStatus();

        // Assert
        $this->assertEquals(AdStatusFactory::AD_STATUS_STOPPED, $status->getValue(), 'Status is not stopped.');
    }

    public function testWhenAComponentIsAddedToAnAdTheAmountOfComponentsMustBeOne()
    {
        // Arrange
        $textComponent = $this->getDefaultTextComponent();
        $ad = AdFactory::create();
        $ad->addComponent($textComponent);

        // Act
        $amount = $ad->getAmountComponents();

        // Assert
        $this->assertEquals(1, $amount);
    }

    private function getTextDataForTextComponent(): array
    {
        $textData = [
            'name' => 'Super Ad',
            'position' => [
                "x_coordinate" => 1,
                "y_coordinate" => 2,
                "z_coordinate" => 3,
            ],
            'width' => 50,
            'height' => 100,
            'text' => 'Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro.',
        ];
        return $textData;
    }

    private function getDefaultTextComponent(): TextComponent
    {
        $textData = $this->getTextDataForTextComponent();
        $textComponent = ComponentFactory::createTextComponent($textData);

        return $textComponent;
    }

    public function testWhenTwoComponentsAreAddedToAnAdTheAmountOfComponentsMustBeTwo()
    {
        // Arrange
        $ad = AdFactory::create();
        $textComponentFirst = $this->getDefaultTextComponent();
        $ad->addComponent($textComponentFirst);
        $textComponentSecond = $this->getDefaultTextComponent();
        $ad->addComponent($textComponentSecond);

        // Act
        $amountComponents = $ad->getAmountComponents();

        // Assert
        $this->assertEquals(2, $amountComponents);
    }

    public function testAdCanNotBeModifiedIfItsStatusIsPublished()
    {
        $this->expectException(AdCanNotBeModifiedIfItsStatusIsPublishingException::class);

        // Arrange
        $textComponentFirst = $this->getDefaultTextComponent();
        $textComponentSecond = $this->getDefaultTextComponent();

        $ad = AdFactory::create();
        $ad->addComponent($textComponentFirst);
        $ad->publish();

        // Act
        $ad->addComponent($textComponentSecond);
    }

    public function testWhenOneComponentsIsAddedThenTheAdMustCanReturnThatComponent()
    {
        // Arrange
        $ad = AdFactory::create();
        $textComponent = $this->getDefaultTextComponent();
        $ad->addComponent($textComponent);
        $components = $ad->getComponents();

        // Act
        $returnedComponent = $components[0];

        // Assert
        $this->assertEquals($textComponent, $returnedComponent);
    }

}
