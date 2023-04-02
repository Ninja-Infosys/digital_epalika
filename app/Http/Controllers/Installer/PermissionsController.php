<?php

namespace App\Http\Controllers\Installer;

use App\Helper\Installer\PermissionsChecker;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * @var PermissionsChecker
     */
    protected PermissionsChecker $permissions;

    /**
     * @param PermissionsChecker $checker
     */
    public function __construct(PermissionsChecker $checker)
    {
        parent::__construct();
        $this->permissions = $checker;
    }


    public function permissions()
    {
        $permissions = $this->permissions->check(
            config('installer.permissions')
        );

        return view('installer.permissions', compact('permissions'));
    }
}
