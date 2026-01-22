<?php

class User {
    private $id;
    private $name;
    private $email;
    private $password;
    private $roleId;

    public function __construct($id = null, $name = null, $email = null, $password = null, $roleId = null) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->roleId = $roleId;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRoleId() {
        return $this->roleId;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRoleId($roleId) {
        $this->roleId = $roleId;
    }

    public function hasRole($roleName) {
        $roleRepo = new RoleRepository();
        $role = $roleRepo->findById($this->roleId);
        return $role && $role->getName() === $roleName;
    }
}