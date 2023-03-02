<?php

namespace Modules\Grant\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Grant\Entities\Cooperative;
use Modules\Grant\Entities\Enterprise;
use Modules\Grant\Entities\Farmer;
use Modules\Grant\Entities\Grant;
use Modules\Grant\Entities\GrantDetail;
use Modules\Grant\Entities\Group;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{

//    protected Collection $cooperatives ;

    public function __construct()
    {
        parent::__construct();

        $this->cooperatives = Cooperative::first();
    }

    public function __invoke()
    {
        $farmers_count = Farmer::count();
        $cooperative_count = Cooperative::count();
        $groups_count = Group::count();
        $enterprise_count = Enterprise::count();
        $grant_detail_count = GrantDetail::count();

//        dd($this->getGrantData());
        if (request()->ajax()) {
            return [
                'cooperativeWise' => $this->getCooperativeData(),
                'grant'=>$this->getGrantData()
            ];
        }
        return view('grant::admin.dashboard', compact('grant_detail_count', 'enterprise_count', 'farmers_count', 'cooperative_count', 'groups_count'));

    }

    public function getCooperativeData()
    {
        $cooperatives = Cooperative::with('farmers')
            ->withCount('farmers')->get()
            ->map(function ($cooperative) {
                return [
                    'name' => $cooperative->name,
                    'total' => $cooperative->farmers_count
                ];
            });

        return [
            'labels' => $cooperatives->pluck('name')->toArray(),
            'dataSets' => [
                [
                    'data' => $cooperatives->pluck('total')->toArray(),
                    'label' => 'जम्मा',
                ],
            ],
        ];
    }

    public function getGrantData()
    {
        $grants = Grant::with('grantDetails','grantType')->where(function ($q) {
            $q->where('fiscal_year_id', officeSetting()->fiscal_year_id);
            })
            ->withCount('grantDetails')->get()
            ->map(function ($grant) {
                return [
                    'name' => $grant->grantType->title,
                    'total' => $grant->grant_details_count
                ];
            });

        return [
            'labels' => $grants->pluck('name')->toArray(),
            'dataSets' => [
                [
                    'data' => $grants->pluck('total')->toArray(),
                    'label' => 'जम्मा',
                ],
            ],
        ];
    }


}
