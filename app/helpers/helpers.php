<?php

use Intervention\Image\Facades\Image;

if (!function_exists('setMessage')) {
    /**
     * Set Session message
     *
     * @param string $message
     * @param string $type
     * @return void
     */
    function setMessage(string $message, string $type): void
    {
        session()->flash('message', $message);
        session()->flash('type', $type);
    }

}

function uploadFile($image, $upload_path)
{
    $image_name = time() . str_random() . rand(1, 10000) . '.' . $image->getClientOriginalExtension();
    $image_path = 'public/uploads/' . $upload_path . '/' . $image_name;
    Image::make($image)->save($image_path);

    return $image_name;
}

/**
 * Remove File
 *
 * @param string $file
 * @param string $upload_path
 * @return void
 */
function removeFile($file, $upload_path)
{

    if (!empty($file)) {
        $old_file_path = str_replace('\\', '/', public_path()) . '/uploads/' . $upload_path . '/' . $file;

        if (file_exists($old_file_path)) {
            unlink($old_file_path);
        }

    }

}

function file_url($file, $path)
{
    return asset('uploads/' . $path . '/' . $file);
}

function auth_user_permission($permission)
{
    $auth = auth()->user();

    return $auth->can($permission) || ($auth->email == defaultUser());
}

function defaultUser()
{
    return 'admin@gmail.com';
}

function last_query_start()
{
    \DB::enableQueryLog();
}

function last_query_end()
{
    $query = \DB::getQueryLog();
    dd(end($query));
}
