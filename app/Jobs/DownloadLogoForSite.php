<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Intervention\Image\Facades\Image;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class DownloadLogoForSite implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $ayarlar;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ayarlar)
    {
        $this->ayarlar = $ayarlar;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $image = Image::make(public_path('storage/'.$this->ayarlar->logo))->resize(152,61);
        $image->save();
    }
}
