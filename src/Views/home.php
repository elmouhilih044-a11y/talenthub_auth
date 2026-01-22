<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TalentHub - Accueil</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            text-align: center;
            background: white;
            padding: 60px 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            max-width: 500px;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
            font-size: 2.5em;
        }
        p {
            color: #666;
            margin-bottom: 30px;
            font-size: 1.1em;
        }
        .buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }
        .btn {
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: transform 0.2s;
        }
        .btn:hover {
            transform: translateY(-2px);
        }
        .btn-primary {
            background: #667eea;
            color: white;
        }
        .btn-secondary {
            background: #48bb78;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>TalentHub</h1>
        <p>La plateforme qui connecte talents et opportunités</p>
        <div class="buttons">
            <a href="<?php echo BASE_URL; ?>/login" class="btn btn-primary">Connexion</a>
            <a href="<?php echo BASE_URL; ?>/register" class="btn btn-secondary">Inscription</a>
        </div>
    </div>
</body>
</html>