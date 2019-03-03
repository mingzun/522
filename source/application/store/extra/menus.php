<?php
/**
 * 后台菜单配置
 *    'home' => [
 *       'name' => '首页',                // 菜单名称
 *       'icon' => 'icon-home',          // 图标 (class)
 *       'index' => 'index/index',         // 链接
 *     ],
 */
return [
    'index' => [
        'name' => '首页',
        'icon' => 'icon-home',
        'index' => 'index/index',
    ]
    ,

    'goods' => [
        'name' => '商品管理',
        'icon' => 'icon-goods',
        'index' => 'goods/index',
        'submenu' => [
            [
                'name' => '商品列表',
                'index' => 'goods/index',
                'uris' => [
                    'goods/index',
                    'goods/add',
                    'goods/edit'
                ],
            ],
            [
                'name' => '商品分类',
                'index' => 'goods.category/index',
                'uris' => [
                    'goods.category/index',
                    'goods.category/add',
                    'goods.category/edit',
                ],
            ],
        ],
    ],
    'jjg' => [
        'name' => '家居馆',
        'icon' => 'icon-goods',
        'index' => 'jjg/image',
        'submenu' => [
            [
                'name' => '轮播图设置',
                'index' => 'jjg/image',

            ]
        ]
    ]
    ,

     'lbzx' => [
        'name' => '鲁班在线',
        'icon' => 'icon-goods',
        'index' => 'lbzx/list1',
        'submenu' => [
            [
                'name' => '服务列表',
                'index' => 'lbzx/list1',
            ],
            [
                'name' => '添加服务',
                'index' => 'lbzx/index',
            ],
            [
                'name' => '服务分类',
                'index' => 'lbzx/class1',

            ],
            [
                'name' => '轮播图设置',
                'index' => 'lbzx/image',

            ]
        ]
    ]
    ,

     'tcsc' => [
        'name' => '跳蚤市场',
        'icon' => 'icon-goods',
        'index' => 'tcsc/index',
        'submenu' => [
            [
                'name' => '商品列表',
                'index' => 'tcsc/index',
            ],
            [
                'name' => '轮播图设置',
                'index' => 'tcsc/image',

            ]
            ,
            [
                'name' => '跳蚤分类',
                'index' => 'tcsc/class1',

            ]
        ]
    ]
    ,

     'hsz' => [
        'name' => '回收站',
        'icon' => 'icon-goods',
        'index' => 'hsz/list1',
        'submenu' => [
            [
                'name' => '服务列表',
                'index' => 'hsz/list1',
            ],
            [
                'name' => '添加服务',
                'index' => 'hsz/index',
            ],
            [
                'name' => '服务分类',
                'index' => 'hsz/class1',

            ],
            [
                'name' => '轮播图设置',
                'index' => 'hsz/image',

            ]
        ]
    ],

    'order' => [
        'name' => '订单管理',
        'icon' => 'icon-order',
        'index' => 'order/delivery_list',
        'submenu' => [
            [
                'name' => '待发货',
                'index' => 'order/delivery_list',
            ],
            [
                'name' => '待收货',
                'index' => 'order/receipt_list',
            ],
            [
                'name' => '待付款',
                'index' => 'order/pay_list',
            ],
            [
                'name' => '已完成',
                'index' => 'order/complete_list',

            ],
            [
                'name' => '已取消',
                'index' => 'order/cancel_list',
            ],
            [
                'name' => '全部订单',
                'index' => 'order/all_list',
            ],
        ]
    ],


    // 'service' => [
    //     'name' => '服务管理',
    //     'icon' => 'icon-user',
    //     'index' => 'service/index',
    //     'submenu' => [
    //         [
    //             'name' => '服务列表',
    //            /* 'index' => 'service/pay_list',*/
    //             'index' => 'service/index',
    //             'uris' => [
    //                 'service/index',
    //                 'service/add',
    //                 'service/edit',
    //             ],
    //         ],
    //         [
    //             'name' => '服务分类',
    //             'index' => 'service.fenlei/index',
    //             'uris' => [
    //                 /*'service.label/index',*/
    //                 'service.fenlei/add',
    //                 'service.fenlei/edit',
    //             ],

    //         ],
    //         [
    //             'name' => '服务订单',
    //             'index' => 'service/index',
    //         ],
    //     ]
    // ],

     'user' => [
        'name' => '用户管理',
        'icon' => 'icon-user',
        'index' => 'user/index',
    ],

    // 'config' => [
    //     'name' => '系统配置',
    //     'icon' => 'icon-setting',
    //     'index' => 'config/delivery_list',
    //     'submenu' => [
    //         [
    //             'name' => '小程序设置',
    //             'index' => 'config/delivery_list',
    //         ],
    //         [
    //             'name' => '支付设置',
    //             'index' => 'config/receipt_list',
    //         ],
    //         [
    //             'name' => '公众号设置',
    //             'index' => 'config/pay_list',
    //         ],
    //         [
    //             'name' => '首页设置',
    //             'index' => 'config/complete_list',

    //         ],
    //     ]
    // ],
//    'marketing' => [
//        'name' => '营销管理',
//        'icon' => 'icon-marketing',
//        'index' => 'marketing/index',
//        'submenu' => [],
//    ],
    'wxapp' => [
        'name' => '小程序',
        'icon' => 'icon-wxapp',
        'color' => '#36b313',
        'index' => 'wxapp/setting',
        'submenu' => [
            [
                'name' => '小程序设置',
                'index' => 'wxapp/setting',
            ],
            [
                'name' => '页面管理',
                'active' => true,
                'submenu' => [
                    [
                        'name' => '首页设计',
                        'index' => 'wxapp.page/home'
                    ],
                    [
                        'name' => '页面链接',
                        'index' => 'wxapp.page/links'
                    ],
                    [
                        'name' => '首页分类设置',
                        'index' => 'wxapp.page/syfl'
                    ],
                    [
                        'name' => 'vip积分设置',
                        'index' => 'wxapp.page/jfjf'
                    ],
                    [
                        'name' => 'vip设置',
                        'index' => 'wxapp.page/vip'
                    ],
                ]
            ],
            [
                'name' => '帮助中心',
                'index' => 'wxapp.help/index',
                'urls' => [
                    'wxapp.help/index',
                    'wxapp.help/add',
                    'wxapp.help/edit',
                    'wxapp.help/delete'
                ]
            ],
            [
                'name' => '导航设置',
                'index' => 'wxapp/tabbar'
            ],

        ],
    ],
    /*'plugins' => [
        'name' => '应用中心',
        'icon' => 'icon-application',
        'is_svg' => true,   // 多色图标
//        'index' => 'plugins/index',
    ],*/
    'setting' => [
        'name' => '设置',
        'icon' => 'icon-setting',
        'index' => 'setting/store',
        'submenu' => [
            [
                'name' => '商城设置',
                'index' => 'setting/store',
            ],
            [
                'name' => '交易设置',
                'index' => 'setting/trade',
            ],
            [
                'name' => '配送设置',
                'index' => 'setting.delivery/index',
                'uris' => [
                    'setting.delivery/index',
                    'setting.delivery/add',
                    'setting.delivery/edit',
                ],
            ],
            [
                'name' => '短信通知',
                'index' => 'setting/sms'
            ],
            [
                'name' => '上传设置',
                'index' => 'setting/storage',
            ],
            [
                'name' => '其他',
                'active' => true,
                'submenu' => [
                    [
                        'name' => '清理缓存',
                        'index' => 'setting.cache/clear'
                    ],
                    [
                        'name' => '环境检测',
                        'index' => 'setting.science/index'
                    ],
                ]
            ]
        ],
    ],
];