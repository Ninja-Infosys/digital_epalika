<?php return [
    'circular' => ['title' => 'दर्ता/चलानी',
        'submenu' => [
            [
                'title' => 'सेटिंग',
                'url' => 'admin.digitalBoard.video.index',
                'active-route' => 'admin.digitalBoard.video.*'
            ],
            [
                'title' => 'सेटिंग',
                'url' => 'admin.digitalBoard.notice.index',
                'active-route' => 'admin.digitalBoard.notice.*'
            ]
        ],
    ],

    'digital-board' => ['title' => 'डिजिटल बोर्ड',
        'permission'=>'board',
        'submenu' => [
            [
                'title' => 'सेटिंग',
                'url' => 'admin.digitalBoard.video.index',
                'active-route' => 'admin.digitalBoard.video.*',
                'permission'=>'digitalBoard'
            ],
            [
                'title' => 'सेटिंग',
                'url' => 'admin.digitalBoard.notice.index',
                'active-route' => 'admin.digitalBoard.notice.*'
            ]
        ],
    ],

    'digital' => ['title' => 'डिजिटल',
        'url' => 'admin.dashboard',
        'submenu' => [
        ],
    ],
];
