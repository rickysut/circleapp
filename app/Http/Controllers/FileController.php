<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Dokumen;
class FileController extends Controller
{
      
    
      public function upload(Request $request){
            
            $request->validate([
                'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
            ]);
        
            $fileUpload = new Dokumen;
    
            if($request->file()) {
                $file_name = time().'_'.$request->file->getClientOriginalName();
                $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');
    
                $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
                $fileUpload->filepath = '/storage/' . $file_path;
                $fileUpload->save();
    
                return response()->json(['success'=>'Upload berhasil', 'id' => $fileUpload->id]);
            }
       }
}