<?php

namespace App\Domain\Entity;

use App\Domain\ValueObject\PositionFactory;
use PHPUnit\Framework\TestCase;

class ComponentTest extends TestCase
{
    public function testImageComponentMustCanBeSerializedToJson()
    {
        // Arrange
        $dataInJson = '{"id":null,"name":"Super Ad","position":{"xCoordinate":1,"yCoordinate":2,"zCoordinate":3},"width":50,"height":100,"linkToExternalImage":"http:\/\/wanna-joke.com\/wp-content\/uploads\/2015\/11\/programmers-meme-no-errors.jpg","format":"png","size":1000}';
        $data = [
            'id' => 3,
            'name' => 'Super Ad',
            'position' => [
                "x_coordinate" => 1,
                "y_coordinate" => 2,
                "z_coordinate" => 3,
            ],
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => 'http://wanna-joke.com/wp-content/uploads/2015/11/programmers-meme-no-errors.jpg',
            'format' => 'png',
            'size' => 1000,
        ];
        $imageComponent = ComponentFactory::createImageComponent($data);

        // Act
        $result = $imageComponent->toJson();

        // Assert
        $this->assertEquals($dataInJson, $result, 'Data must be serialized.');
    }

    public function testVideoComponentMustCanBeSerialized()
    {
        // Arrange
        $serializedData = '{"id":null,"name":"Super Ad","position":{"xCoordinate":1,"yCoordinate":2,"zCoordinate":3},"width":50,"height":100,"linkToExternalImage":"http:\/\/dl3.webmfiles.org\/big-buck-bunny_trailer.webm","format":"webm","size":1000}';
        $data = [
            'id' => 3,
            'name' => 'Super Ad',
            'position' => [
                "x_coordinate" => 1,
                "y_coordinate" => 2,
                "z_coordinate" => 3,
            ],
            'width' => 50,
            'height' => 100,
            'linkToExternalImage' => 'http://dl3.webmfiles.org/big-buck-bunny_trailer.webm',
            'format' => 'webm',
            'size' => 1000,
        ];
        $videoComponent = ComponentFactory::createVideoComponent($data);

        // Act
        $result = $videoComponent->toJson();

        // Assert
        $this->assertEquals($serializedData, $result, 'Data must be serialized.');
    }

    public function testTextComponentMustCanBeSerialized()
    {
        // Arrange
        $serializedData = '{"id":null,"name":"Super Ad","position":{"xCoordinate":1,"yCoordinate":2,"zCoordinate":3},"width":50,"height":100,"text":"Zombie ipsum reversus ab viral inferno, nam rick grimes malum cerebro."}';
        $data = [
            'id' => 3,
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
        $textComponent = ComponentFactory::createTextComponent($data);

        // Act
        $result = $textComponent->toJson();

        // Assert
        $this->assertEquals($serializedData, $result, 'Data must be serialized.');
    }

}
