<?php

namespace App\Domain\Entity;


use App\Domain\Validator\TextValidatorFactory;
use PHPUnit\Framework\TestCase;

class TextComponentValidatorTest extends TestCase
{
    public function testTextFieldSizeMustBeLessThan140Characters()
    {
        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'text' => 'This text has 141 characters. This text has 141 characters. This text has 141 characters. This text has 141 characters. This text has 141 cha'
        ];

        $text = TextComponentFactory::create($data);
        $textValidator = TextValidatorFactory::create($text);

        // Act
        $isValid = $textValidator->validate();

        // Assert
        $this->assertEquals(false, $isValid, 'Text field length must be less than 140 characters.');
    }

}