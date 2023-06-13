<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            $request->file('upload')->move(storage_path('app/public/images'), $fileName);
            //$CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/images/'.$fileName); 
            $msg = 'Image successfully uploaded'; 
            //$response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
            //@header('Content-type: text/html; charset=utf-8'); 
            //echo $response;
			return response()->json(['filename' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
