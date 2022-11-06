<?php

namespace Modules\BusinessRegistration\Enums;

enum TemplateValueEnum: string
{
    case NAME = 'name';
    case CITIZENSHIP_NO = 'citizenship_no';
    case ISSUE_DATE = 'issue_date';
    case ISSUE_DISTRICT_ID = 'issue_district_id';
    case PHONE = 'phone';
    case EMAIL = 'email';
    case PROVINCE_ID = 'province_id';
    case DISTRICT_ID = 'district_id';
    case LOCAL_BODY_ID = 'local_body_id';
    case WARD_NO = 'ward_no';
    case WAY = 'way';
    case TOLE = 'tole';
    case HOUSE_NO = 'house_no';
    case ACCOUNT_NO = 'account_no';
    case NATIONAL_CARD_NO = 'national_card_no';
    case GENDER = 'gender';
    case EDUCATION_QUALIFICATION = 'education_qualification';
    case OCCUPATION = 'occupation';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
     /*   return match ($value) {
            NAME
CITIZENSHIP_NO
ISSUE_DATE
ISSUE_DISTRICT_ID
PHONE
EMAIL
PROVINCE_ID
DISTRICT_ID
LOCAL_BODY_ID
WARD_NO
WAY
TOLE
HOUSE_NO
ACCOUNT_NO
NATIONAL_CARD_NO
GENDER
EDUCATION_QUALIFICATION
OCCUPATION
        };*/
    }
}
