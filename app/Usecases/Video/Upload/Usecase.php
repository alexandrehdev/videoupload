<?php

namespace App\Usecases\Video\Upload;
use App\Models\Video;

class Usecase{

    public function execute(Input $input)
    {
        $video = new Video();

        $video->file = $input->video;

        $video->thumb = $input->thumb;

        $video->save();
    }
}
