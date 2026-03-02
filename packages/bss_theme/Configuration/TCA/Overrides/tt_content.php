<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

// --- BSS Content Element Group ---
ExtensionManagementUtility::addTcaSelectItemGroup(
    'tt_content',
    'CType',
    'bss_elements',
    'BSS Content Elements',
    'after:camino_hero'
);

// --- Inline field for slider items ---
$bssContentColumns = [
    'tx_bsstheme_slider_items' => [
        'label' => 'Slider Slides',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tx_bsstheme_slide_item',
            'foreign_field' => 'uid_foreign',
            'foreign_table_field' => 'tablename',
            'foreign_match_fields' => [
                'fieldname' => 'tx_bsstheme_slider_items',
            ],
            'appearance' => [
                'showSynchronizationLink' => false,
                'showAllLocalizationLink' => true,
                'showPossibleLocalizationRecords' => true,
                'expandSingle' => true,
                'newRecordLinkAddTitle' => false,
                'newRecordLinkTitle' => 'Add Slide',
                'useSortable' => true,
                'useCombination' => false,
            ],
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('tt_content', $bssContentColumns);

// --- Register bss_hero_slider CType ---
ExtensionManagementUtility::addRecordType(
    [
        'label' => 'BSS Hero Slider',
        'description' => 'A full-width hero slider with individually templated slides',
        'value' => 'bss_hero_slider',
        'icon' => 'content-carousel-item-textandimage',
        'group' => 'bss_elements',
    ],
    '
        --palette--;;headers,
        --div--;Slides,
        tx_bsstheme_slider_items,
        --div--;core.form.tabs:appearance,
        --palette--;;frames
    ',
    [
        'columnsOverrides' => [
            'tx_bsstheme_slider_items' => [
                'config' => [
                    'overrideChildTca' => [
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
                    ],
                ],
            ],
        ],
    ],
);
