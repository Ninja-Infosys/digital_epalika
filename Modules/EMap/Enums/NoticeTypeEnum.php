<?php

namespace Modules\EMap\Enums;

enum NoticeTypeEnum: string
{

    //application
    case MAP_ACCEPTANCE = 'map acceptance';
    case TECHNICIAN_APPROVAL = 'technician approval';
    case ENGINEER_APPROVAL = 'engineer approval';
    case MAP_PASS_FOR_BUILDING = 'map pass for building';
    //notice enums
    case NOTICE_ISSUED_IN_THE_NAME_OF_SANGHIAR = 'notice issued in the name of sanghiar';
    case FIFTEEN_DAYS_NOTICE_ADJOURNED = '15 days notice adjourned';
    //bond enums
    case FIFTEEN_DAY_GRACE_PERIOD_FOR_MAP_PASS = '15 day grace period for map pass';
    case SARZAMIN_MUCHULKA = 'sarzamin muchulka';
    //report enums

    case TECHNICAL_REPORT = 'technical report';
    case CONSTRUCTION_SUPERVISION_REPORT_UP_TO_PLINTH_LEVEL = 'construction supervision report up to plinth level';
    case THE_TECHNICIAN_WHO_COMPLETED_THE_FIRST_PHASE_OF_WORK_REPORT = 'the technician who completed the first phase of work report';
    case CONSULTANTS_REPORT_ON_COMPLETION_OF_FIRST_PHASE= 'consultants Report on Completion of First Phase';
   //certificate enums
    case PERMISSION_LETTER_FOR_CONSTRUCTION_WORK_UP_TO_PLINTH_LEVEL = 'permission letter for construction work up to plinth level';
    //agreement enums
    case AGREEMENT_LETTER_BETWEEN_SUPERVISOR_CONSULTANT_AND_LANDLORD = 'agreement letter (between supervisor/consultant and landlord)';
    case AGREEMENT_LETTER_HOMEOWNER_AND_BUILDER_CONTRACTOR = 'agreement letter (homeowner and builder/contractor)';
    //order
    case GRANTING_PERMISSION_FOR_CONSTRUCTION_UP_TO_THE_PLINTH_LEVEL_OF_THE_HOUSE = 'granting permission for construction up to the plinth level of the house';

    case REGARDING_FEES_AND_REGISTRATION = 'regarding fees and registration';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {

            //application enums
            self::MAP_ACCEPTANCE => 'भवन निर्माण सहिता अनुसार नक्शा / डिजाईनको लागि दरखास्त फाराम',
            self::TECHNICIAN_APPROVAL => 'नक्सा बनाउने प्राविधिकद्वारा मन्जुरी पत्र',
            self::ENGINEER_APPROVAL => 'भवन डिजाईन गर्ने प्राविधिकद्वारा मन्जुरी पत्र',
            self::MAP_PASS_FOR_BUILDING => 'भवन निर्माणको लागि नक्सापास सम्बन्धमा',
            //notice enums
            self::NOTICE_ISSUED_IN_THE_NAME_OF_SANGHIAR => 'संघियारको नाममा जारी भएको सूचना',
            self::FIFTEEN_DAYS_NOTICE_ADJOURNED => '१५ दिने सूचना टाँस सम्बन्धमा',
            //bond enums
            self::FIFTEEN_DAY_GRACE_PERIOD_FOR_MAP_PASS => 'नक्सा पासको लागि १५ दिने टाँस मुचुल्का',
            self::SARZAMIN_MUCHULKA => 'सरजमिन मुचुल्का',
            //report enums

            self::TECHNICAL_REPORT => 'प्राविधिक प्रतिवेदन',
            self::CONSTRUCTION_SUPERVISION_REPORT_UP_TO_PLINTH_LEVEL => 'प्लिन्थ लेभलसम्मको निर्माणको सुपरिवेक्षण प्रतिवेदन',
            self::THE_TECHNICIAN_WHO_COMPLETED_THE_FIRST_PHASE_OF_WORK_REPORT => 'प्रथम चरणको कार्य सम्पन्नको प्राबिधिकको प्रतिबेदन',
            self::CONSULTANTS_REPORT_ON_COMPLETION_OF_FIRST_PHASE => 'प्रथम चरणको कार्य सम्पन्नको परामर्शदाताको प्रतिबेदन',
            //agreement
            self::AGREEMENT_LETTER_BETWEEN_SUPERVISOR_CONSULTANT_AND_LANDLORD => 'सम्झौता पत्र (सुपरिवेक्षक/कन्सल्टेन्ट तथा घरधनी बीच)',
            self::AGREEMENT_LETTER_HOMEOWNER_AND_BUILDER_CONTRACTOR => 'सम्झौता पत्र (घरधनी र निर्माणकर्मी/ठेकेदार)',

            //order
            self::GRANTING_PERMISSION_FOR_CONSTRUCTION_UP_TO_THE_PLINTH_LEVEL_OF_THE_HOUSE => 'घरको प्लिन्थ लेभल सम्मको निर्माणका निमित्त इजाजत प्रदान गर्ने',
            //    certificate enums
            self::PERMISSION_LETTER_FOR_CONSTRUCTION_WORK_UP_TO_PLINTH_LEVEL => 'प्लिन्थ लेभलसम्म निर्माण कार्यको ईजाजत पत्र',
            self::REGARDING_FEES_AND_REGISTRATION => 'दस्तुर तथा दर्ता सम्बन्धि',
        };
    }
}
