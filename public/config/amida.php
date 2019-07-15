<?php

return [
    [
        'id'       => 'node-question',
        'root'     => 1,
        'content'  => [
            'type' => 'text',
            'text' => 'お料理のジャンルを教えてください',
        ],
        'branches' => [
            [
                'to'       => 'node-japanese',
                'type'     => 'text',
                'label'    => '和食（日本食）',
                'text'     => '和食',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '和食'
                    ],
                    [
                        'type' => 'text',
                        'text' => '日本食'
                    ],
                    [
                        'type' => 'text',
                        'text' => '日本料理'
                    ]
                ]
            ],
            [
                'to'       => 'node-chinese',
                'type'     => 'text',
                'label'    => '中華料理',
                'text'     => '中華料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '中華料理'
                    ],
                    [
                        'type' => 'text',
                        'text' => '中華'
                    ]
                ]
            ],
            [
                'to'       => 'node-thai',
                'type'     => 'text',
                'label'    => 'タイ料理',
                'text'     => 'タイ料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => 'タイ料理'
                    ],
                    [
                        'type' => 'text',
                        'text' => 'タイ'
                    ]
                ]
            ]
        ]
    ],
    [
        'id'       => 'node-japanese',
        'content'  => [
            'type' => 'text',
            'text' => '和食の内容を教えてください！'
        ],
        'branches' => [
            [
                'to'       => 'node-japanese-vegetable',
                'type'     => 'text',
                'label'    => '野菜料理（山菜）',
                'text'     => '野菜料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '野菜料理'
                    ],
                    [
                        'type' => 'text',
                        'text' => '山菜料理'
                    ]
                ]
            ],
            [
                'to'       => 'node-japanese-seafood',
                'type'     => 'text',
                'label'    => '魚介料理',
                'text'     => '魚介料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '魚介料理'
                    ]
                ]
            ],
            [
                'to'       => 'node-japanese-meat',
                'type'     => 'text',
                'label'    => '肉料理',
                'text'     => '肉料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '肉料理'
                    ]
                ]
            ]
        ]
    ],
    [
        'id'       => 'node-chinese',
        'content'  => [
            'type' => 'text',
            'text' => '中華料理の内容を教えてください！'
        ],
        'branches' => [
            [
                'to'       => 'node-chinese-vegetable',
                'type'     => 'text',
                'label'    => '野菜料理（山菜）',
                'text'     => '野菜料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '野菜料理'
                    ],
                    [
                        'type' => 'text',
                        'text' => '山菜料理'
                    ]
                ]
            ],
            [
                'to'       => 'node-chinese-seafood',
                'type'     => 'text',
                'label'    => '魚介料理',
                'text'     => '魚介料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '魚介料理'
                    ]
                ]
            ],
            [
                'to'       => 'node-chinese-meat',
                'type'     => 'text',
                'label'    => '肉料理',
                'text'     => '肉料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '肉料理'
                    ]
                ]
            ]
        ]
    ],
    [
        'id'       => 'node-thai',
        'content'  => [
            'type' => 'text',
            'text' => 'タイ料理の内容を教えてください！'
        ],
        'branches' => [
            [
                'to'       => 'node-thai-vegetable',
                'type'     => 'text',
                'label'    => '野菜料理（山菜）',
                'text'     => '野菜料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '野菜料理'
                    ],
                    [
                        'type' => 'text',
                        'text' => '山菜料理'
                    ]
                ]
            ],
            [
                'to'       => 'node-thai-seafood',
                'type'     => 'text',
                'label'    => '魚介料理',
                'text'     => '魚介料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '魚介料理'
                    ]
                ]
            ],
            [
                'to'       => 'node-thai-meat',
                'type'     => 'text',
                'label'    => '肉料理',
                'text'     => '肉料理',
                'triggers' => [
                    [
                        'type' => 'text',
                        'text' => '肉料理'
                    ]
                ]
            ]
        ]
    ],
    [
        'id'      => 'node-japanese-vegetable',
        'content' => [
            'type' => 'text',
            'text' => "和食の野菜料理ですね。\nhttps://retty.me/"
        ]
    ],
    [
        'id'      => 'node-japanese-seafood',
        'content' => [
            'type' => 'text',
            'text' => "和食の魚介料理ですね。\nhttps://retty.me/"
        ]
    ],
    [
        'id'      => 'node-japanese-meat',
        'content' => [
            'type' => 'text',
            'text' => "和食の肉料理ですね。\nhttps://retty.me/"
        ]
    ],
    [
        'id'      => 'node-chinese-vegetable',
        'content' => [
            'type' => 'text',
            'text' => "中華料理の野菜料理ですね。\nhttps://retty.me/"
        ]
    ],
    [
        'id'      => 'node-chinese-seafood',
        'content' => [
            'type' => 'text',
            'text' => "中華料理の魚介料理ですね。\nhttps://retty.me/"
        ]
    ],
    [
        'id'      => 'node-chinese-meat',
        'content' => [
            'type' => 'text',
            'text' => "中華料理の肉料理ですね。\nhttps://retty.me/"
        ]
    ],
    [
        'id'      => 'node-thai-vegetable',
        'content' => [
            'type' => 'text',
            'text' => "タイ料理の野菜料理ですね。\nhttps://retty.me/"
        ]
    ],
    [
        'id'      => 'node-thai-seafood',
        'content' => [
            'type' => 'text',
            'text' => "タイ料理の魚介料理ですね。\nhttps://retty.me/"
        ]
    ],
    [
        'id'      => 'node-thai-meat',
        'content' => [
            'type' => 'text',
            'text' => "タイ料理の肉料理ですね。\nhttps://retty.me/"
        ]
    ]
];