<?php

class AuthService {
    
    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function requireAuth() {
        if (!$this->isLoggedIn()) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
    }

    public function requireRole($roleName) {
        $this->requireAuth();
        
        $userRepo = new UserRepository();
        $user = $userRepo->findById($_SESSION['user_id']);
        
        if (!$user || !$user->hasRole($roleName)) {
            http_response_code(403);
            require_once '../src/Views/errors/403.php';
            exit;
        }
    }

    public function getUserRole() {
        if (!$this->isLoggedIn()) {
            return null;
        }

        $userRepo = new UserRepository();
        $roleRepo = new RoleRepository();
        
        $user = $userRepo->findById($_SESSION['user_id']);
        if ($user) {
            $role = $roleRepo->findById($user->getRoleId());
            return $role ? $role->getName() : null;
        }
        return null;
    }

    public function login($userId) {
        $_SESSION['user_id'] = $userId;
    }

    public function logout() {
        session_destroy();
    }
}