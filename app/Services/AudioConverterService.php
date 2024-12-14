<?php

namespace App\Services;

use FFMpeg\FFMpeg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class AudioConverterService
{
    public function convertOggToOpusBase64($inputBase64)
    {
        $inputBase64 = trim(Str::replace('data:audio/ogg;base64,', '', $inputBase64));
        $inputData = base64_decode($inputBase64);

        $inputPath = Str::uuid() . '.ogg';

        Storage::disk('public')->put($inputPath , $inputData);

        $inputPath = Storage::disk('public')->path($inputPath);

        $outputPath = Str::uuid() . '.opus';

        $outputPath = storage_path('app/public/') . $outputPath;

        exec("ffmpeg -i $inputPath -c:a libopus $outputPath");

        $outputData = file_get_contents($outputPath);
        $outputBase64 = base64_encode($outputData);

        // Clean up temporary files
        unlink($inputPath);
        unlink($outputPath);

        return $outputBase64;
    }
}
