<?php

namespace Modules\BusinessRegistration\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Traits\NepaliDateConverter;
use Modules\BusinessRegistration\Entities\BusinessDetail;
use Modules\BusinessRegistration\Entities\Forum;
use Modules\BusinessRegistration\Entities\Industry;
use Modules\BusinessRegistration\Entities\OrganizationRegistration;
use Modules\BusinessRegistration\Entities\ProprietorDetail;

class FrontendController extends Controller
{
    use NepaliDateConverter;
    public function business()
    {
        return view('businessregistration::frontend.index');
    }
    public function organizationRegistration()
    {
        return view('businessregistration::frontend.register.register');
    }

    public function industryRegistration()
    {
        return view('businessregistration::frontend.industry.index');
    }
    public function forumRegistration()
    {
        return view('businessregistration::frontend.forum.index');
    }

    public function printDetail(BusinessDetail $businessDetail)
    {
        $businessDetail->load(
            ['partners' => function ($query) {
                $query->with('issueDistrict', 'district', 'localBody', 'province');
            }, 'businessNature', 'registeredBusinesses', 'province', 'district', 'localBody']
        );
        $todayDateInBS = $this->get_today_nepali_date();

        return view('businessregistration::frontend.printDetail', compact('businessDetail','todayDateInBS'));
    }

    public function print(OrganizationRegistration $organizationRegistration)
    {
        $organizationRegistration->load(
            ['committeeNames' => function ($query) {
                $query->with('issueDistrict', 'district', 'localBody', 'province');
            }]
        );
        $todayDateInBS = $this->get_today_nepali_date();

        return view('businessregistration::frontend.register.print', compact('organizationRegistration','todayDateInBS'));
    }

    public function printIndustry(Industry $industry)
    {
        $industry->load(
            ['committeeNames' => function ($query) {
                $query->with('issueDistrict', 'district', 'localBody', 'province');
            }]
        );
        $todayDateInBS = $this->get_today_nepali_date();

        return view('businessregistration::frontend.industry.print', compact('industry','todayDateInBS'));
    }
    public function printForum(Forum $forum)
    {
        $forum->load(
            ['partners' => function ($query) {
                $query->with('issueDistrict', 'district', 'localBody', 'province');
            }]
        );
        $todayDateInBS = $this->get_today_nepali_date();

        return view('businessregistration::frontend.forum.print', compact('forum','todayDateInBS'));
    }

    public function printPdf(ProprietorDetail $proprietorDetail)
    {
        $proprietorDetail->load(
            'province',
            'district',
            'localBody',
            'threeGenerationDetails',
            'introboard',
            'businessDetail.province',
            'businessDetail.district',
            'businessDetail.localBody',
            'businessRegisteredFile',
            'businessDetail.partnerDetails',
            'businessDetail.registeredBusinesses'
        );

        return view('businessregistration::frontend.print', compact('proprietorDetail'));
    }
}
