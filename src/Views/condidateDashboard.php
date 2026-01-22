<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Candidat</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }
        .navbar {
            background: #667eea;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .navbar h1 {
            font-size: 1.5em;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 20px;
            background: rgba(255,255,255,0.2);
            border-radius: 5px;
        }
        .navbar a:hover {
            background: rgba(255,255,255,0.3);
        }
        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .welcome {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }
        .welcome h2 {
            color: #333;
            margin-bottom: 10px;
        }
        .welcome p {
            color: #666;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .card h3 {
            color: #667eea;
            margin-bottom: 15px;
        }
        .info {
            margin: 10px 0;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <h1>TalentHub - Espace Candidat</h1>
        <a href="<?php echo BASE_URL; ?>/logout">Déconnexion</a>
    </nav>

    <div class="container">
        <div class="welcome">
            <h2>Bienvenue, <?php echo htmlspecialchars($user['name']); ?> !</h2>
            <p>Vous êtes connecté en tant que candidat.</p>
        </div>

        <div class="card">
            <h3>Mes informations</h3>
            <div class="info">
                <strong>Nom :</strong> <?php echo htmlspecialchars($user['name']); ?>
            </div>
            <div class="info">
                <strong>Email :</strong> <?php echo htmlspecialchars($user['email']); ?>
            </div>
            <div class="info">
                <strong>Rôle :</strong> Candidat
            </div>
        </div>
    </div>
</body>
</html>