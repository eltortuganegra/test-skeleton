<?php

namespace App\Domain\Entity;

use App\Domain\Validator\AllComponentsMustBeValidException;
use App\Domain\Validator\ImageComponentValidatorFactory;
use PHPUnit\Framework\TestCase;

class ImageComponentValidatorTest extends TestCase
{
    public function testImageWithInvalidFormat()
    {
        // Assert
        $this->expectException(AllComponentsMustBeValidException::class);

        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => '',
            'format' => 'noValidFormat',
            'size' => 500,
        ];
        $image = ImageComponentFactory::create($data);
        $validator = ImageComponentValidatorFactory::create($image);

        // Act
        $validator->validate();
    }

    public function testImageCanHaveAPngFormat()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => '',
            'format' => 'png',
            'size' => 500,
        ];
        $image = ImageComponentFactory::create($data);
        $validator = ImageComponentValidatorFactory::create($image);

        // Act
        $validator->validate();

        // Assert
        $this->assertTrue(true);
    }

    public function testImageCanHaveAJpgFormat()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => '',
            'format' => 'jpg',
            'size' => 500,
        ];
        $image = ImageComponentFactory::create($data);
        $validator = ImageComponentValidatorFactory::create($image);

        // Act
        $validator->validate();

        // Assert
        $this->assertTrue(true);
    }

}
