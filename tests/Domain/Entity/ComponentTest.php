<?php

namespace App\Domain\Entity;

use PHPUnit\Framework\TestCase;

class ComponentTest extends TestCase
{
    public function testImageComponentMustCanBeSerialized()
    {
        // Arrange
        $serializedData = 'a:7:{s:4:"name";s:8:"Super Ad";s:8:"position";s:8:"10,20,30";s:5:"width";i:50;s:6:"height";i:100;s:19:"linkToExternalImage";s:79:"http://wanna-joke.com/wp-content/uploads/2015/11/programmers-meme-no-errors.jpg";s:6:"format";s:3:"png";s:4:"size";i:1000;}';
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => 'http://wanna-joke.com/wp-content/uploads/2015/11/programmers-meme-no-errors.jpg',
            'format' => 'png',
            'size' => 1000,
        ];
        $imageComponent = ComponentFactory::createImageComponent($data);

        // Act
        $result = $imageComponent->serialize();

        // Assert
        $this->assertEquals($serializedData, $result, 'Data must be serialized.');
    }

    public function testVideoComponentMustCanBeSerialized()
    {
        // Arrange
        $serializedData = 'a:7:{s:4:"name";s:8:"Super Ad";s:8:"position";s:8:"10,20,30";s:5:"width";i:50;s:6:"height";i:100;s:19:"linkToExternalImage";s:52:"http://dl3.webmfiles.org/big-buck-bunny_trailer.webm";s:6:"format";s:4:"webm";s:4:"size";i:1000;}';
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => 'http://dl3.webmfiles.org/big-buck-bunny_trailer.webm',
            'format' => 'webm',
            'size' => 1000,
        ];
        $videoComponent = ComponentFactory::createVideoComponent($data);

        // Act
        $result = $videoComponent->serialize();

        // Assert
        $this->assertEquals($serializedData, $result, 'Data must be serialized.');
    }

    public function testTextComponentMustCanBeSerialized()
    {
        // Arrange
        $serializedData = 'a:5:{s:4:"name";s:8:"Super Ad";s:8:"position";s:8:"10,20,30";s:5:"width";i:50;s:6:"height";i:100;s:4:"text";s:70:"Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro.";}';
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'text' => 'Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro.',
        ];
        $textComponent = ComponentFactory::createTextComponent($data);

        // Act
        $result = $textComponent->serialize();

        // Assert
        $this->assertEquals($serializedData, $result, 'Data must be serialized.');
    }


}
