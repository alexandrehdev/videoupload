<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Usecases\Video\Upload\Usecase as VideoUpload;
use App\Usecases\Video\Upload\Input as VideoUploadInput;


class UploadVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public VideoUploadInput $video_input
    ){}
    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $videoUpload = new VideoUpload();

        $videoUpload->execute($this->video_input);
    }
}
