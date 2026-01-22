# talenthub_auth

## Présentation du projet


TalentHub Auth est un système d'authentification multi-rôles développé en PHP natif, basé sur une architecture MVC faite maison (sans framework).
Ce projet représente le socle technique de la future plateforme de recrutement TalentHub.
Son objectif est de fournir une base solide, sécurisée, maintenable et réutilisable pour toutes les futures fonctionnalités (offres d’emploi, candidatures, messagerie, etc.).

## Objectifs pédagogiques


Implémenter une architecture MVC from scratch

Mettre en place un système de routage centralisé

Séparer clairement la logique métier, le contrôle et l’affichage

Mettre en œuvre un système d’authentification multi-rôles

Protéger les routes selon le rôle utilisateur

Comprendre les avantages d’une architecture MVC (maintenabilité, évolutivité)

## Rôles du système


Le système contient trois rôles :

Candidat

Peut s’inscrire et se connecter

Accède à : /candidate/dashboard

Toutes ses pages sont sous : /candidate/*

Recruteur

Peut s’inscrire et se connecter

Accède à : /recruiter/dashboard

Toutes ses pages sont sous : /recruiter/*

Admin

Ne peut pas s’inscrire (compte créé manuellement)

Accède à : /admin/dashboard

Toutes ses pages sont sous : /admin/*

## Fonctionnalités


### Authentification

Inscription (Candidat et Recruteur uniquement)

Connexion (tous les rôles)

Déconnexion

Hashage sécurisé des mots de passe avec password_hash()

Gestion des sessions PHP

### Gestion des rôles

Attribution automatique du rôle lors de l’inscription

Stockage du rôle en session

Redirection automatique après login selon le rôle

Vérification du rôle à chaque accès à une route protégée

## Sécurité


Requêtes préparées PDO pour éviter les injections SQL

Validation des entrées utilisateur (email, mot de passe)

Page 403 pour les accès non autorisés

Aucun mot de passe stocké en clair dans la base de données

Vérification de session sur chaque route protégée

## Structure du projet


Le projet est organisé comme suit :

talenthub-auth/
├── public/
│   └── index.php
│
├── src/
│   ├── Controllers/
│   │   ├── AuthController.php
│   │   ├── CandidateController.php
│   │   ├── RecruiterController.php
│   │   └── AdminController.php
│   │
│   ├── Services/
│   │   └── AuthService.php
│   │
│   ├── Models/
│   │   ├── User.php
│   │   └── Role.php
│   │
│   ├── Repositories/
│   │   ├── UserRepository.php
│   │   └── RoleRepository.php
│   │
│   ├── Views/
│   │   ├── auth/
│   │   │   ├── login.php
│   │   │   └── register.php
│   │   ├── candidate/
│   │   │   └── dashboard.php
│   │   ├── recruiter/
│   │   │   └── dashboard.php
│   │   ├── admin/
│   │   │   └── dashboard.php
│   │   └── errors/
│   │       └── 403.php
│   │
│   ├── Router.php
│   └── Database.php
│
├── config/
│   └── database.php
│
├── sql/
│   └── schema.sql
│
└── README.md


Tous les accès à l’application passent obligatoirement par :

public/index.php

Aucun fichier dans src n’est accessible directement depuis le navigateur.

## Architecture MVC


Flux d’une requête :

index.php → Router → Controller → Service → Repository → Model → View

Model : représente les entités (User, Role)

Repository : gère l’accès à la base de données (PDO)

Service : contient la logique métier (authentification, vérifications, etc.)

Controller : reçoit les requêtes et appelle les services

View : contient uniquement l’affichage (aucune logique métier)

## Base de données


Le projet utilise deux tables principales :

Table roles :

id

name (candidate, recruiter, admin)

Table users :

id

name

email

password

role_id

Le script de création de la base de données se trouve dans :

sql/schema.sql

## UML


Le projet contient :

Un diagramme de cas d’utilisation

Un diagramme de classes

Ces diagrammes décrivent les interactions des utilisateurs avec le système ainsi que la structure des classes principales (User, Role, etc.).

## Contraintes respectées


Architecture MVC sans framework

Utilisation de PDO avec requêtes préparées

Séparation claire des responsabilités

Sécurité des mots de passe avec password_hash

Protection des routes selon le rôle utilisateur

Un seul point d’entrée : public/index.php

## Auteur


Hajar Elmouhili 
