<?php

return [
    [
        'name' => 'Dashboard',
        'icon' => 'desktop_mac',
        'route' => 'admin.index'
    ],
    [
        'is_parent' => true,
        'name' => 'Content',
        'icon' => 'description',
        'children' => [
            [
                'name' => 'Articles',
                'icon' => 'book',
                'route' => 'admin.articles'
            ],
            /*[
                'name' => 'Pages',
                'icon' => 'web',
                'route' => 'admin.pages'
            ],*/
            [
                'name' => 'Comments',
                'icon' => 'comments',
                'route' => 'admin.comments'
            ],
            [
                'name' => 'Tags',
                'icon' => 'tags',
                'route' => 'admin.tags'
            ],
            [
                'name' => 'Categories',
                'icon' => 'folder',
                'route' => 'admin.categories'
            ],

        ]
    ],
    [
        'name' => 'Menus',
        'icon' => 'developer_board',
        'route' => 'admin.menus'
    ],
    [
        'is_parent' => true,
        'name' => 'Parsers',
        'icon' => 'format_shapes',
        'children' => [
            [
                'name' => 'Resources',
                'icon' => 'book',
                'route' => 'admin.parsers.resources'
            ],
            // [
            //     'name' => 'Keys',
            //     'icon' => 'vpn_key',
            //     'route' => 'admin.parsers.keys'
            // ],
            [
                'name' => 'Randomize Word',
                'icon' => 'dvr',
                'route' => 'admin.parsers.words'
            ],
            [
                'name' => 'Black List Words',
                'icon' => 'link',
                'route' => 'admin.blacklist.index'
            ],
            [
                'name' => 'Parser Panel',
                'icon' => 'memory',
                'route' => 'admin.parsers.panel'
            ],
            [
                'name' => 'Logs',
                'icon' => 'link',
                'route' => 'admin.parsers.logs'
            ]
        ],
    ],
    [
        'is_parent' => false,
        'name' => 'Proxy',
        'icon' => 'security',
        'route' => 'admin.proxy'
    ],
    [
        'is_parent' => true,
        'name' => 'SEO',
        'icon' => 'assessment',
        'children' => [
            [
                'name' => 'URLs',
                'icon' => 'link',
                'route' => 'admin.seo.tags'
            ],
        ],
    ],
    [
        'is_parent' => true,
        'name' => 'Statistic',
        'icon' => 'timeline',
        'children' => [
            [
                'name' => 'URLs',
                'icon' => 'link',
                'route' => 'admin.statistic.urls'
            ],
			[
                'name' => 'Monitoring',
                'icon' => 'link',
                'route' => 'admin.statistic.monitoring'
            ]
        ],
    ],

    [
        'is_parent' => false,
        'name' => 'Polls',
        'icon' => 'poll',
        'route' => 'admin.poll.index'
    ],

    [
        'is_parent' => false,
        'name' => 'Ping services',
        'icon' => 'all_out',
        'route' => 'admin.pingservice.index'
    ],

    [
        'is_parent' => true,
        'name' => 'Users',
        'icon' => 'people',
        'route' => 'admin.users',
        'children' => [
            [
                'name' => 'All',
                'icon' => 'people',
                'route' => 'admin.users'
            ],
            [
                'name' => 'Bloggers',
                'icon' => 'people',
                'route' => 'admin.users-bloggers'
            ]
        ],
    ],
    [
        'name' => 'IP\'s',
        'icon' => 'vpn_lock',
        'route' => 'admin.ips'
    ],
    [
        'name' => 'Images',
        'icon' => 'image',
        'route' => 'admin.images'
    ],
    /*[
        'name' => 'Files',
        'icon' => 'cloud',
        'route' => 'admin.files'
    ],*/
    [
        'name' => 'Sitemaps',
        'icon' => 'cast',
        'route' => 'admin.sitemaps'
    ],
    [
        'is_parent' => true,
        'name' => 'Settings',
        'icon' => 'settings',
        'children' => [
            [
                'name' => 'Main',
                'icon' => 'cog',
                'route' => 'admin.settings'
            ],
            [
                'name' => 'Application',
                'icon' => 'cube',
                'route' => 'admin.app'
            ],
        ],
    ],
];