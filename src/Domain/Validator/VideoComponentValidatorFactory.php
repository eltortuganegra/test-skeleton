<?php

namespace App\Domain\Validator;


use App\Domain\Entity\VideoComponent;

class VideoComponentValidatorFactory
{
    static public function create(VideoComponent $video): VideoComponentValidator
    {
        return new VideoComponentValidatorImp($video);
    }

}