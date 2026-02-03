<?php

defined('BASEPATH') or exit('No direct script access allowed');

function khurram_module_install()
{
    $CI = &get_instance();

    // Create table to store khurram entries
    if (!$CI->db->table_exists(db_prefix() . 'khurram')) {
        $CI->db->query('CREATE TABLE `' . db_prefix() . "khurram` (
            `id` INT(11) NOT NULL AUTO_INCREMENT,
            `clientid` INT(11) NOT NULL,
            `remarks` TEXT NULL,
            `date_added` DATETIME NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=" . $CI->db->char_set . ';');
    }
}
