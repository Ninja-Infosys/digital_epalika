<?php

namespace App\Http\Controllers\Installer;

use App\Helper\Installer\RequirementsChecker;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RequirementsController extends Controller
{
    /**
     * @var RequirementsChecker
     */
    protected RequirementsChecker $requirements;

    /**
     * @param RequirementsChecker $checker
     */
    public function __construct(RequirementsChecker $checker)
    {
        parent::__construct();
        $this->requirements = $checker;
    }

    /**
     * Display the requirements page.
     *
     * @return Application|Factory|View
     */
    public function requirements()
    {
        $phpSupportInfo = $this->requirements->checkPhpVersion(
            config('installer.core.minPhpVersion')
        );

        $requirements = $this->requirements->check(
            config('installer.requirements')
        );

        return view('installer.requirements', compact('requirements', 'phpSupportInfo'));
    }
}
