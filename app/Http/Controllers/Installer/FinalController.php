<?php

namespace App\Http\Controllers\Installer;

use App\Helper\Installer\InstalledFileManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinalController extends Controller
{
    public function __invoke(InstalledFileManager $fileManager)
    {
        $fileManager->update();

        return view('installer.finished');
    }
}
