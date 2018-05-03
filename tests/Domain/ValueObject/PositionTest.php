<?php

namespace App\Domain\ValueObject;


use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{

    public function testAPositionMustHave3coordinates()
    {
        // Arrange
        $position = PositionFactory::create(1, 2, 3);

        // Act
        $xCoordinate = $position->getXCoordinate();
        $yCoordinate = $position->getYCoordinate();
        $zCoordinate = $position->getZCoordinate();

        // Assert
        $this->assertEquals(1, $xCoordinate);
        $this->assertEquals(2, $yCoordinate);
        $this->assertEquals(3, $zCoordinate);
    }

}