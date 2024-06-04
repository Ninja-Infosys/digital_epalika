<?php

use App\Enums\OfficeTypeEnum;

return [
    'to_office' => [
        'to' => 'श्रीमान प्रमुख प्रशासकिय अधिकृत ज्यू',
        'office_name' => 'घोराही उप-महानगरपालिका',
        'office' => 'नगर कार्यपालिकाको कार्यालय',
        'office_address' => 'नेपालगन्ज, घोराही',
    ],
    'place' => 'घोराही',
    'office_district' => 'दाङ',
    'place_short_name' => 'घो.',
    'office_type' => OfficeTypeEnum::SUB_METROPOLITAN->label(),
    'office_short_name' => OfficeTypeEnum::SUB_METROPOLITAN->shortName(),
];
