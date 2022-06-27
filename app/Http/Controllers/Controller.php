<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;

use App\Models\UserGallery;
use App\Models\Audio;
use App\Models\AudioTimeStats;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public static function makeImage($type,$image,$path){

        $data = UserGallery::create([
            'gallery_userid' => Auth::user()->id,
            'gallery_type' => $type,
            'gallery_typestatus' => 'active',
            'gallery_path' => $image->hashName(),
            'gallery_status' => 'active',
         ]);

        $imagefile = $image->hashName();
        // local
        $local_storage = $image->storeAs($path,$imagefile);
        // s3
        $s3_storage = $image->store($path, 's3');

        return $data;

    }

    public static function createImage($type,$image){

        $data = UserGallery::create([
            'gallery_userid' => Auth::user()->id,
            'gallery_type' => $type,
            'gallery_typestatus' => 'active',
            'gallery_path' => $image->hashName(),
            'gallery_status' => 'active',
         ]);

        return $data;

    }

    public static function storeImage($image,$path){

        $imagefile = $image->hashName();
        // local
        $local_storage = $image->storeAs($path,$imagefile);
        // s3
        $s3_storage = $image->store($path, 's3');



    }


    

}
