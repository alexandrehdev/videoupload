<?php

namespace App\Http\Controllers;
use App\Usecases\Video\Upload\Usecase as VideoUpload;
use App\Usecases\Video\Upload\Input as VideoUploadInput;
use App\Http\Requests\VideoUploadRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;


class VideoController extends Controller
{
    public function upload(VideoUploadRequest $request, VideoUpload $videoUpload)
    {
        $file_path = Storage::putFile(
            'public/video-courses', 
            $request->file('file')
        );

        $video_input = new VideoUploadInput(
            $file_path
        );


        $videoUpload->execute($video_input);

        return back();
    }


    public function show()
    {
        $videos = Video::all();

        return view('list',compact("videos"));
    }
}
