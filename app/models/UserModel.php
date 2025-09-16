<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'users';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
        $this->ensure_table_exists();
    }
    
    private function ensure_table_exists()
    {
        try {
            $this->db->raw("CREATE TABLE IF NOT EXISTS `users` (
                `id` INT(11) NOT NULL AUTO_INCREMENT,
                `last_name` VARCHAR(100) NOT NULL,
                `first_name` VARCHAR(100) NOT NULL,
                `email` VARCHAR(255) NOT NULL,
                `deleted_at` DATETIME NULL DEFAULT NULL,
                PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");
        } catch (Exception $e) {
            // Silently ignore to avoid breaking requests if DB user lacks DDL permissions
        }
    }
    
}