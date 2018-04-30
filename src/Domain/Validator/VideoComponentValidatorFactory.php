<?php

namespace App\Domain\Validator;


use App\Domain\Entity\VideoComponent;

class VideoComponentValidatorFactory
{
    static public function create(VideoComponent $videoComponent): VideoComponentValidator
    {
        return new VideoComponentValidatorImp($videoComponent);
    }

}