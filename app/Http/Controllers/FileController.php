<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator,Redirect,Response;
Use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class FileController extends Controller
{
    public function index()
    {
        return view('file-upload');
    }

    public function fileStore(Request $request)
    {
       request()->validate([
        'fileName' => 'required',
        'fileName.*' => 'max:2048',
        'fileName.*' => 'mimes:txt,doc,docx,pdf,png,jpeg,jpg,gif'
       ]);
       
       if($request->hasfile('fileName'))
       {
         
         foreach ($request->file('fileName') as $key => $value) 
         {
   
           if ($files = $value) 
           {
               $destinationPath = 'public/files/'; // upload path
               $fileName = date('YmdHis') . "." . $files->getClientOriginalExtension();
               $files->move($destinationPath, $fileName);
               $save[]['file_name'] = "$fileName";
            }
         }

        }

        File::insert($save); // store file into mysql database

        return Redirect::to("file-upload")
        ->withSuccess('Files successfully uploaded.');

    }

    public function search(Request $request)
    {
        $query=$request->input('search_text');
        if($query) {
            $files = File::where('file_name', 'LIKE', '%' . $query . '%')->paginate(5);
        } else {
            $files = File::paginate(5);
        }
        
        return view('searchresult',compact('files'));

    }

     public function deleteFile($id)
    {
        DB::table('files')->where('id', '=', $id)->delete();
        $files = File::paginate(5);
        return view('searchresult',compact('files'));
    }
}
