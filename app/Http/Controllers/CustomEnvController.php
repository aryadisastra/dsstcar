<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomEnvController extends Controller
{
    public function moveReqImage($imageFile = null, $imageName = null)
    {
        if ($imageFile && $imageName) {
            $path = public_path() . '/img/request';
            $uploadimages = $imageFile->move($path, $imageName);
            if ($uploadimages) {
                return 'success';
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function loadReqImage($image_file)
    {
        return public_path() .  '/img/request/'  . $image_file;
    }
}
