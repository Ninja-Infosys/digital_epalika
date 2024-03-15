<?php

namespace Modules\EMap\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Modules\EMap\Entities\EMapTemplate;
use Modules\EMap\Enums\FourSideParticularEnum;
use Modules\EMap\Enums\NoticeTypeEnum;
use Modules\EMap\Enums\PostsEnum;

trait EMapTemplateTrait
{
    private array $template = [
        [

            'title' => 'प्रस्तावित भवनको विवरण',
            'data' => [
                'आजको मिति' => '[@today_date]',
                'कार्यालय लेटर हेड' => '[@letterHead]',
                'कार्यालय लेटर हेड (अंग्रेजीमा)' => '[@letterHeadEn]',
                'कार्यालयको नाम' => '[@officeName]',
                'कार्यालयको ठेगाना' => '[@officeAddress]',
                'कार्यालयको प्रदेश' => '[@officeProvince]',
                'कार्यालयको जिल्ला' => '[@officeDistrict]',
                'कार्यालयको पालिका' => '[@officeLocalBody]',
                'कार्यालयको वडा नं' => '[@officeWardNo]',
                'दर्ता नम्बर' => '[@registration_no]',
                'दर्ता मिति' => '[@registration_date]',
                'निर्माण कार्यको किसिम' => '[@construction_type]',
                'प्रयोजन' => '[@usage]',
                'वर्ग' => '[@building_category]',
                'स्ट्रकचर टाईप' => '[@structureType]',
                'हाल निर्माण गर्ने तल्ला संख्या' => '[@current_storey]',
                'भविष्यमा निर्माण गर्ने तल्ला संख्या' => '[@future_storey]',
                'प्लिन्थको क्षेत्रफल' => '[@area_of_plinth]',
                'कुल भवनको लम्बाई' => '[@length]',
                'कुल भवनको चौडाई' => '[@breadth]',
                'भवनको कुल उचाई जमिनको सतहबाट' => '[@height]',
                'तल्लाको क्षेत्रफल र उचाईको विवरण' => '[@storeyDetails]',
            ],
        ],
        [
            'title' => 'जग्गाको विवरण',
            'data' => [
                'भू-उपयोग्य क्षेत्र' => '[@landDetail.land_use_area.title]',
                'वडा नं.' => '[@landDetail.ward_no]',
                'साविक वडा नं.' => '[@landDetail.former_ward_no]',
                'टोलको नाम' => '[@landDetail.tole]',
                'सडक कोड नं.' => '[@landDetail.street_code_no]',
                'जग्गा कित्ता नं.' => '[@landDetail.plot_no]',
                'क्षेत्रफल' => '[@landDetail.area]',
                'भवनले ढाक्ने क्षेत्रफलको प्रतिशत (GCR)' => '[@landDetail.percentage_of_area_covered_by_building]',
                'साविक पालिका' => '[@landDetail.former_local_body]',
                'सडकको नाम' => '[@landDetail.roadName]',
            ],
        ],
        [
            'title' => 'जग्गा धनीको विवरण',
            'data' => [
                'जग्गा धनीको किसिम' => '[@landOwner.land_owner_type]',
                'नाम' => '[@landOwner.name]',
                'फोन नं.' => '[@landOwner.phone]',
                'बुवाको नाम' => '[@landOwner.father_name]',
                'हजुरबुबाको नाम' => '[@landOwner.grandfather_name]',
                'नागरिकता लिएको जिल्ला' => '[@landOwner.citizenship_issue_district]',
                'नागरिकत नम्बर' => '[@landOwner.citizenship_no]',
                'नागरिकता लिएको मिति' => '[@landOwner.citizenship_issue_date]',
                'प्रदेश' => '[@landOwner.province]',
                'जिल्ला' => '[@landOwner.district]',
                'पालिका' => '[@landOwner.local_body]',
                'वडा नं' => '[@landOwner.ward_no]',
                'टोल' => '[@landOwner.tole]',
            ],
        ],
        [
            'title' => 'घर धनीको विवरण',
            'data' => [
                'नाम' => '[@houseOwner.name]',
                'फोन नं.' => '[@houseOwner.phone]',
                'बुवाको नाम' => '[@houseOwner.father_name]',
                'हजुरबुबाको नाम' => '[@houseOwner.grandfather_name]',
                'नागरिकता लिएको जिल्ला' => '[@houseOwner.citizenship_issue_district]',
                'नागरिकत नम्बर' => '[@houseOwner.citizenship_no]',
                'नागरिकता लिएको मिति' => '[@houseOwner.citizenship_issue_date]',
                'प्रदेश' => '[@houseOwner.province]',
                'जिल्ला' => '[@houseOwner.district]',
                'पालिका' => '[@houseOwner.local_body]',
                'वडा नं' => '[@houseOwner.ward_no]',
                'टोल' => '[@houseOwner.tole]',
                'फोटो' => '[@houseOwner.photo]',
            ],
        ],
        [
            'title' => 'चार किल्लाको विवरण',
            'data' => [
                'किल्ला' => '[@fourForts]',
                'जग्गाको चार किल्ला तथा संघियारको नाम ' => '[@nameOfTheFortsAndSanghiars]',
                'निर्माणको निमित्त प्रस्तावित जग्गाको चार किल्लाको विवरण ' => '[@landFourFortsDetail]',
                'संधियारको नाम ' => '[@sanghiarsName]',
            ],
        ],
        [
            'title' => 'तल्लाको विवरण',
            'data' => [
                'प्रत्येक तल्लाको सिलिङ्ङ्को उचाई' => '[@heightOfEachStorey]',
                'floor area' => '[@areaOfEachStorey]',

            ],
        ],
        [
            'title' => 'डिजाइनरको विवरण',
            'data' => [
                'नाम' => '[@designerDetail.name]',
                'फोन नं.' => '[@designerDetail.phone]',
                'बुवाको नाम' => '[@designerDetail.father_name]',
                'ठेगाना' => '[@designerDetail.address]',
                'पालिका' => '[@designerDetail.local_body]',
                'वडा नं.' => '[@designerDetail.ward_no]',
                'NEC Council No.' => '[@designerDetail.nec_council_no]',
                'पालिकाको दर्ता नं.' => '[@designerDetail.local_body_registration_no]',
                'कन्सल्टिंग फर्मबाट भए सो को नाम ' => '[@designerDetail.consulting_firm_name]',
                'जिल्ला ' => '[@designerDetail.district]',
            ],
        ],
        [
            'title' => 'सुपरभाइजर विवरण',
            'data' => [
                'नाम' => '[@supervisorDetail.name]',
                'फोन नं.' => '[@supervisorDetail.phone]',
                'बुवाको नाम' => '[@supervisorDetail.father_name]',
                'ठेगाना' => '[@supervisorDetail.address]',
                'पालिका' => '[@supervisorDetail.local_body]',
                'वडा नं.' => '[@supervisorDetail.ward_no]',
                'NEC Council No.' => '[@supervisorDetail.nec_council_no]',
                'पालिकाको दर्ता नं.' => '[@supervisorDetail.local_body_registration_no]',
                'कन्सल्टिंग फर्मबाट भए सो को नाम ' => '[@supervisorDetail.consulting_firm_name]',
                'जिल्ला ' => '[@supervisorDetail.district]',

            ],
        ],
        [
            'title' => 'ठेकेदारको विवरण',
            'data' => [
                'नाम' => '[@contractorDetail.name]',
                'फोन नं.' => '[@contractorDetail.phone]',
                'बुवाको नाम' => '[@contractorDetail.father_name]',
                'ठेगाना' => '[@contractorDetail.address]',
                'पालिका' => '[@contractorDetail.local_body]',
                'वडा नं.' => '[@contractorDetail.ward_no]',
                'NEC Council No.' => '[@contractorDetail.nec_council_no]',
                'पालिकाको दर्ता नं.' => '[@contractorDetail.local_body_registration_no]',
                'कन्सल्टिंग फर्मबाट भए सो को नाम ' => '[@contractorDetail.consulting_firm_name]',
                'जिल्ला ' => '[@contractorDetail.district]',

            ],
        ],
        [
            'title' => 'निवेदकको विवरण',
            'data' => [
                'निवेदकको प्रकार' => '[@applicantDetail.applicant_type]',
                'घरधनी सँगको सम्बन्ध' => '[@applicantDetail.relation_with_owner]',
                'नाम' => '[@applicantDetail.name]',
                'फोन नं.' => '[@applicantDetail.phone]',
                'बुवाको नाम' => '[@applicantDetail.father_name]',
                'नागरिकता लिएको जिल्ला' => '[@applicantDetail.citizenship_issue_district]',
                'नागरिकत नम्बर' => '[@applicantDetail.citizenship_no]',
                'नागरिकता लिएको मिति' => '[@applicantDetail.citizenship_issue_date]',
                'निवेदकको सहि' => '[@applicantDetail.signature]',
                'निवेदकको प्रदेश' => '[@applicantDetail.province]',
                'निवेदकको जिल्ला' => '[@applicantDetail.district]',
                'निवेदकको पालिका' => '[@applicantDetail.local_body]',
                'निवेदकको वडा नं' => '[@applicantDetail.ward_no]',
                'निवेदकको टोल' => '[@applicantDetail.tole]',
            ],
        ],
        [
            'title' => 'निर्माण हुने भवन तथा मापदण्ड सम्बन्धि संक्षिप्त विवरण',
            'data' => [
                'मापदण्ड सम्बन्धि विवरण' => '[@criteriaDetails]',
            ],
        ],
        [
            'title' => 'भवन सम्बन्धि विवरण',
            'data' => [
                'भवन विवरण' => '[@buildingDetails]',
            ],
        ],
    ];

    public function getTemplateDataAttribute(): Collection
    {
        return $this->getEmapTemplates()->map(function ($applicationTemplate) {
            $data = $this->getData($applicationTemplate->data);

            return [
                'for' => $applicationTemplate->for,
                'data' => $data,
            ];
        });
    }

    public function getSpecificTemplateData(NoticeTypeEnum $noticeTypeEnum): string
    {
        $eMapTemplate = $this->getEmapTemplates();
        $mapTemplate = $eMapTemplate->where('for', $noticeTypeEnum)->where('status', 1)->first();

        if ($mapTemplate) {
            return $this->getData($mapTemplate->data);
        }

        return '';
    }

    public function getTemplateOptions(): array
    {
        return $this->template;
    }

    public function getData($data): string
    {
        $replace = [];

        $replace = array_merge(
            $this->getLetterHeadReplacement(),
            $this->getMapApplyReplacement(),
            $this->getLandDetailReplacement(),
            $this->getLandOwnerReplacement(),
            $this->getHouseOwnerReplacement(),
            $this->getFourFortsReplacement(),
            $this->getHeightOfStoreyReplacement(),
            $this->getApplicantDetailReplacement(),
            $this->getCriteriaDetailsReplacement(),
            $this->getBuildingDetailsReplacement(),
            $this->getDesignerDetailsReplacement(),
            $this->getSupervisorDetailsReplacement(),
            $this->getContractorDetailsReplacement(),
            $replace
        );

        return Str::replace(array_keys($replace), $replace, $data);
    }

    private function getLetterHeadReplacement(): array
    {
        return [

        ];
    }

    private function getMapApplyReplacement(): array
    {
        return [
            '[@letterHead]' => $this->letterHead() ?? '',
            '[@letterHeadEn]' => $this->letterHeadEn() ?? '',
            '[@officeName]' => $this->officeName() ??'',
            '[@officeAddress]' => $this->officeAddress() ??'',
            '[@officeProvince]' => $this->officeProvince() ?? '',
            '[@officeDistrict]' => $this->officeDistrict() ??'',
            '[@officeLocalBody]' => $this->officeLocalBody() ??'',
            '[@officeWardNo]' => $this->officeWardNo() ?? '',
            '[@registration_no]' => $this->get_nepali_number($this->registration_no) ?? '',
            '[@registration_date]' => $this->get_nepali_number($this->registration_date) ?? '',
            '[@construction_type]' => $this->get_nepali_number(optional($this->construction_type)->label()) ?? '',
            '[@usage]' => $this->get_nepali_number(optional($this->usage)->label()) ?? '',
            '[@building_category]' => $this->get_nepali_number(optional($this->building_category)->label()) ?? '',
            '[@structureType]' => $this->get_nepali_number($this->structureType->title) ?? '',
            '[@current_storey]' => $this->get_nepali_number($this->current_storey) ?? '',
            '[@future_storey]' => $this->get_nepali_number($this->future_storey) ?? '',
            '[@area_of_plinth]' => $this->get_nepali_number($this->area_of_plinth) ?? '',
            '[@length]' => $this->get_nepali_number($this->length) ?? '',
            '[@breadth]' => $this->get_nepali_number($this->breadth) ?? '',
            '[@height]' => $this->get_nepali_number($this->height) ?? '',
        ];
    }

    private function getLandDetailReplacement(): array
    {
        return [
            '[@landDetail.land_use_area.title]' => $this->get_nepali_number($this->landDetail?->landUseArea?->title)?? '',
            '[@landDetail.ward_no]' => $this->get_nepali_number($this->landDetail?->ward_no)?? '',
            '[@landDetail.former_ward_no]' => $this->get_nepali_number($this->landDetail?->former_ward_no)?? '',
            '[@landDetail.tole]' => $this->get_nepali_number($this->landDetail?->tole)?? '',
            '[@landDetail.street_code_no]' => $this->get_nepali_number($this->landDetail?->street_code_no)?? '',
            '[@landDetail.plot_no]' => $this->get_nepali_number($this->landDetail?->plot_no)?? '',
            '[@landDetail.area]' => $this->get_nepali_number($this->landDetail?->unit_value)?? '',
            '[@landDetail.percentage_of_area_covered_by_building]' => $this->get_nepali_number($this->landDetail?->percentage_of_area_covered_by_building)?? '',
            '[@landDetail.former_local_body]' => $this->get_nepali_number($this->landDetail?->former_local_body)?? '',
            '[@landDetail.road_name]' => $this->get_nepali_number($this->landDetail?->road_name)?? '',
        ];
    }

    private function getLandOwnerReplacement(): array
    {
        return [
            '[@landOwner.land_owner_type]' => $this->get_nepali_number($this->landOwner?->land_owner_type?->label()) ?? '',
            '[@landOwner.name]' => $this->get_nepali_number($this->landOwner?->name) ?? '',
            '[@landOwner.phone]' => $this->get_nepali_number($this->landOwner?->phone) ?? '',
            '[@landOwner.father_name]' => $this->get_nepali_number($this->landOwner?->father_name) ?? '',
            '[@landOwner.grandfather_name]' => $this->get_nepali_number($this->landOwner?->grandfather_name) ?? '',
            '[@landOwner.citizenship_issue_district]' => $this->get_nepali_number($this->landOwner?->citizenshipIssueDistrict?->district) ?? '',
            '[@landOwner.citizenship_no]' => $this->get_nepali_number($this->landOwner?->citizenship_no) ?? '',
            '[@landOwner.citizenship_issue_date]' => $this->get_nepali_number($this->landOwner?->citizenship_issue_date) ?? '',
            '[@landOwner.address]' => $this->get_nepali_number($this->landOwner?->address) ?? '',
            '[@landOwner.local_body]' => $this->get_nepali_number($this->landOwner?->local_body) ?? '',
            '[@landOwner.ward_no]' => $this->get_nepali_number($this->landOwner?->ward_no) ?? '',
            '[@landOwner.district]' => $this->get_nepali_number($this->landOwner?->district?->district) ?? '',
            '[@landOwner.tole]' => $this->get_nepali_number($this->landOwner?->tole) ?? '',
        ];
    }

    private function getHouseOwnerReplacement(): array
    {
        return [
            '[@houseOwner.name]' => $this->get_nepali_number($this->houseOwner?->name) ?? '',
            '[@houseOwner.phone]' => $this->get_nepali_number($this->houseOwner?->phone) ?? '',
            '[@houseOwner.father_name]' => $this->get_nepali_number($this->houseOwner?->father_name) ?? '',
            '[@houseOwner.grandfather_name]' => $this->get_nepali_number($this->houseOwner?->grandfather_name) ?? '',
            '[@houseOwner.citizenship_issue_district]' => $this->get_nepali_number($this->houseOwner?->citizenshipIssueDistrict?->district) ?? '',
            '[@houseOwner.citizenship_no]' => $this->get_nepali_number($this->houseOwner?->citizenship_no) ?? '',
            '[@houseOwner.citizenship_issue_date]' => $this->get_nepali_number($this->houseOwner?->citizenship_issue_date) ?? '',
            '[@houseOwner.address]' => $this->get_nepali_number($this->houseOwner?->address) ?? '',
            '[@houseOwner.local_body]' => $this->get_nepali_number($this->houseOwner?->local_body) ?? '',
            '[@houseOwner.ward_no]' => $this->get_nepali_number($this->houseOwner?->ward_no) ?? '',
            '[@houseOwner.district]' => $this->get_nepali_number($this->houseOwner?->district?->district) ?? '',
            '[@houseOwner.tole]' => $this->get_nepali_number($this->houseOwner?->tole) ?? '',
            '[@houseOwner.photo]' => '<img src="' . ($this->houseOwner?->photo_url) . '" alt="House Owner Photo">' ?? '',
        ];
    }

    private function getFourFortsReplacement(): array
    {
        return [
            '[@fourForts]' => (string)View::make('emap::inc.four_forts_table', [
                'fourForts' => $this->fourForts,
            ]),
            '[@nameOfTheFortsAndSanghiars]' => (string)View::make('emap::inc.NameOfTheFortsAndSanghiars', [
                'actualSetBack' => $this->fourForts->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $this->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
            '[@landFourFortsDetail]' => (string)View::make('emap::inc.land_four_forts_detail', [
                'actualSetBack' => $this->fourForts->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $this->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
            '[@sanghiarsName]' => (string)View::make('emap::inc.sanghiarsName', [
                'towards' => $this->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
        ];
    }
    private function getHeightOfStoreyReplacement(): array
    {
        return [
            '[@heightOfEachStorey]' => (string)View::make('emap::inc.height_of_each_storey', [
                'storeyDetails' => $this->storeyDetails,
            ]),
            '[@areaOfEachStorey]' => (string)View::make('emap::inc.area_of_storey', [
                'storeyDetails' => $this->storeyDetails,
            ]),
        ];
    }

    private function getDesignerDetailsReplacement(): array
    {
        $designerDetail = $this->designerDetails->where('post', PostsEnum::DESIGNER)->first();

        return [
            '[@designerDetail.name]' => get_nepali_number($this->$designerDetail?->name) ?? '',
            '[@designerDetail.father_name]' => get_nepali_number($this->$designerDetail?->father_name) ?? '',
            '[@designerDetail.phone]' => get_nepali_number($this->$designerDetail?->name) ?? '',
            '[@designerDetail.address]' => get_nepali_number($this->$designerDetail?->address) ?? '',
            '[@designerDetail.local_body]' => get_nepali_number($this->$designerDetail?->local_body) ?? '',
            '[@designerDetail.ward_no]' => get_nepali_number($this->$designerDetail?->ward_no) ?? '',
            '[@designerDetail.nec_council_no]' => get_nepali_number($this->$designerDetail?->nec_council_no) ?? '',
            '[@designerDetail.local_body_registration_no]' => get_nepali_number($this->$designerDetail?->local_body_registration_no) ?? '',
            '[@designerDetail.consulting_firm_name]' => get_nepali_number($this->$designerDetail?->consulting_firm_name) ?? '',
            '[@designerDetail.district]' => get_nepali_number($this->$designerDetail?->district?->district) ?? '',
        ];
    }

    private function getSupervisorDetailsReplacement(): array
    {
        $supervisorDetail = $this->designerDetails->where('post', PostsEnum::SUPERVISOR)->first();

        return [
            '[@supervisorDetail.name]' => get_nepali_number($this->$supervisorDetail?->name) ?? '',
            '[@supervisorDetail.father_name]' => get_nepali_number($this->$supervisorDetail?->father_name) ?? '',
            '[@supervisorDetail.phone]' => get_nepali_number($this->$supervisorDetail?->name) ?? '',
            '[@supervisorDetail.address]' => get_nepali_number($this->$supervisorDetail?->address) ?? '',
            '[@supervisorDetail.local_body]' => get_nepali_number($this->$supervisorDetail?->local_body) ?? '',
            '[@supervisorDetail.ward_no]' => get_nepali_number($this->$supervisorDetail?->ward_no) ?? '',
            '[@supervisorDetail.nec_council_no]' => get_nepali_number($this->$supervisorDetail?->nec_council_no) ?? '',
            '[@supervisorDetail.local_body_registration_no]' => get_nepali_number($this->$supervisorDetail?->local_body_registration_no) ?? '',
            '[@supervisorDetail.consulting_firm_name]' => get_nepali_number($this->$supervisorDetail?->consulting_firm_name) ?? '',
            '[@supervisorDetail.district]' => get_nepali_number($this->$supervisorDetail?->district?->district) ?? '',
        ];
    }

    private function getContractorDetailsReplacement(): array
    {
        $contractorDetail = $this->designerDetails->where('post', PostsEnum::CONTRACTOR)->first();

        return [
            '[@contractorDetail.name]' => get_nepali_number($this->$contractorDetail?->name) ?? '',
            '[@contractorDetail.father_name]' => get_nepali_number($this->$contractorDetail?->father_name) ?? '',
            '[@contractorDetail.phone]' => get_nepali_number($this->$contractorDetail?->name) ?? '',
            '[@contractorDetail.address]' => get_nepali_number($this->$contractorDetail?->address) ?? '',
            '[@contractorDetail.local_body]' => get_nepali_number($this->$contractorDetail?->local_body) ?? '',
            '[@contractorDetail.ward_no]' => get_nepali_number($this->$contractorDetail?->ward_no) ?? '',
            '[@contractorDetail.nec_council_no]' => get_nepali_number($this->$contractorDetail?->nec_council_no) ?? '',
            '[@contractorDetail.local_body_registration_no]' => get_nepali_number($this->$contractorDetail?->local_body_registration_no) ?? '',
            '[@contractorDetail.consulting_firm_name]' => get_nepali_number($this->$contractorDetail?->consulting_firm_name) ?? '',
            '[@contractorDetail.district]' => get_nepali_number($this->$contractorDetail?->district?->district) ?? '',
        ];
    }

    private function getApplicantDetailReplacement(): array
    {
        return [
            '[@applicantDetail.applicant_type]' => $this->get_nepali_number($this->applicantDetail?->applicant_type->label()) ?? '',
            '[@applicantDetail.relation_with_owner]' => $this->get_nepali_number($this->applicantDetail?->relation_with_owner?->label()) ?? '',
            '[@applicantDetail.name]' => $this->get_nepali_number($this->applicantDetail?->name) ?? '',
            '[@applicantDetail.phone]' => $this->get_nepali_number($this->applicantDetail?->phone) ?? '',
            '[@applicantDetail.father_name]' => $this->get_nepali_number($this->applicantDetail?->father_name) ?? '',
            '[@applicantDetail.citizenship_issue_district]' => $this->get_nepali_number($this->applicantDetail?->citizenshipIssueDistrict?->district) ?? '',
            '[@applicantDetail.citizenship_no]' => $this->get_nepali_number($this->applicantDetail?->citizenship_no) ?? '',
            '[@applicantDetail.citizenship_issue_date]' => $this->get_nepali_number($this->applicantDetail?->citizenship_issue_date) ?? '',
            '[@applicantDetail.signature]' => $this->get_nepali_number($this->applicantDetail?->signature) ?? '',
            '[@applicantDetail.province]' => $this->get_nepali_number($this->applicantDetail?->province?->province) ?? '',
            '[@applicantDetail.district]' => $this->get_nepali_number($this->applicantDetail?->district?->district) ?? '',
            '[@applicantDetail.local_body]' => $this->get_nepali_number($this->applicantDetail?->localBody?->local_body) ?? '',
            '[@applicantDetail.ward_no]' => $this->get_nepali_number($this->applicantDetail?->ward_no) ?? '',
            '[@applicantDetail.tole]' => $this->get_nepali_number($this->applicantDetail?->tole) ?? '',
        ];
    }

    private function getCriteriaDetailsReplacement(): array
    {
        return [
            '[@criteriaDetails]' => (string)View::make('emap::inc.criteria_details', [
                'criteriaDetails' => $this->criteriaDetails,
            ]),
        ];
    }

    private function getBuildingDetailsReplacement(): array
    {
        return [
            '[@buildingDetails]' => (string)View::make('emap::inc.building_details', [
                'buildingDetails' => $this->buildingDetails,
            ]),
        ];
    }

    /**
     * @return mixed
     */
    public function getEmapTemplates(): mixed
    {
        return Cache::rememberForever('eMapTemplates', function () {
            return EMapTemplate::all();
        });
    }
}
