<?php

class RoleRepository {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function findById($id) {
        $stmt = $this->db->prepare("SELECT * FROM roles WHERE id = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            return new Role($data['id'], $data['name']);
        }
        return null;
    }

    public function findByName($name) {
        $stmt = $this->db->prepare("SELECT * FROM roles WHERE name = ?");
        $stmt->execute([$name]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            return new Role($data['id'], $data['name']);
        }
        return null;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM roles WHERE name != 'admin'");
        $roles = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $roles[] = new Role($data['id'], $data['name']);
        }
        return $roles;
    }
}