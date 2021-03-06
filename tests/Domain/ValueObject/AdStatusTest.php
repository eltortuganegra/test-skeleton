<?php

namespace App\Domain\ValueObject;

use App\Domain\ValueObject\AdStatusFactory;

class AdStatusTest extends \PHPUnit\Framework\TestCase
{

    public function testPublishingStatusMustHaveThePublishingValue()
    {
        // Arrange
        $publishingStatus = AdStatusFactory::createPublishing();

        // Act
        $value = $publishingStatus->getValue();

        // Assert
        $this->assertEquals(AdStatusFactory::AD_STATUS_PUBLISHING, $value);
    }

    public function testPublishedStatusMustHaveThePublishedValue()
    {
        // Arrange
        $publishingStatus = AdStatusFactory::createPublished();

        // Act
        $value = $publishingStatus->getValue();

        // Assert
        $this->assertEquals(AdStatusFactory::AD_STATUS_PUBLISHED, $value);
    }

    public function testStoppedStatusMustHaveTheStoppedValue()
    {
        // Arrange
        $stoppedStatus = AdStatusFactory::createStopped();

        // Act
        $value = $stoppedStatus->getValue();

        // Assert
        $this->assertEquals(AdStatusFactory::AD_STATUS_STOPPED, $value);
    }
}
