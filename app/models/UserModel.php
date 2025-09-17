<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Model: UserModel
 * 
 * Automatically generated via CLI.
 */
class UserModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function search_paginate($query = '', $page = 1, $per_page = 5)
    {
        $page = max(1, (int)$page);
        $per_page = max(1, (int)$per_page);
        $offset = ($page - 1) * $per_page;

        // Build WHERE for total count
        $this->db->table($this->table);
        $this->apply_search($query);
        $total = (int)$this->db->count();

        // Build WHERE again for data fetch with limit
        $this->db->table($this->table);
        $this->apply_search($query);
        $results = $this->db->order_by($this->primary_key, 'DESC')->limit($offset, $per_page)->get_all();

        return [
            'data' => $results,
            'total' => $total,
            'per_page' => $per_page,
            'current_page' => $page,
            'last_page' => (int)ceil($total / $per_page),
            'query' => $query,
        ];
    }

    private function apply_search($query)
    {
        $q = trim((string)$query);
        if ($q === '') {
            return;
        }

        $like = '%'.$q.'%';
        // Grouped OR conditions: id exact OR name/email like
        $this->db->grouped(function($db) use ($q, $like) {
            if (is_numeric($q)) {
                $db->where('id', $q)->or_like('last_name', $like)->or_like('first_name', $like)->or_like('email', $like);
            } else {
                $db->like('last_name', $like)->or_like('first_name', $like)->or_like('email', $like);
            }
        });
    }
}