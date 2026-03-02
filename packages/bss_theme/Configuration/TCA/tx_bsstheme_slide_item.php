<?php

return [
    'ctrl' => [
        'title' => 'BSS Slide Item',
        'label' => 'header',
        'label_alt' => 'slide_layout',
        'label_alt_force' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'hideTable' => true,
        'sortby' => 'sorting_foreign',
        'delete' => 'deleted',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'translationSource' => 'l10n_source',
        'enablecolumns' => [
            'disabled' => 'hidden',
        ],
        'typeicon_classes' => ['default' => 'content-carousel-item-textandimage'],
        'security' => [
            'ignoreWebMountRestriction' => true,
            'ignoreRootLevelRestriction' => true,
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'columns' => [
        'uid_foreign' => [
            'label' => 'Parent Content Element',
            'config' => [
                'type' => 'group',
                'allowed' => 'tt_content',
                'size' => 1,
                'maxitems' => 1,
                'minitems' => 0,
            ],
        ],
        'sorting_foreign' => [
            'label' => 'Sorting',
            'config' => [
                'type' => 'number',
                'size' => 4,
                'default' => 0,
            ],
        ],
        'tablename' => [
            'label' => 'Table',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],
        'fieldname' => [
            'label' => 'Field',
            'l10n_mode' => 'exclude',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
            ],
        ],

        'slide_layout' => [
            'exclude' => true,
            'label' => 'Slide Template',
            'description' => 'Choose the visual layout for this slide',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'Default (Image + Text + CTA)', 'value' => 'Default'],
                    ['label' => 'Centered Text Only', 'value' => 'CenteredText'],
                    ['label' => 'Image Left / Text Right', 'value' => 'ImageLeftTextRight'],
                ],
                'default' => 'Default',
            ],
        ],
        'header' => [
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'Slide Headline',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'subheader' => [
            'label' => 'Slide Subheadline',
            'config' => [
                'type' => 'input',
                'size' => 50,
                'max' => 255,
            ],
        ],
        'bodytext' => [
            'label' => 'Slide Description',
            'config' => [
                'type' => 'text',
                'rows' => 4,
                'cols' => 80,
            ],
        ],
        'link' => [
            'label' => 'CTA Link',
            'config' => [
                'type' => 'link',
                'size' => 50,
            ],
        ],
        'link_label' => [
            'label' => 'CTA Button Text',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'link_config' => [
            'label' => 'Button Style',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['label' => 'Primary', 'value' => '0'],
                    ['label' => 'Secondary', 'value' => 'secondary'],
                    ['label' => 'Inverted', 'value' => 'inverted'],
                    ['label' => 'Inverted Secondary', 'value' => 'inverted-secondary'],
                ],
            ],
        ],
        'image' => [
            'label' => 'Content Image',
            'description' => 'Optional foreground image for this slide',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-image-types',
            ],
        ],
        'background_image' => [
            'label' => 'Background Image',
            'description' => 'Full-width background image for this slide',
            'config' => [
                'type' => 'file',
                'maxitems' => 1,
                'allowed' => 'common-image-types',
            ],
        ],
    ],
    'palettes' => [
        'link_palette' => [
            'showitem' => 'link, link_label, --linebreak--, link_config',
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                slide_layout,
                header,
                subheader,
                bodytext,
                --palette--;;link_palette,
            --div--;Images,
                background_image,
                image,
            --div--;Access,
                hidden,
            ',
        ],
    ],
];
