<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\UserGallery;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;




    public function makeImage($type,$image,$path){

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
}
