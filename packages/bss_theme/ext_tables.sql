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

CREATE TABLE tt_content (
    tx_bsstheme_slider_items int unsigned DEFAULT 0 NOT NULL
);

CREATE TABLE tx_bsstheme_slide_item (
    uid int(11) unsigned NOT NULL auto_increment,
    pid int(11) unsigned DEFAULT 0 NOT NULL,
    tstamp int(11) unsigned DEFAULT 0 NOT NULL,
    crdate int(11) unsigned DEFAULT 0 NOT NULL,
    deleted smallint unsigned DEFAULT 0 NOT NULL,
    hidden smallint unsigned DEFAULT 0 NOT NULL,
    sorting_foreign int DEFAULT 0 NOT NULL,

    sys_language_uid int DEFAULT 0 NOT NULL,
    l10n_parent int(11) unsigned DEFAULT 0 NOT NULL,
    l10n_source int(11) unsigned DEFAULT 0 NOT NULL,
    l10n_state text,
    l10n_diffsource mediumblob,

    t3ver_oid int(11) unsigned DEFAULT 0 NOT NULL,
    t3ver_wsid int(11) unsigned DEFAULT 0 NOT NULL,
    t3ver_state smallint DEFAULT 0 NOT NULL,
    t3ver_stage int DEFAULT 0 NOT NULL,

    uid_foreign longtext,
    tablename varchar(255) DEFAULT '' NOT NULL,
    fieldname varchar(255) DEFAULT '' NOT NULL,

    slide_layout varchar(50) DEFAULT 'Default' NOT NULL,
    header varchar(255) DEFAULT '' NOT NULL,
    subheader varchar(255) DEFAULT '' NOT NULL,
    bodytext text,
    link text DEFAULT '' NOT NULL,
    link_label varchar(255) DEFAULT '' NOT NULL,
    link_config varchar(50) DEFAULT '0' NOT NULL,
    image int unsigned DEFAULT 0 NOT NULL,
    background_image int unsigned DEFAULT 0 NOT NULL,

    PRIMARY KEY (uid),
    KEY parent (pid,deleted,hidden),
    KEY language_identifier (l10n_parent,sys_language_uid),
    KEY translation_source (l10n_source),
    KEY t3ver_oid (t3ver_oid,t3ver_wsid)
);
