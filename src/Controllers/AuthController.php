<?php

class AuthController {
    
    public function showRegister() {
        if (isset($_SESSION['user_id'])) {
            $this->redirectToDashboard();
            return;
        }
        
        $roles = User::getAllRoles();
        require_once 'src/Views/register.php';
    }
    
    public function showLogin() {
        if (isset($_SESSION['user_id'])) {
            $this->redirectToDashboard();
            return;
        }
        
        require_once 'src/Views/login.php';
    }
    
    public function register() {
        $errors = [];
        
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $roleId = $_POST['role_id'] ?? '';
        
        // Validation
        if (empty($name)) {
            $errors[] = "Le nom est requis.";
        }
        
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Email invalide.";
        }
        
        if (empty($password) || strlen($password) < 6) {
            $errors[] = "Le mot de passe doit contenir au moins 6 caractères.";
        }
        
        if (empty($roleId)) {
            $errors[] = "Veuillez choisir un rôle.";
        }
        
        if (User::emailExists($email)) {
            $errors[] = "Cet email est déjà utilisé.";
        }
        
        // Si erreurs, réafficher le formulaire
        if (!empty($errors)) {
            $roles = User::getAllRoles();
            require_once 'src/Views/register.php';
            return;
        }
        
        // Créer l'utilisateur
        if (User::create($name, $email, $password, $roleId)) {
            header('Location: ' . BASE_URL . '/login?registered=1');
            exit;
        } else {
            $errors[] = "Erreur lors de l'inscription.";
            $roles = User::getAllRoles();
            require_once 'src/Views/register.php';
        }
    }
    
    public function login() {
        $errors = [];
        
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        
        if (empty($email) || empty($password)) {
            $errors[] = "Tous les champs sont requis.";
            require_once 'src/Views/login.php';
            return;
        }
        
        $user = User::findByEmail($email);
        
        if (!$user || !password_verify($password, $user['password'])) {
            $errors[] = "Email ou mot de passe incorrect.";
            require_once 'src/Views/login.php';
            return;
        }
        
        // Créer la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = User::getRoleName($user['role_id']);
        
        $this->redirectToDashboard();
    }
    
    public function logout() {
        session_destroy();
        header('Location: ' . BASE_URL . '/');
        exit;
    }
    
    private function redirectToDashboard() {
        $role = $_SESSION['user_role'] ?? null;
        
        if ($role) {
            header('Location: ' . BASE_URL . '/' . $role . '/dashboard');
            exit;
        }
        
        header('Location: ' . BASE_URL . '/');
        exit;
    }
}