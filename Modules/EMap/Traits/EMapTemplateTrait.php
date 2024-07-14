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

                'कन्सल्टेन्सीको नाम' => '[@consultant_name]',
                'कन्सल्टेन्सीको फोन नं.' => '[@consultant_mobile_no]',
                'कन्सल्टेन्सीको एन.ई.सी. नं' => '[@consultant_nec_no]',
                'कन्सल्टेन्टको ईन्जीन्यरको सहि' => '[@consultant_signature]',

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
                'तल्लाको क्षेत्रफल र उचाईको विवरण' => '[@storeyDetails]',

            ],
        ],
        [
            'title' => 'डिजाइनरको विवरण',
            'data' => [
                'नाम' => '[@designerDetail.name]',
                'फोन नं.' => '[@designerDetail.phone]',
                'बुवाको नाम' => '[@designerDetail.father_name]',
                'प्रदेश' => '[@designerDetail.province]',
                'पालिका' => '[@designerDetail.local_body]',
                'वडा नं.' => '[@designerDetail.ward_no]',
                'टोल.' => '[@designerDetail.tole]',
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
                'प्रदेश' => '[@supervisorDetail.province]',
                'पालिका' => '[@supervisorDetail.local_body]',
                'वडा नं.' => '[@supervisorDetail.ward_no]',
                'टोल.' => '[@supervisorDetail.tole]',
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
                'प्रदेश' => '[@contractorDetail.province]',
                'पालिका' => '[@contractorDetail.local_body]',
                'वडा नं.' => '[@contractorDetail.ward_no]',
                'टोल.' => '[@contractorDetail.tole]',
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
                'निवेदकको प्रदेश' => '[@applicantDetail.province]',
                'निवेदकको जिल्ला' => '[@applicantDetail.district]',
                'निवेदकको पालिका' => '[@applicantDetail.local_body]',
                'निवेदकको वडा नं' => '[@applicantDetail.ward_no]',
                'निवेदकको टोल' => '[@applicantDetail.tole]',
                'निवेदकको सही' => '[@applicantDetail.signature]',
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
        [
            'title' => 'भवन अभिलेखिकरण सम्बन्धि विवरण',
            'data' => [
                'आजको मिति' => '[@today_date]',
                'कार्यालयको नाम' => '[@officeName]',
                'कार्यालयको ठेगाना' => '[@officeAddress]',
                'कार्यालयको प्रदेश' => '[@officeProvince]',
                'कार्यालयको जिल्ला' => '[@officeDistrict]',
                'कार्यालयको पालिका' => '[@officeLocalBody]',
                'कार्यालयको वडा नं' => '[@officeWardNo]',
                'निर्माण कार्यको किसिम' => '[@building_category]',
                'भवन निर्माण भएको वर्ष' => '[@house_built_year]',
                'भवनको कोठा संख्या' => '[@room]',
                'तल्ला संख्या' => '[@current_storey]',
                'भवनको प्लिनथको क्षेत्रफल' => '[@plinth_area]',
                'जग्गाको साविक पालिका' => '[@former_local_body]',
                'जग्गाको साविक वडा नं.' => '[@former_ward_no]',
                'जग्गाको वडा नं.' => '[@land_ward_no]',
                'जग्गाको कित्ता नं.' => '[@plot_no]',
                'जग्गाको क्षेत्रफल' => '[@land_area]',
                'जग्गाको टोल' => '[@land_tole]',

                'कन्सल्टेन्सीको नाम' => '[@consultancy_name]',
                'कन्सल्टेन्टको ईन्जीन्यरको नाम' => '[@consultant_engineer_name]',
                'कन्सल्टेन्टको ईन्जीन्यरको पद' => '[@consultant_engineer_post]',
                'कन्सल्टेन्सीको एन.ई.सी. नं' => '[@n_e_c_registration_no]',

                'निवेदकको नाम' => '[@applicant_name]',
                'निवेदकको फोन नं.' => '[@applicant_phone_no]',
                'निवेदकको पालिका' => '[@local_body]',
                'निवेदकको वडा नं' => '[@applicant_ward_no]',
                'निवेदकको टोल' => '[@applicant_tole]',
                'निवेदकको उमेर' => '[@applicant_age]',
            ],
        ],
        [
            'title' => 'भवन अभिलेखिकरण  विवरण',
            'data' => [
                'ठेकेदारको नाम' => '[@buildingContractorDetail.name]',
                'ठेकेदारको फोन नं.' => '[@buildingContractorDetail.phone]',
                'ठेकेदारको पालिका' => '[@buildingContractorDetail.local_body]',
                'ठेकेदारको वडा नं.' => '[@buildingContractorDetail.ward_no]',
                'ठेकेदारको टोल.' => '[@buildingContractorDetail.tole]',
                'घरधनिको नाम' => '[@buildingHouseOwner.name]',
                'घरधनिको जिल्ला' => '[@buildingHouseOwner.district]',
                'घरधनिको पालिका' => '[@buildingHouseOwner.local_body]',
                'घरधनिको वडा नं' => '[@buildingHouseOwner.ward_no]',
                'घरधनिको टोल' => '[@buildingHouseOwner.tole]',
                'घरधनिको फोटो' => '[@buildingHouseOwner.photo]',
                'जग्गाधनिको नाम' => '[@buildingLandOwner.name]',
                'जग्गाधनिको जिल्ला' => '[@buildingLandOwner.district]',
                'जग्गाधनिको पालिका' => '[buildingLandOwner.local_body]',
                'जग्गाधनिको साबिक वडा नं' => '[@buildingLandOwner.former_ward_no]',
                'जग्गाधनिको वडा नं' => '[@buildingLandOwner.ward_no]',
                'जग्गाधनिको साबिक पालिका' => '[@buildingLandOwner.former_local_body]',
                'जग्गाधनिको न.प्र.प.नं.' => '[@buildingLandOwner.citizenship_no]',
                'जग्गाधनिको टोल' => '[@buildingLandOwner.tole]',

            ],
        ],

        [
            'title' => 'भवन अभिलेखिकरण संधियारको विवरण',
            'data' => [
                'संधियारको विवरण' => '[@buildingNeighbours]',
                'तल्लाको विवरण' => '[@buildingStoreyDetails]',

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
            $this->getBuildingDocumentationReplacement(),


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
            '[@officeName]' => $this->officeName() ?? '',
            '[@officeAddress]' => $this->officeAddress() ?? '',
            '[@officeProvince]' => $this->officeProvince() ?? '',
            '[@officeDistrict]' => $this->officeDistrict() ?? '',
            '[@officeLocalBody]' => $this->officeLocalBody() ?? '',
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
            '[@consultant_name]' => get_nepali_number($this->consultant_name) ?? '',
            '[@consultant_mobile_no]' => get_nepali_number($this->consultant_mobile_no) ?? '',
            '[@consultant_nec_no]' => get_nepali_number($this->consultant_nec_no) ?? '',
            '[@consultant_signature]' => '<img src="'.($this->consultant_signature_url ?? '').'" width="100" height="100" alt="Consultancy Photo">',
        ];
    }

    private function getLandDetailReplacement(): array
    {
        return [
            '[@landDetail.land_use_area.title]' => $this->get_nepali_number($this->landDetail?->landUseArea?->title) ?? '',
            '[@landDetail.ward_no]' => $this->get_nepali_number($this->landDetail?->ward_no) ?? '',
            '[@landDetail.former_ward_no]' => $this->get_nepali_number($this->landDetail?->former_ward_no) ?? '',
            '[@landDetail.tole]' => $this->get_nepali_number($this->landDetail?->tole) ?? '',
            '[@landDetail.street_code_no]' => $this->get_nepali_number($this->landDetail?->street_code_no) ?? '',
            '[@landDetail.plot_no]' => $this->get_nepali_number($this->landDetail?->plot_no) ?? '',
            '[@landDetail.area]' => $this->get_nepali_number($this->landDetail?->unit_value) ?? '',
            '[@landDetail.percentage_of_area_covered_by_building]' => $this->get_nepali_number($this->landDetail?->percentage_of_area_covered_by_building) ?? '',
            '[@landDetail.former_local_body]' => $this->get_nepali_number($this->landDetail?->former_local_body) ?? '',
            '[@landDetail.road_name]' => $this->get_nepali_number($this->landDetail?->road_name) ?? '',
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
            '[@landOwner.local_body]' => $this->get_nepali_number($this->landOwner?->localBody?->local_body) ?? '',
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
            '[@houseOwner.local_body]' => $this->get_nepali_number($this->houseOwner?->localBody?->local_body) ?? '',
            '[@houseOwner.ward_no]' => $this->get_nepali_number($this->houseOwner?->ward_no) ?? '',
            '[@houseOwner.district]' => $this->get_nepali_number($this->houseOwner?->district?->district) ?? '',
            '[@houseOwner.tole]' => $this->get_nepali_number($this->houseOwner?->tole) ?? '',
            '[@houseOwner.photo]' => '<img src="'.($this->houseOwner?->photo_url ?? '').'" width="100" height="100" alt="House Owner Photo">',

        ];
    }

    private function getFourFortsReplacement(): array
    {
        return [
            '[@fourForts]' => (string) View::make('emap::inc.four_forts_table', [
                'fourForts' => $this->fourForts,
            ]),
            '[@nameOfTheFortsAndSanghiars]' => (string) View::make('emap::inc.NameOfTheFortsAndSanghiars', [
                'actualSetBack' => $this->fourForts->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $this->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
            '[@landFourFortsDetail]' => (string) View::make('emap::inc.land_four_forts_detail', [
                'actualSetBack' => $this->fourForts->where('detail', FourSideParticularEnum::ACTUAL_SETBACK)->first(),
                'towards' => $this->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
            '[@sanghiarsName]' => (string) View::make('emap::inc.sanghiarsName', [
                'towards' => $this->fourForts->where('detail', FourSideParticularEnum::TOWARDS)->first(),
            ]),
        ];
    }

    private function getHeightOfStoreyReplacement(): array
    {
        return [
            '[@heightOfEachStorey]' => (string) View::make('emap::inc.height_of_each_storey', [
                'storeyDetails' => $this->storeyDetails,
            ]),
            '[@areaOfEachStorey]' => (string) View::make('emap::inc.area_of_storey', [
                'storeyDetails' => $this->storeyDetails,
            ]),
            '[@storeyDetails]' => (string) View::make('emap::inc.storey_details', [
                'storeyDetails' => $this->storeyDetails,
            ]),
        ];
    }

    private function getDesignerDetailsReplacement(): array
    {
        $designerDetail = $this->designerDetails->where('post', PostsEnum::DESIGNER)->first();

        return [
            '[@designerDetail.name]' => get_nepali_number($this->$designerDetail?->name) ?? '',
            '[@designerDetail.phone]' => get_nepali_number($this->$designerDetail?->name) ?? '',
            '[@designerDetail.father_name]' => get_nepali_number($this->$designerDetail?->father_name) ?? '',
            '[@designerDetail.province]' => get_nepali_number($this->$designerDetail?->province?->province) ?? '',
            '[@designerDetail.local_body]' => get_nepali_number($this->$designerDetail?->localBody?->local_body) ?? '',
            '[@designerDetail.ward_no]' => get_nepali_number($this->$designerDetail?->ward_no) ?? '',
            '[@designerDetail.tole]' => get_nepali_number($this->$designerDetail?->tole) ?? '',
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
            '[@supervisorDetail.phone]' => get_nepali_number($this->$supervisorDetail?->name) ?? '',
            '[@supervisorDetail.father_name]' => get_nepali_number($this->$supervisorDetail?->father_name) ?? '',
            '[@supervisorDetail.local_body]' => get_nepali_number($this->$supervisorDetail?->localBody?->local_body) ?? '',
            '[@supervisorDetail.province]' => get_nepali_number($this->$supervisorDetail?->province?->province) ?? '',
            '[@supervisorDetail.ward_no]' => get_nepali_number($this->$supervisorDetail?->ward_no) ?? '',
            '[@supervisorDetail.tole]' => get_nepali_number($this->$supervisorDetail?->tole) ?? '',
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
            '[@contractorDetail.phone]' => get_nepali_number($this->$contractorDetail?->name) ?? '',
            '[@contractorDetail.father_name]' => get_nepali_number($this->$contractorDetail?->father_name) ?? '',
            '[@contractorDetail.local_body]' => get_nepali_number($this->$contractorDetail?->localBody?->local_body) ?? '',
            '[@contractorDetail.province]' => get_nepali_number($this->$contractorDetail?->province?->province) ?? '',
            '[@contractorDetail.ward_no]' => get_nepali_number($this->$contractorDetail?->ward_no) ?? '',
            '[@contractorDetail.tole]' => get_nepali_number($this->$contractorDetail?->tole) ?? '',
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
            '[@applicantDetail.province]' => $this->get_nepali_number($this->applicantDetail?->province?->province) ?? '',
            '[@applicantDetail.district]' => $this->get_nepali_number($this->applicantDetail?->district?->district) ?? '',
            '[@applicantDetail.local_body]' => $this->get_nepali_number($this->applicantDetail?->localBody?->local_body) ?? '',
            '[@applicantDetail.ward_no]' => $this->get_nepali_number($this->applicantDetail?->ward_no) ?? '',
            '[@applicantDetail.tole]' => $this->get_nepali_number($this->applicantDetail?->tole) ?? '',
            '[@applicantDetail.signature]' => '<img src="'.($this->applicantDetail?->signature_url ?? '').'" width="100" height="100" alt="Applicant Signature">',

        ];
    }

    private function getCriteriaDetailsReplacement(): array
    {
        return [
            '[@criteriaDetails]' => (string) View::make('emap::inc.criteria_details', [
                'criteriaDetails' => $this->criteriaDetails,
            ]),
        ];
    }

    private function getBuildingDetailsReplacement(): array
    {
        return [
            '[@buildingDetails]' => (string) View::make('emap::inc.building_details', [
                'buildingDetails' => $this->buildingDetails,
            ]),
        ];
    }

    public function getEmapTemplates(): mixed
    {
        return Cache::rememberForever('eMapTemplates', function () {
            return EMapTemplate::all();
        });
    }
    private function getBuildingDocumentationReplacement(): array
    {
        return [
            '[@officeName]' => $this->officeName() ?? '',
            '[@officeAddress]' => $this->officeAddress() ?? '',
            '[@officeProvince]' => $this->officeProvince() ?? '',
            '[@officeDistrict]' => $this->officeDistrict() ?? '',
            '[@officeLocalBody]' => $this->officeLocalBody() ?? '',
            '[@officeWardNo]' => $this->officeWardNo() ?? '',
            '[@building_category]' => $this->get_nepali_number(optional($this->building_category)->label()) ?? '',
            '[@house_built_year]' => $this->get_nepali_number(optional($this->house_built_year)->label()) ?? '',
            '[@room]' => $this->get_nepali_number(optional($this->room)->label()) ?? '',
            '[@current_storey]' => $this->get_nepali_number($this->current_storey) ?? '',
            '[@plinth_area]' => $this->get_nepali_number($this->plinth_area->title) ?? '',
            '[@former_local_body]' => $this->get_nepali_number($this->former_local_body) ?? '',
            '[@former_ward_no]' => $this->get_nepali_number($this->former_ward_no) ?? '',
            '[@land_ward_no]' => $this->get_nepali_number($this->land_ward_no) ?? '',
            '[@plot_no]' => $this->get_nepali_number($this->plot_no) ?? '',
            '[@land_area]' => $this->get_nepali_number($this->land_area) ?? '',
            '[@land_tole]' => $this->get_nepali_number($this->land_tole) ?? '',
            '[@consultancy_name]' => get_nepali_number($this->consultancy_name) ?? '',
            '[@consultant_engineer_name]' => get_nepali_number($this->consultant_engineer_name) ?? '',
            '[@consultant_engineer_post]' => get_nepali_number($this->consultant_engineer_post) ?? '',
            '[@n_e_c_registration_no]' => get_nepali_number($this->n_e_c_registration_no) ?? '',

            '[@applicant_name]' => get_nepali_number($this->applicant_name) ?? '',
            '[@applicant_phone_no]' => get_nepali_number($this->applicant_phone_no) ?? '',

            '[@local_body]' => get_nepali_number($this->localBodies?->local_body) ?? '',
            '[@applicant_ward_no]' => get_nepali_number($this->applicant_ward_no) ?? '',
            '[@applicant_tole]' => get_nepali_number($this->applicant_tole) ?? '',
            '[@applicant_age]' => get_nepali_number($this->applicant_age) ?? '',

        ];
    }


    private function getBuildingNeighboursReplacement(): array
    {
        return [
            '[@buildingNeighbours]' => (string) View::make('emap::inc.building_neighbours', [
                'neighbours' => $this->neighbours,
            ])
        ];
    }  private function getBuildingStoreyDetailsReplacement(): array
    {
        return [
            '[@buildingStoreyDetails]' => (string) View::make('emap::inc.building-storey-details', [
                'buildingStoreyDetails' => $this->buildingStoreyDetails,
            ])
        ];
    }
    private function getBuildingContractorDetailsReplacement(): array
    {
        $contractorDetail = $this->contractorDetails->first();

        return [
            '[@contractorDetail.name]' => get_nepali_number($this->$contractorDetail?->name) ?? '',
            '[@contractorDetail.phone]' => get_nepali_number($this->$contractorDetail?->name) ?? '',
            '[@contractorDetail.local_body]' => get_nepali_number($this->$contractorDetail?->localBody?->local_body) ?? '',
            '[@contractorDetail.ward_no]' => get_nepali_number($this->$contractorDetail?->ward_no) ?? '',
            '[@contractorDetail.tole]' => get_nepali_number($this->$contractorDetail?->tole) ?? '',
            ];
    }

    private function getBuildingHouseOwnerReplacement(): array
    {
        return [
            '[@buildingHouseOwner.name]' => $this->get_nepali_number($this->buildingHouseOwner?->name) ?? '',
            '[@buildingHouseOwner.district]' => $this->get_nepali_number($this->buildingHouseOwner?->district?->district) ?? '',
            '[@buildingHouseOwner.local_body]' => $this->get_nepali_number($this->buildingHouseOwner?->localBody?->local_body) ?? '',
            '[@buildingHouseOwner.ward_no]' => $this->get_nepali_number($this->buildingHouseOwner?->ward_no) ?? '',
            '[@buildingHouseOwner.tole]' => $this->get_nepali_number($this->buildingHouseOwner?->tole) ?? '',
            '[@buildingHouseOwner.photo]' => '<img src="'.($this->buildingHouseOwner?->photo_url ?? '').'" width="100" height="100" alt="House Owner Photo">',
        ];
    }


    private function getBuildingLandOwnerReplacement(): array
    {
        return [
            '[@buildingLandOwner.name]' => $this->get_nepali_number($this->buildingLandOwner?->name) ?? '',
            '[@buildingLandOwner.district]' => $this->get_nepali_number($this->buildingLandOwner?->district?->district) ?? '',
            '[@buildingLandOwner.local_body]' => $this->get_nepali_number($this->buildingLandOwner?->local_body) ?? '',
            '[@buildingLandOwner.former_ward_no]' => $this->get_nepali_number($this->buildingLandOwner?->former_ward_no) ?? '',
            '[@buildingLandOwner.ward_no]' => $this->get_nepali_number($this->buildingLandOwner?->ward_no) ?? '',
            '[@buildingLandOwner.former_local_body]' => $this->get_nepali_number($this->buildingLandOwner?->former_local_body) ?? '',
            '[@buildingLandOwner.citizenship_no]' => $this->get_nepali_number($this->buildingLandOwner?->citizenship_no) ?? '',
            '[@buildingLandOwner.tole]' => $this->get_nepali_number($this->buildingLandOwner?->tole) ?? '',
            ];
    }
}
