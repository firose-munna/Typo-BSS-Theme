<?php

defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$bssThemeColumns = [
    'tx_bsstheme_megamenu_layout' => [
        'exclude' => true,
        'label' => 'Mega Menu Layout',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['label' => 'None (no mega menu)', 'value' => 'none'],
                ['label' => 'Grouped Columns (e.g. Services)', 'value' => 'grouped-columns'],
                ['label' => 'Promo + Links + Image (e.g. Company)', 'value' => 'promo-links-image'],
            ],
            'default' => 'none',
        ],
    ],
    'tx_bsstheme_megamenu_heading' => [
        'exclude' => true,
        'label' => 'Promo Card Heading',
        'description' => 'Heading text shown in the mega menu promo card (e.g. "About BSS")',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
        ],
    ],
    'tx_bsstheme_megamenu_description' => [
        'exclude' => true,
        'label' => 'Promo Card Description',
        'description' => 'Description text shown in the mega menu promo card',
        'config' => [
            'type' => 'text',
            'rows' => 4,
            'cols' => 50,
        ],
    ],
    'tx_bsstheme_megamenu_image' => [
        'exclude' => true,
        'label' => 'Mega Menu Illustration Image',
        'description' => 'Illustration image shown in the right column of the mega menu',
        'config' => [
            'type' => 'file',
            'maxitems' => 1,
            'allowed' => 'common-image-types',
        ],
    ],
    'tx_bsstheme_megamenu_cta_label' => [
        'exclude' => true,
        'label' => 'CTA Button Label',
        'description' => 'Text for the call-to-action button in the mega menu promo card (e.g. "Contact Us")',
        'config' => [
            'type' => 'input',
            'size' => 30,
            'max' => 255,
        ],
    ],
    'tx_bsstheme_megamenu_cta_link' => [
        'exclude' => true,
        'label' => 'CTA Button Link',
        'description' => 'Link target for the mega menu CTA button',
        'config' => [
            'type' => 'link',
        ],
    ],
    'tx_bsstheme_nav_icon' => [
        'exclude' => true,
        'label' => 'Navigation Icon',
        'description' => 'Icon shown next to this page in the mega menu',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['label' => 'None', 'value' => ''],
                ['label' => 'AI/ML', 'value' => 'ai-ml'],
                ['label' => 'eCommerce', 'value' => 'ecommerce'],
                ['label' => 'CAM & CAD', 'value' => 'cam-cad'],
                ['label' => 'Web & Mobile', 'value' => 'web-mobile'],
                ['label' => 'Custom Software', 'value' => 'custom-software'],
                ['label' => 'DevOps', 'value' => 'devops'],
                ['label' => 'QA & Testing', 'value' => 'qa-testing'],
                ['label' => 'Consulting', 'value' => 'consulting'],
                ['label' => 'Dedicated Team', 'value' => 'dedicated-team'],
                ['label' => 'Staff Augmentation', 'value' => 'staff-augmentation'],
                ['label' => 'Offshore', 'value' => 'offshore'],
                ['label' => 'Fixed Price', 'value' => 'fixed-price'],
                ['label' => 'MVP', 'value' => 'mvp'],
                ['label' => 'About', 'value' => 'about'],
                ['label' => 'Contact', 'value' => 'contact'],
                ['label' => 'Blog', 'value' => 'blog'],
                ['label' => 'Team', 'value' => 'team'],
                ['label' => 'Careers', 'value' => 'careers'],
                ['label' => 'Events', 'value' => 'events'],
                ['label' => 'Portfolio', 'value' => 'portfolio'],
                ['label' => 'Frontend', 'value' => 'frontend'],
                ['label' => 'Backend', 'value' => 'backend'],
                ['label' => 'Fullstack', 'value' => 'fullstack'],
                ['label' => 'DevOps Engineer', 'value' => 'devops-eng'],
                ['label' => 'QA Engineer', 'value' => 'qa-eng'],
            ],
            'default' => '',
        ],
    ],
    'tx_bsstheme_nav_is_cta' => [
        'exclude' => true,
        'label' => 'Display as CTA Button',
        'description' => 'Show this page as a highlighted CTA button in the navigation (e.g. "GET IN TOUCH")',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
        ],
    ],
];

ExtensionManagementUtility::addTCAcolumns('pages', $bssThemeColumns);

ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;Mega Menu,
        tx_bsstheme_megamenu_layout,
        tx_bsstheme_megamenu_heading,
        tx_bsstheme_megamenu_description,
        tx_bsstheme_megamenu_image,
        tx_bsstheme_megamenu_cta_label,
        tx_bsstheme_megamenu_cta_link,
    --div--;Navigation,
        tx_bsstheme_nav_icon,
        tx_bsstheme_nav_is_cta',
    '',
    'after:title'
);
