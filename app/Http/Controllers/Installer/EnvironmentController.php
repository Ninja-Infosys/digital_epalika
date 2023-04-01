<?php

namespace App\Http\Controllers\Installer;

use App\Helper\Installer\EnvironmentManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Installer\UpdateRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class EnvironmentController extends Controller
{
    /**
     * @var EnvironmentManager
     */
    protected EnvironmentManager $environmentManager;

    /**
     * @param EnvironmentManager $environmentManager
     */
    public function __construct(EnvironmentManager $environmentManager)
    {
        parent::__construct();

        $this->environmentManager = $environmentManager;
    }

    /**
     * Display the Environment page.
     *
     * @return Application|Factory|View
     */
    public function environment()
    {
        $envConfig = $this->environmentManager->getEnvContent();

        return view('installer.environment', compact('envConfig'));
    }

    /**
     * @param UpdateRequest $request
     * @return array
     */
    public function save(UpdateRequest $request)
    {

        return $this->environmentManager->saveFile($request);

    }
}
