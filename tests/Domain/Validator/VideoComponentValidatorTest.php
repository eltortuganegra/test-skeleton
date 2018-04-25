<?php

namespace App\Domain\Entity;

use App\Domain\Validator\VideoComponentValidatorFactory;
use PHPUnit\Framework\TestCase;

class VideoComponentValidatorTest extends TestCase
{
    public function testVideoWithInvalidFormat()
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
        $videoComponent = VideoComponentFactory::create($data);
        $validator = VideoComponentValidatorFactory::create($videoComponent);

        // Act
        $isVideoValid = $validator->validate();

        // Assert
        $this->assertEquals(false, $isVideoValid);
    }

    public function testVideoWithMp4Format()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'url' => '',
            'format' => 'mp4',
            'size' => 500,
        ];
        $video = VideoComponentFactory::create($data);
        $validator = VideoComponentValidatorFactory::create($video);

        // Act
        $isVideoValid = $validator->validate();

        // Assert
        $this->assertEquals(true, $isVideoValid);
    }

    public function testVideoWithWebmFormat()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'url' => '',
            'format' => 'webm',
            'size' => 500,
        ];
        $video = VideoComponentFactory::create($data);
        $validator = VideoComponentValidatorFactory::create($video);

        // Act
        $isVideoValid = $validator->validate();

        // Assert
        $this->assertEquals(true, $isVideoValid);
    }

}
