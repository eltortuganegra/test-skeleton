<?php

namespace App\Domain\Entity;

use App\Domain\Validator\ImageComponentValidatorFactory;
use PHPUnit\Framework\TestCase;

class ImageComponentValidatorTest extends TestCase
{
    public function testImageWithInvalidFormat()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'url' => '',
            'format' => 'noValidFormat',
            'size' => 500,
        ];
        $image = ImageComponentFactory::create($data);
        $validator = ImageComponentValidatorFactory::create($image);

        // Act
        $isImageValid = $validator->validate();

        // Assert
        $this->assertEquals(false, $isImageValid);
    }

    public function testImageCanHaveAPngFormat()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'url' => '',
            'format' => 'png',
            'size' => 500,
        ];
        $image = ImageComponentFactory::create($data);
        $validator = ImageComponentValidatorFactory::create($image);

        // Act
        $isImageValid = $validator->validate();

        // Assert
        $this->assertEquals(true, $isImageValid);
    }

    public function testImageCanHaveAJpgFormat()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'url' => '',
            'format' => 'jpg',
            'size' => 500,
        ];
        $image = ImageComponentFactory::create($data);
        $validator = ImageComponentValidatorFactory::create($image);

        // Act
        $isImageValid = $validator->validate();

        // Assert
        $this->assertEquals(true, $isImageValid);
    }



}
