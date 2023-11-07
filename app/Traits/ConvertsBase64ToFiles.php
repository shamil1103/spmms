<?php

namespace App\Traits;

use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

trait ConvertsBase64ToFiles
{
    /**
     * Convert base64 content to file
     *
     * @param $base64Content
     * @return UploadedFile|null
     */
    public function convertBase64ToFile($base64Content): ?UploadedFile
    {
        if (!$base64Content) {
            return null;
        }

        // Get file data base64 string
        $fileData = base64_decode(Arr::last(explode(',', $base64Content)));

        // Create temp file and get its absolute path
        $tempFile     = tmpfile();
        $tempFilePath = stream_get_meta_data($tempFile)['uri'];

        // Save file data in file
        file_put_contents($tempFilePath, $fileData);

        $tempFileObject = new File($tempFilePath);

        $file = new UploadedFile(
            $tempFileObject->getPathname(),
            $tempFileObject->getFilename(),
            $tempFileObject->getMimeType(),
            UPLOAD_ERR_OK,
            true // Mark it as test, since the file isn't from real HTTP POST.
        );

        // Close this file after response is sent.
        // Closing the file will cause to remove it from temp director!
        app()->terminating(function () use ($tempFile) {
            fclose($tempFile);
        });

        // return UploadedFile object
        return $file;
    }
}
