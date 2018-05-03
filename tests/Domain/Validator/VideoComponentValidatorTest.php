<?php

namespace App\Domain\Entity;

use App\Domain\Validator\AllComponentsMustBeValidException;
use App\Domain\Validator\VideoComponentValidatorFactory;
use PHPUnit\Framework\TestCase;

class VideoComponentValidatorTest extends TestCase
{
    public function testVideoWithInvalidFormat()
    {
        // Assert
        $this->expectException(AllComponentsMustBeValidException::class);

        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => [
                "x_coordinate" => 10,
                "y_coordinate" => 20,
                "z_coordinate" => 30,
            ],
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => '',
            'format' => 'noValidFormat',
            'size' => 500,
        ];
        $videoComponent = VideoComponentFactory::create($data);
        $validator = VideoComponentValidatorFactory::create($videoComponent);

        // Act
        $validator->validate();

        // Assert
        $this->assertTrue(true);
    }

    public function testVideoWithMp4Format()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => [
                "x_coordinate" => 10,
                "y_coordinate" => 20,
                "z_coordinate" => 30,
            ],
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => '',
            'format' => 'mp4',
            'size' => 500,
        ];
        $video = VideoComponentFactory::create($data);
        $validator = VideoComponentValidatorFactory::create($video);

        // Act
        $validator->validate();

        // Assert
        $this->assertTrue(true);
    }

    public function testVideoWithWebmFormat()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => [
                "x_coordinate" => 10,
                "y_coordinate" => 20,
                "z_coordinate" => 30,
            ],
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => '',
            'format' => 'webm',
            'size' => 500,
        ];
        $video = VideoComponentFactory::create($data);
        $validator = VideoComponentValidatorFactory::create($video);

        // Act
        $validator->validate();

        // Assert
        $this->assertTrue(true);
    }

}
