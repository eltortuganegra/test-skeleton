<?php

namespace App\Domain\Entity;

use PHPUnit\Framework\TestCase;

class AdTest extends TestCase
{
    public function testDefaultStateIsStopped()
    {
        // Arrange
        $ad = AdFactoryImp::create();

        // Act
        $status = $ad->getStatus();

        // Assert
        $this->assertEquals('stopped', $status);
    }

}
