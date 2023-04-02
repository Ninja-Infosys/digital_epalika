<?php

namespace App\Http\Controllers\Installer;

use App\Helper\Installer\DatabaseManager;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{

    private DatabaseManager $databaseManager;


    public function __construct(DatabaseManager $databaseManager)
    {
        parent::__construct();
        $this->databaseManager = $databaseManager;
    }


    public function database()
    {
        // Sometimes migration file and seed files may take more then 30 seconds so we are going to set it 0 that indicates
        // that there is no time limit for execution.

        set_time_limit(0);
        $response = $this->databaseManager->migrateAndSeed();

        return redirect()->route('installer.final')
            ->with(['message' => $response]);
    }
}
