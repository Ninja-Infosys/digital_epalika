<?php

namespace Modules\EMap\Enums;

enum NoticeTypeEnum: string
{
    case NOTICE_ISSUED_IN_THE_NAME_OF_SANGHIAR = 'notice issued in the name of sanghiar';
    case FIFTEEN_DAYS_NOTICE_ADJOURNED = '15 days notice adjourned';
    case FIFTEEN_DAY_GRACE_PERIOD_FOR_MAP_PASS = '15 day grace period for map pass';
    case SARZAMIN_MUCHULKA = 'sarzamin muchulka';
    case TECHNICAL_REPORT = 'technical report';
    case AGREEMENT_LETTER_BETWEEN_SUPERVISOR_CONSULTANT_AND_LANDLORD = 'agreement letter (between supervisor/consultant and landlord)';
    case AGREEMENT_LETTER_HOMEOWNER_AND_BUILDER_CONTRACTOR = 'agreement letter (homeowner and builder/contractor)';
    case GRANTING_PERMISSION_FOR_CONSTRUCTION_UP_TO_THE_PLINTH_LEVEL_OF_THE_HOUSE = 'granting permission for construction up to the plinth level of the house';
    case PERMISSION_LETTER_FOR_CONSTRUCTION_WORK_UP_TO_PLINTH_LEVEL = 'permission letter for construction work up to plinth level';
    case REGARDING_FEES_AND_REGISTRATION = 'regarding fees and registration';

    public function label(): string
    {
        return self::getLabel($this);
    }

    public static function getLabel(self $value): string
    {
        return match ($value) {
            self::NOTICE_ISSUED_IN_THE_NAME_OF_SANGHIAR => 'संघियारको नाममा जारी भएको सूचना',
            self::FIFTEEN_DAYS_NOTICE_ADJOURNED => '१५ दिने सूचना टाँस सम्बन्धमा',
            self::FIFTEEN_DAY_GRACE_PERIOD_FOR_MAP_PASS => 'नक्सा पासको लागि १५ दिने टाँस मुचुल्का',
            self::SARZAMIN_MUCHULKA => 'सरजमिन मुचुल्का',
            self::TECHNICAL_REPORT => 'प्राविधिक प्रतिवेदन',
            self::AGREEMENT_LETTER_BETWEEN_SUPERVISOR_CONSULTANT_AND_LANDLORD => 'सम्झौता पत्र (सुपरिवेक्षक/कन्सल्टेन्ट तथा घरधनी बीच)',
            self::AGREEMENT_LETTER_HOMEOWNER_AND_BUILDER_CONTRACTOR => 'सम्झौता पत्र (घरधनी र निर्माणकर्मी/ठेकेदार)',
            self::GRANTING_PERMISSION_FOR_CONSTRUCTION_UP_TO_THE_PLINTH_LEVEL_OF_THE_HOUSE => 'घरको प्लिन्थ लेभल सम्मको निर्माणका निमित्त इजाजत प्रदान गर्ने',
            self::PERMISSION_LETTER_FOR_CONSTRUCTION_WORK_UP_TO_PLINTH_LEVEL => 'प्लिन्थ लेभलसम्म निर्माण कार्यको ईजाजत पत्र',
            self::REGARDING_FEES_AND_REGISTRATION => 'दस्तुर तथा दर्ता सम्बन्धि',
        };
    }
}
