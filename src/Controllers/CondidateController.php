<?php

class CandidateController {
    
    public function dashboard() {
        // Vérifier si connecté
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/login');
            exit;
        }
        
        // Vérifier le rôle
        if ($_SESSION['user_role'] !== 'candidate') {
            http_response_code(403);
            require_once 'src/Views/403.php';
            exit;
        }
        
        $user = User::findById($_SESSION['user_id']);
        require_once 'src/Views/candidate_dashboard.php';
    }
}