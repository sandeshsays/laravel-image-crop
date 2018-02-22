<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

class UploadController extends Controller
{
    public function index(){
        return view('uploads');
    }

    public function store(Request $request){
        // Do upload
        $imageData = $request->get('image-data');
        $info = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imageData));
        $img = Image::make($info);
        $img->save(public_path('/images/1.png'));
        return $img->response();
    }
}
