<?php

namespace App\Http\Controllers\Installer;

use App\Http\Controllers\Controller;
use App\Installer\DatabaseManager;
use Exception;
use Illuminate\Database\SQLiteConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Output\BufferedOutput;

class DatabaseController extends Controller
{
    private DatabaseManager $databaseManager;
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }
    public function database()
    {
        $response = $this->databaseManager->migrateAndSeed();

        return redirect(route('installer.final'))->with(['message' => $response]);
    }
}
