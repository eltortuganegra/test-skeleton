<?php

namespace App\Domain\Validator;


use App\Domain\Entity\VideoComponent;

class VideoComponentValidatorImp implements VideoComponentValidator
{
    private $video;

    public function __construct(VideoComponent $video)
    {
        $this->video = $video;
    }

    public function validate()
    {
        if ($this->isFormatMp4() || $this->isFormatWebm()) {
        } else {
            throw new AllComponentsMustBeValidException();
        }
    }

    public function isFormatMp4(): bool
    {
        return $this->video->getFormat() === 'mp4';
    }

    public function isFormatWebm(): bool
    {
        return $this->video->getFormat() === 'webm';
    }
}