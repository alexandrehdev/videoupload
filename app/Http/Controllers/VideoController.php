<?php

namespace App\Http\Controllers;
use App\Usecases\Video\Upload\Input as VideoUploadInput;
use App\Http\Requests\VideoUploadRequest;
use Illuminate\Support\Facades\Storage;
use App\Models\Video;
use App\Jobs\UploadVideo;


class VideoController extends Controller
{
    public function upload(VideoUploadRequest $request)
    {   
        
        $video_path = Storage::putFile(
            'public/video-courses', 
            $request->file('video')
        );
        
        $thumb_path = Storage::putFile(
            'public/video-courses', 
            $request->file('thumb')
        );
        
        $video_input = new VideoUploadInput(
            $video_path,
            $thumb_path
        );

        UploadVideo::dispatch(
            $video_input
        )->onQueue('video_upload');
        

        return back();
    }


    public function show()
    {
        $videos = Video::all();

        return view('pages.list',compact("videos"));
    }
}
