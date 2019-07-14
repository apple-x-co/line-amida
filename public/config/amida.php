<?php

return [
    [
        'id'       => 'node-a',
        'root'     => 1,
        //'class' => '\Amida\Node',
        'content'  => [
            //'class' => '\Amida\ContentText',
            'type' => 'text',
            'text' => 'aaa',
        ],
        'branches' => [
            [
                //'class' => '\Amida\Branch',
                'to'       => 'node-b1',
                'type'     => 'text',
                'text'     => 'branch b1',
                'triggers' => [
                    [
                        //'class' => '\Amida\TriggerText',
                        'type' => 'text',
                        'text' => 'b1'
                    ]
                ]
            ],
            [
                'to'       => 'node-b2',
                'type'     => 'text',
                'text'     => 'branch b2',
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
        'id'       => 'node-b1',
        'content'  => [
            'type' => 'text',
            'text' => 'bbb1'
        ],
        'branches' => [
            [
                'to'       => 'node-c1',
                'type'     => 'text',
                'text'     => 'branch c1',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => 'c1'
                    ]
                ]
            ],
            [
                'to'       => 'node-c2',
                'type'     => 'text',
                'text'     => 'branch c2',
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
        'id'       => 'node-b2',
        'content'  => [
            'type' => 'text',
            'text' => 'bbb2'
        ],
        'branches' => [
            [
                'to'       => 'node-c3',
                'type'     => 'text',
                'text'     => 'branch c3',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => 'c3'
                    ]
                ]
            ],
            [
                'to'       => 'node-c4',
                'type'     => 'text',
                'text'     => 'branch c4',
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
        'id'      => 'node-c1',
        'content' => [
            'type' => 'text',
            'text' => 'ccc1'
        ]
    ],
    [
        'id'      => 'node-c2',
        'content' => [
            'type' => 'text',
            'text' => 'ccc2'
        ]
    ],
    [
        'id'      => 'node-c3',
        'content' => [
            'type' => 'text',
            'text' => 'ccc3'
        ]
    ],
    [
        'id'      => 'node-c4',
        'content' => [
            'type' => 'text',
            'text' => 'ccc4'
        ]
    ]
];