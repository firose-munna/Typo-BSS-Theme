CREATE TABLE pages (
    tx_bsstheme_megamenu_layout varchar(50) DEFAULT 'none' NOT NULL,
    tx_bsstheme_megamenu_heading varchar(255) DEFAULT '' NOT NULL,
    tx_bsstheme_megamenu_description text,
    tx_bsstheme_megamenu_image int unsigned DEFAULT 0 NOT NULL,
    tx_bsstheme_megamenu_cta_label varchar(255) DEFAULT '' NOT NULL,
    tx_bsstheme_megamenu_cta_link varchar(1024) DEFAULT '' NOT NULL,
    tx_bsstheme_nav_icon varchar(50) DEFAULT '' NOT NULL,
    tx_bsstheme_nav_is_cta smallint unsigned DEFAULT 0 NOT NULL
);
