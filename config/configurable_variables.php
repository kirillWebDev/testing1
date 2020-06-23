<?php
/*
 * This file is part of Uinp.
 * This file defines variables to config your blog.
 * Rendered in admin/settings.blade.php
 * Support type:
 *   1. text
 *   2. textarea
 *   3. radio
 *   4. number
 *   5. others
 */
return [
    'groups' => [
        [
            'group_name' => 'Main',
            'children' => [
                [
                    'name' => 'google_analytics',
                    'type' => 'radio',
                    'default' => 'false',
                    'values' => [
                        'true' => 'On google analytics',
                        'false' => 'Off google analytics',
                    ],
                ],
                [
                    'name' => 'enable_mail_notification',
                    'type' => 'radio',
                    'default' => 'false',
                    'values' => [
                        'true' => 'Enable mail notification',
                        'false' => 'Disable mail notification',
                    ],
                ],
                [
                    'name' => 'comment_type',
                    'type' => 'radio',
                    'default' => 'raw',
                    'values' => [
                        'none' => 'Close comment (not shown)',
                        'raw' => 'Bring your own comments',
                        'disqus' => 'Disqus',
                    ],
                ],
                [
                    'name' => 'allow_comment',
                    'type' => 'radio',
                    'default' => 'true',
                    'values' => [
                        'true' => 'Allow comments',
                        'false' => 'Prohibit comments (will still show existing comments)',
                    ],
                ],
                [
                    'name' => 'enable_hot_articles',
                    'type' => 'radio',
                    'default' => 'false',
                    'values' => [
                        'true' => 'Enable popular articles',
                        'false' => 'Disable popular articles',
                    ],
                ],
                [
                    'name' => 'open_pay',
                    'type' => 'radio',
                    'default' => 'false',
                    'values' => [
                        'true' => 'Open appreciation',
                        'false' => 'Close appreciation',
                    ],
                ],
                [
                    'name' => 'pay_description',
                    'label' => 'Text after article',
                    'default' => ''
                ],
            ]
        ],
        [
            'group_name' => 'Website',
            'children' => [
                [
                    'name' => 'google_trace_id',
                    'label' => 'Tracking ID',
                    'placeholder' => 'Google Tracking ID'
                ],
                [
                    'name' => 'disqus_shortname',
                    'label' => 'Disqus ID',
                ],
                [
                    'name' => 'blog_brand',
                    'label' => 'Brand',
                    "placeholder" => "Support for text and html",
                    "type" => "textarea"
                ],
                [
                    'name' => 'site_title',
                    'label' => 'Title',
                ],
                [
                    'name' => 'site_keywords',
                    'label' => 'Keywords',
                    "placeholder" => "Keywords"
                ],
                [
                    'name' => 'site_description',
                    'label' => 'Description',
                ],
                [
                    'name' => 'site_header_title',
                    'label' => 'Header title',
                ],
                [
                    'name' => 'page_size',
                    'label' => 'Number of pages per page',
                    'default' => 7,
                    "type" => "number"
                ],
                [
                    'name' => 'hot_articles_count',
                    'label' => 'Popular article count',
                    'default' => 5,
                    "type" => "number"
                ],
                [
                    'name' => 'case_number',
                    'label' => 'Case number'
                ],
				[
                    'name' => 'head_script',
                    'label' => 'Header script',
					"type" => "textarea"
                ],
				[
                    'name' => 'footer_script',
                    'label' => 'Footer script',
					"type" => "textarea"
                ],
            ]
        ],
        [
            'group_name' => 'Home Page',
            'children' => [
                [
                    'name' => 'menu_block_1',
                    'label' => 'Блок 1',
                    'type' => 'select',
                    'options' => [
                        1 => 'Главное',
                        'Политика',
                        'Общество',
                        'Проишествие',
                        'Мнения',
                        'Спецпроекты',
                        'Коронавирус',
                        'Новости мира',
                        'Экономика'
                    ],
                ],
                [
                    'name' => 'menu_block_2',
                    'label' => 'Блок 2',
                    'type' => 'select',
                    'options' => [
                        1 => 'Главное',
                        'Политика',
                        'Общество',
                        'Проишествие',
                        'Мнения',
                        'Спецпроекты',
                        'Коронавирус',
                        'Новости мира',
                        'Экономика'
                    ],
                ],
                [
                    'name' => 'menu_block_3',
                    'label' => 'Блок 3',
                    'type' => 'select',
                    'options' => [
                        1 => 'Главное',
                        'Политика',
                        'Общество',
                        'Проишествие',
                        'Мнения',
                        'Спецпроекты',
                        'Коронавирус',
                        'Новости мира',
                        'Экономика'
                    ],
                ],
                [
                    'name' => 'menu_block_4',
                    'label' => 'Блок 4',
                    'type' => 'select',
                    'options' => [
                        1 => 'Главное',
                        'Политика',
                        'Общество',
                        'Проишествие',
                        'Мнения',
                        'Спецпроекты',
                        'Коронавирус',
                        'Новости мира',
                        'Экономика'
                    ],
                ],
                [
                    'name' => 'menu_block_5',
                    'label' => 'Блок 5',
                    'type' => 'select',
                    'options' => [
                        1 => 'Главное',
                        'Политика',
                        'Общество',
                        'Проишествие',
                        'Мнения',
                        'Спецпроекты',
                        'Коронавирус',
                        'Новости мира',
                        'Экономика'
                    ],
                ],
                [
                    'name' => 'menu_block_6',
                    'label' => 'Блок 6',
                    'type' => 'select',
                    'options' => [
                        1 => 'Главное',
                        'Политика',
                        'Общество',
                        'Проишествие',
                        'Мнения',
                        'Спецпроекты',
                        'Коронавирус',
                        'Новости мира',
                        'Экономика'
                    ],
                ],
                [
                    'name' => 'menu_block_7',
                    'label' => 'Блок 7',
                    'type' => 'select',
                    'options' => [
                        1 => 'Главное',
                        'Политика',
                        'Общество',
                        'Проишествие',
                        'Мнения',
                        'Спецпроекты',
                        'Коронавирус',
                        'Новости мира',
                        'Экономика'
                    ],
                ],
                [
                    'name' => 'menu_block_8',
                    'label' => 'Блок 8',
                    'type' => 'select',
                    'options' => [
                        1 => 'Главное',
                        'Политика',
                        'Общество',
                        'Проишествие',
                        'Мнения',
                        'Спецпроекты',
                        'Коронавирус',
                        'Новости мира',
                        'Экономика'
                    ],
                ],
                [
                    'name' => 'menu_block_9',
                    'label' => 'Блок 9',
                    'type' => 'select',
                    'options' => [
                        1 => 'Главное',
                        'Политика',
                        'Общество',
                        'Проишествие',
                        'Мнения',
                        'Спецпроекты',
                        'Коронавирус',
                        'Новости мира',
                        'Экономика'
                    ],
                ],
            ],
        ],
    ],
];