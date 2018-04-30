<?php

namespace App\Domain\Entity;


use App\Domain\Validator\AllComponentsMustBeValidException;
use App\Domain\Validator\TextComponentValidatorFactory;
use PHPUnit\Framework\TestCase;

class TextComponentValidatorTest extends TestCase
{
    public function testTextFieldSizeMustBeLessThan140Characters()
    {
        // Assert
        $this->expectException(AllComponentsMustBeValidException::class);

        // Arrange
        $data = [
            'name' => 'Super Ad',
            'position' => '10,20,30',
            'width' => 50,
            'height' => 100,
            'text' => 'This text has 141 characters. This text has 141 characters. This text has 141 characters. This text has 141 characters. This text has 141 cha'
        ];

        $text = TextComponentFactory::create($data);
        $textValidator = TextComponentValidatorFactory::create($text);

        // Act
        $textValidator->validate();

    }

}
