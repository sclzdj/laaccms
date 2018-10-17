<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function make(Request $request){
        $url=$this->move($request->file('file'));
        return ['file' => $url, 'code' => 0];
    }
    public function simditor(Request $request){
        $url=$this->move($request->file('file'));
        return [
            "success"   => true,
            "msg"       => "上传成功",
            "file_path" => $url
        ];
    }
    protected function move($file){
        $filename = str_random(64) . '.' . $file->getClientOriginalExtension();
        $dir="uploads/".date('Ym/d');
        $file->move($dir,$filename);
        return url($dir.'/'.$filename);
    }
}
