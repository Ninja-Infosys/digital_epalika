<?php

namespace App\Http\Controllers\Admin;

use App\Models\File;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function destroy(File $file)
    {
       if($file->file)
       {
           $this->deleteFile($file->file);
       }
       toast('फाइल सफलतापूर्वक मेटियो','success');
       $file->delete();
       return back();
    }
}
