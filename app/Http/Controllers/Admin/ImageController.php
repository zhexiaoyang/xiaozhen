<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use CategoryRepository;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Input;
use itbdw\QiniuStorage\QiniuStorage;

class ImageController extends CommonController
{

    public function store()
    {
        $response = ['status' => 1,'info' => '图片不合法'];
        $file = Input::file('Filedata');
        if($file -> isValid()){
            $disk = QiniuStorage::disk('qiniu');
            $tmp_path = $file->getRealPath();
            $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
            $newName = date("YmdHis").mt_rand(100,999).'.'.$entension;
            $res = $disk->putFile($newName,$tmp_path);
            $url = $disk->downloadUrl($newName);
            if ($url)
            {
                $response = ['status' => 0 ,'info' => '上传成功' ,'data' => ['url' => $url, 'name' => $newName]];
            }
            else
            {
                $response = ['status' => 1,'info' => '上传失败'];
            }
        }
        return response()->json($response);
    }
}
