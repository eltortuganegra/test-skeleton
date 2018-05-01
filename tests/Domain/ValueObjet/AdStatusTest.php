<?php

namespace App\Domain\ValueObjet;

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
}
