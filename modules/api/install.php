<?php

defined('BASEPATH') or exit('No direct script access allowed');

$CI =& get_instance();

if (!$CI->db->table_exists(db_prefix() . 'user_api')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'user_api` (
        `id` INT(11) NOT NULL AUTO_INCREMENT,
        `user` VARCHAR(50) NOT NULL,
        `name` VARCHAR(50) NOT NULL,
        `token` VARCHAR(255) NOT NULL,
        `expiration_date` DATETIME,
        `permission_enable` TINYINT(4) DEFAULT 0,
        PRIMARY KEY (`id`));
    ');
} else {
    if (!$CI->db->field_exists('permission_enable', db_prefix() . 'user_api')) {
        $CI->db->query('ALTER TABLE `' . db_prefix() . 'user_api`
            ADD `permission_enable` TINYINT(4) DEFAULT 0;
        ');
    }
}

if (!$CI->db->table_exists(db_prefix() . 'user_api_permissions')) {
    $CI->db->query('CREATE TABLE `' . db_prefix() . 'user_api_permissions` (
        `api_id` INT(11) NOT NULL,
        `feature` VARCHAR(50) NOT NULL,
        `capability` VARCHAR(50) NOT NULL);
    ');
}

if ($CI->db->field_exists('password', db_prefix() . 'user_api')) {
    $CI->db->query('ALTER TABLE ' . db_prefix() . 'user_api DROP `password`');
}

// Add quota fields to user_api table
if (!$CI->db->field_exists('request_limit', db_prefix() . 'user_api')) {
    $CI->db->query("
        ALTER TABLE `" . db_prefix() . "user_api` 
        ADD `request_limit` int(11) NOT NULL DEFAULT 1000 AFTER `permission_enable`,
        ADD `time_window` int(11) NOT NULL DEFAULT 3600 AFTER `request_limit`,
        ADD `burst_limit` int(11) NOT NULL DEFAULT 0 AFTER `time_window`,
        ADD `quota_active` tinyint(1) NOT NULL DEFAULT 1 AFTER `burst_limit`,
        ADD `quota_created_at` datetime NULL AFTER `quota_active`,
        ADD `quota_updated_at` datetime NULL AFTER `quota_created_at`
    ");
}

// Create API usage logs table with foreign key relationship
if (!$CI->db->table_exists(db_prefix() . 'api_usage_logs')) {
    $CI->db->query("
        CREATE TABLE `" . db_prefix() . "api_usage_logs` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `user_api_id` int(11) NOT NULL,
            `api_key` varchar(255) NOT NULL,
            `endpoint` varchar(255) NOT NULL,
            `response_code` int(11) NOT NULL,
            `response_time` decimal(10,4) NOT NULL DEFAULT 0.0000,
            `timestamp` int(11) NOT NULL,
            `ip_address` varchar(45) NOT NULL,
            `user_agent` text,
            `rate_limit_checked` tinyint(1) NOT NULL DEFAULT 1,
            `rate_limit_type` varchar(50) NULL,
            `rate_limit_limit` int(11) NULL,
            `rate_limit_current` int(11) NULL,
            `rate_limit_exceeded` tinyint(1) NOT NULL DEFAULT 0,
            PRIMARY KEY (`id`),
            KEY `user_api_id` (`user_api_id`),
            KEY `api_key` (`api_key`),
            KEY `endpoint` (`endpoint`),
            KEY `timestamp` (`timestamp`),
            KEY `response_code` (`response_code`),
            KEY `idx_rate_limit_ip` (`ip_address`, `timestamp`, `endpoint`),
            KEY `idx_rate_limit_key` (`api_key`, `timestamp`, `endpoint`),
            KEY `idx_rate_exceeded` (`rate_limit_exceeded`, `timestamp`),
            CONSTRAINT `fk_api_usage_logs_user_api` 
                FOREIGN KEY (`user_api_id`) 
                REFERENCES `" . db_prefix() . "user_api` (`id`) 
                ON DELETE CASCADE ON UPDATE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
} else {
    // Check if user_api_id column exists, if not add it
    if (!$CI->db->field_exists('user_api_id', db_prefix() . 'api_usage_logs')) {
        $CI->db->query("ALTER TABLE `" . db_prefix() . "api_usage_logs` 
            ADD `user_api_id` int(11) NOT NULL AFTER `id`");
        
        // Update existing records to link with user_api table
        $CI->db->query("
            UPDATE `" . db_prefix() . "api_usage_logs` aul
            INNER JOIN `" . db_prefix() . "user_api` ua ON aul.api_key = ua.token
            SET aul.user_api_id = ua.id
        ");
        
        // Add foreign key constraint
        $CI->db->query("
            ALTER TABLE `" . db_prefix() . "api_usage_logs` 
            ADD CONSTRAINT `fk_api_usage_logs_user_api` 
            FOREIGN KEY (`user_api_id`) 
            REFERENCES `" . db_prefix() . "user_api` (`id`) 
            ON DELETE CASCADE ON UPDATE CASCADE
        ");
    }
    
    // Add rate limit tracking columns if they don't exist
    if (!$CI->db->field_exists('rate_limit_checked', db_prefix() . 'api_usage_logs')) {
        $CI->db->query("
            ALTER TABLE `" . db_prefix() . "api_usage_logs` 
            ADD `rate_limit_checked` tinyint(1) NOT NULL DEFAULT 1 AFTER `user_agent`,
            ADD `rate_limit_type` varchar(50) NULL AFTER `rate_limit_checked`,
            ADD `rate_limit_limit` int(11) NULL AFTER `rate_limit_type`,
            ADD `rate_limit_current` int(11) NULL AFTER `rate_limit_limit`,
            ADD `rate_limit_exceeded` tinyint(1) NOT NULL DEFAULT 0 AFTER `rate_limit_current`,
            ADD KEY `idx_rate_limit_ip` (`ip_address`, `timestamp`, `endpoint`),
            ADD KEY `idx_rate_limit_key` (`api_key`, `timestamp`, `endpoint`),
            ADD KEY `idx_rate_exceeded` (`rate_limit_exceeded`, `timestamp`)
        ");
    }
}

// Create api_limit table for API_Controller rate limiting
if (!$CI->db->table_exists(db_prefix() . 'api_limit')) {
    $CI->db->query("
        CREATE TABLE `" . db_prefix() . "api_limit` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `uri` VARCHAR(255) NOT NULL,
            `class` VARCHAR(255) NOT NULL,
            `method` VARCHAR(255) NOT NULL,
            `ip_address` VARCHAR(45) NOT NULL,
            `time` INT(11) NOT NULL,
            PRIMARY KEY (`id`),
            KEY `uri` (`uri`),
            KEY `ip_address` (`ip_address`),
            KEY `time` (`time`),
            KEY `idx_rate_check` (`ip_address`, `time`, `uri`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
}

// Set default quota values for existing API users
$CI->db->query("
    UPDATE `" . db_prefix() . "user_api` 
    SET 
        request_limit = 1000,
        time_window = 3600,
        burst_limit = 100,
        quota_active = 1,
        quota_created_at = NOW(),
        quota_updated_at = NOW()
    WHERE request_limit IS NULL OR request_limit = 0
");