<?php

namespace Modules\Recommendation\Enums;

enum ApplicationTypeEnum: string
{
    case RELATIONSHIP_PROOF = 'relationship_proof';
    case CITIZENSHIP_RECOMMENDATION = 'citizenship_recommendation';
    case RESTORED_TAX = 'restored_tax';
    case RESIDENTIAL_IDENTIFICATION = 'residential_identification';
    case WEAPON = 'weapon';
    case HOME_LAND_TAX = 'home_land_tax';
    case BIRTH_DATE = 'birth_date';
    case BIRTH_AMENDMENT = 'birth_amendment';
    case BUSINESS_CLOSED = 'business_closed';
    case BUSINESS_OPERATION = 'business_operation';
    case NO_BUSINESS = 'no_business';
    case NEW_BUSINESS = 'new_business';
    case BUSINESS_RENEWAL = 'business_renewal';
    case MARRIED = 'married';
    case UNMARRIED = 'unmarried';
    case HEALTH_TREATMENT_RECOMMENDATION = 'health_treatment_recommendation';
    case BIRTH_CERTIFICATE_PROPERTY_VALUATION = 'birth_certificate_property_valuation';
    case HOUSE_DESTROY = 'house_destroy';
    case PERSONAL_DETAIL_CERTIFICATE_RECOMMENDATION = 'personal_detail_certificate_recommendation';
    case HOUSE_MAP_PLACE_RECOMMENDATION = ' house_map_place_recommendation';
    case SAME_PERSON_CONFIRMATION = 'same_person_confirmation';
    case NAME_BIRTH_RECOMMENDATION = 'name_birth_recommendation';
    case LAND_PAPER_LOST_RECOMMENDATION = 'land_paper_lost_recommendation';
    case KITTA_RECOMMENDATION = 'kitta_recommendation';
    case PROTECTOR_PROVEN = 'protector_proven';
    case PROTECTOR_RECOMMENDATION = 'protector_recommendation';
    case RELATION_PROOF_LIVING = 'relation_proof_living';
    case RELATION_PROOF_BETWEEN_DEATHPERSON_RECOMMENDATION = 'relation_proof_between_deathperson_recommendation';
    case ALIVE_PROOF_RECOMMENDATION = 'alive_proof_recommendation';
    case RIGHT_ONE_PROOF = 'right_one_proof';
    case TRANSFER_RECOMMENDATION = 'transfer_recommendation';
    case LAND_OWNER_RIGHT_RECOMMENDATION = 'land_owner_right_recommendation';
    case ENTERPRISES_PLACECHANGE_RECOMMENDATION = 'enterprises_placechange_recommendation';
    case PRIMARY_SCHOOL_RECOMMENDATION = 'primary_school_recommendation';
    case LAND_VALUATION = 'land_valuation';
    case WAY_HOUSE_PROOF = 'way_house_proof';
    case FORT_DETAIL_PROOF = 'fort_detail_proof';
    case MAINTAIN_HOUSE = 'maintain_house';
    case SCHOOL_CLASSES_ADDING_RECOMMENDATION = 'school_classes_adding_recommendation';
    case DISABLED_RECOMMENDATION = 'disabled_recommendation';
    case FINANCIAL_CONDITION_CERTIFICATE = 'financial_condition_certificate';
    case WEAK_FINANCIAL_CONDITION = 'weak_financial_condition';
    case SCHOOL_AREA_CHANGING_RECOMMENDATION = 'school_area_changing_recommendation';
    case WATER_ELECTRICITY_ADDING_RECOMMENDATION = 'water_electricity_adding_recommendation';
    case CASTE_IDENTIFY_AND_CAST_RECOMMENDATION = 'caste_identify_and_caste_recommendation';
    case PREVAILING_LAW_RECOMMENDATION = 'prevailing_law_recommendation';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::RELATIONSHIP_PROOF => 'नाता प्रमाणित',
            self::CITIZENSHIP_RECOMMENDATION => 'नागरिता सिफारिस',
            self::RESTORED_TAX => 'बहाल करको लेखाजोखा',
            self::RESIDENTIAL_IDENTIFICATION => 'बन्द घर र कोठा खोल्न रोहवरमा बस्ने/बसेको प्रमाणित',
            self::WEAPON => 'मोही लगत कट्टाको सिफारिस',
            self::HOME_LAND_TAX => 'घर जग्गा करको लेखाजोखा सिफारिस',
            self::BIRTH_DATE => 'जन्म मिति प्रमाणित गर्ने',
            self::BIRTH_AMENDMENT => 'जन्म मिति संशोधन सिफारिस',
            self::BUSINESS_CLOSED => 'व्यापार व्यवसाय बन्द भएको सिफारिस',
            self::BUSINESS_OPERATION => 'व्यापार व्यवसाय संचालन नभएको सिफारिस',
            self::NO_BUSINESS => 'व्यापार व्यवसाय नभएको सिफारिस',
            self::NEW_BUSINESS => 'नयाँ व्यवसाय दर्ता सिफारिस',
            self::BUSINESS_RENEWAL => 'व्यवसाय नवीकरण',
            self::MARRIED => 'विवाह प्रमाणित',
            self::UNMARRIED => 'अविवाह प्रमाणित',
            self::HEALTH_TREATMENT_RECOMMENDATION => 'स्वास्थ्य उपचार सिफारिस',
            self::BIRTH_CERTIFICATE_PROPERTY_VALUATION => 'वडाबाट जारी हुने सिफारिस तथा अन्य कागजलाई अंग्रेजी भाषामा समेत सिफारिस तथा प्रमाणित गर्ने',
            self::HOUSE_DESTROY => 'घर पाताल वा भत्के, भत्काएको प्रमाणित',
            self::PERSONAL_DETAIL_CERTIFICATE_RECOMMENDATION => 'व्यत्तिगत विवरण प्रमाणित वा सिफारिस ',
            self::HOUSE_MAP_PLACE_RECOMMENDATION => 'नक्सामा घर कायम गर्ने सिफारिस',
            self::SAME_PERSON_CONFIRMATION => 'कुनै व्यत्तिको नाम थर जन्ममिति तथा वतन फरक फरक भएको भए सो व्यक्ति एउतै हो भन्ने सिफारिस',
            self::NAME_BIRTH_RECOMMENDATION => 'नाम थर, जन्म संसोधनको सिफारिस',
            self::LAND_PAPER_LOST_RECOMMENDATION => 'जग्गा धनी प्रमाणपूर्जा हराएको सिफारिस',
            self::KITTA_RECOMMENDATION => 'कित्ताकाट गर्न सिफारिस',
            self::PROTECTOR_PROVEN => 'संरक्षक प्रमाणित गर्ने',
            self::PROTECTOR_RECOMMENDATION => 'संरक्षक सिफारिस',
            self::RELATION_PROOF_LIVING => 'जीवितसंगको नाता प्रमाणित',
            self::RELATION_PROOF_BETWEEN_DEATHPERSON_RECOMMENDATION => 'मृतकसँगको नाता प्रमाणित तथा सर्जमिन सिफारिस',
            self::ALIVE_PROOF_RECOMMENDATION => 'जिवित रहेको सिफारिस',
            self::RIGHT_ONE_PROOF => 'हकवाला वा हकदार प्रमाणित',
            self::TRANSFER_RECOMMENDATION => 'नामसारी सिफारिस',
            self::LAND_OWNER_RIGHT_RECOMMENDATION => 'जग्गाको हक सम्बन्धमा सिफारिस',
            self::ENTERPRISES_PLACECHANGE_RECOMMENDATION => 'उधोग ठाउँसारी सिफारिस',
            self::PRIMARY_SCHOOL_RECOMMENDATION => 'आधारभूत विधालय खोल्ने सिफारिस',
            self::LAND_VALUATION => 'जग्गा मुल्यांकन/प्रमाणित',
            self::WAY_HOUSE_PROOF => 'घरबाटो प्रमाणित',
            self::FORT_DETAIL_PROOF => 'चारकिल्ला  प्रमाणित',
            self::MAINTAIN_HOUSE => 'पूर्जामा घर कायम गर्ने सिफारिस',
            self::SCHOOL_CLASSES_ADDING_RECOMMENDATION => 'विधालय कक्षा थप सिफारिस',
            self::DISABLED_RECOMMENDATION => 'अशक्त असहाय तथा अनाथको पालन पोषणको लागि सिफारिस',
            self::FINANCIAL_CONDITION_CERTIFICATE => 'आर्थिक अवस्था बलियो वा सम्पन्नता प्रमाणित',
            self::WEAK_FINANCIAL_CONDITION => 'आर्थिक अवस्था कमजोर वा विपन्नता प्रमाणित',
            self::SCHOOL_AREA_CHANGING_RECOMMENDATION => 'विधालय ठाउँसारी सिफारिस',
            self::WATER_ELECTRICITY_ADDING_RECOMMENDATION => 'धारा, विधुत जडान सिफारिस',
            self::CASTE_IDENTIFY_AND_CAST_RECOMMENDATION => 'जातीय पहिचान र जातीय सिफारिस',
            self::PREVAILING_LAW_RECOMMENDATION => 'प्रचलित कानून अनुसार प्रत्यायोजित अधिकार बमोजिमको अन्य सिफारिस वा प्रमाणित गर्ने',
        };
    }
}
