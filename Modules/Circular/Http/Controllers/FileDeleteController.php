<?php

namespace Modules\Circular\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Circular\Entities\CircularDocument;

class FileDeleteController extends Controller
{
    public function fileDelete($id)
    {
       $file = CircularDocument::find($id);
       if($file->file)
       {
           $this->deleteFile($file->file);
       }
       $file->delete();
       toast('File deleted successfully','success');
       return back();
   }
}
