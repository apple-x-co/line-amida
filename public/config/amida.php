<?php

return [
    [
        'id' => 'node-a',
        //'class' => '\Amida\Node',
        'content' => [
            //'class' => '\Amida\ContentText',
            'type' => 'text',
            'text' => 'aaa',
        ],
        'branches' => [
            [
                //'class' => '\Amida\Branch',
                'id' => 'node-b1',
                'triggers' => [
                    [
                        //'class' => '\Amida\ContentText',
                        'type' => 'text',
                        'text' => 'b1'
                    ]
                ]
            ],
            [
                'id' => 'node-b2',
                'triggers' => [
                    [
                        //'class' => '\Amida\ContentText',
                        'type' => 'text',
                        'text' => 'b2'
                    ]
                ]
            ]
        ]
    ],
    [
        'id' => 'node-b1',
        'content' => [
            'type' => 'text',
            'text' => 'bbb1'
        ],
        'branches' => [
            [
                'id' => 'node-c1',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => 'c1'
                    ]
                ]
            ],
            [
                'id' => 'node-c2',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => 'c2'
                    ]
                ]
            ]
        ]
    ],
    [
        'id' => 'node-b2',
        'content' => [
            'type' => 'text',
            'text' => 'bbb2'
        ],
        'branches' => [
            [
                'id' => 'node-c3',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => 'c3'
                    ]
                ]
            ],
            [
                'id' => 'node-c4',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => 'c4'
                    ]
                ]
            ]
        ]
    ],
    [
        'id' => 'node-c1',
        'content' => [
            'type' => 'text',
            'text' => 'ccc1'
        ]
    ],
    [
        'id' => 'node-c2',
        'content' => [
            'type' => 'text',
            'text' => 'ccc2'
        ]
    ],
    [
        'id' => 'node-c3',
        'content' => [
            'type' => 'text',
            'text' => 'ccc3'
        ]
    ],
    [
        'id' => 'node-c4',
        'content' => [
            'type' => 'text',
            'text' => 'ccc4'
        ]
    ]
];