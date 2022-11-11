<?php

namespace Modules\EMap\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\EMap\Entities\EMapTemplate;
use Modules\EMap\Enums\NoticeTypeEnum;

trait EMapTemplateTrait
{
    private array $template = [
        [
            'title' => 'प्रस्तावित भवनको विवरण',
            'data' => [
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
                'भू-उपयोग्य क्षेत्र' => '[@landDetail.land_use_area]',
                'वडा नं.' => '[@landDetail.ward_no]',
                'साविक वडा नं.' => '[@landDetail.former_ward_no]',
                'टोलको नाम' => '[@landDetail.tole]',
                'सडक कोड नं.' => '[@landDetail.street_code_no]',
                'जग्गा कित्ता नं.' => '[@landDetail.plot_no]',
                'क्षेत्रफल' => '[@landDetail.area]',
                'भवनले ढाक्ने क्षेत्रफलको प्रतिशत (GCR)' => '[@landDetail.percentage_of_area_covered_by_building]',
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
                'ठेगाना' => '[@landOwner.address]',
                'पालिका' => '[@landOwner.local_body]',
                'वडा नं' => '[@landOwner.ward_no]',
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
                'ठेगाना' => '[@houseOwner.address]',
                'पालिका' => '[@houseOwner.local_body]',
                'वडा नं' => '[@houseOwner.ward_no]',
            ],
        ],
        [
            'title' => 'चार किल्लाको विवरण',
            'data' => [
                'किल्ला' => '[@fourForts]',
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
                'निवेदकको सहि' => '[@applicantDetail.applicant_signature_url]',
            ],
        ],
    ];


    public function getTemplateDataAttribute(): Collection
    {
        return EMapTemplate::get()->map(function ($applicationTemplate) {
            $data = $this->getData($applicationTemplate->data);
            return [
                'for' => $applicationTemplate->for,
                'data' => $data
            ];
        });
    }

    public function getSpecificTemplateData(NoticeTypeEnum $noticeTypeEnum): string
    {

        $mapTemplate = EMapTemplate::where('for', $noticeTypeEnum->value)->first();

        if ($mapTemplate){
            return $this->getData($mapTemplate->data);
        }
        return '';
    }

    public function getTemplateOptions(): array
    {
        return $this->template;
    }

    private function getData($data): string
    {
        $replace = [];

        $replace = array_merge($this->getMapApplyReplacement(), $replace);
        return Str::replace(array_keys($replace), $replace, $data);
    }

    private function getMapApplyReplacement(): array
    {
        return [
            '[@registration_no]' => $this->registration_no ?? '',
            '[@registration_date]' => $this->registration_date ?? '',
            '[@construction_type]' => $this->construction_type?->label() ?? '',
            '[@usage]' => $this->usage?->label() ?? '',
            '[@building_category]' => $this->building_category?->label() ?? '',
            '[@structureType]' => $this->structureType->title ?? '',
            '[@current_storey]' => $this->current_storey ?? '',
            '[@future_storey]' => $this->future_storey ?? '',
            '[@area_of_plinth]' => $this->area_of_plinth ?? '',
            '[@length]' => $this->length ?? '',
            '[@breadth]' => $this->breadth ?? '',
            '[@height]' => $this->height ?? ''
        ];
    }
}
