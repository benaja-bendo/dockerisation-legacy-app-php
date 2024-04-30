# GESTION PRODUITS

## Prérequis
Cette application est compatible `PHP5` et a été testée avec une base de données `MySQL 5.7`.

## Installation
- Copier les fichiers du dossier `www` dans un dossier accessible par le serveur Web.
- Assurez vous que le dossier `uploads` est accessible en lecture et écriture par le serveur Web : `chmod 777 uploads`
- Importez la base de données test à partir du dump SQL `database/gestion_produits.sql`.
- Connectez vous à l'application avec l'url adaptée avec les informations suivantes :
    - Login : `admin`
    - Mot de passe : `password`

## Fonctionnalités
L'application permet de :
- Lister les produits
- Afficher la fiche produit en lecture seule
- Ajouter des produits
- Modifier les produits
- Supprimer les produits
- Pour chaque produit, il est possible d'ajouter autant de photos que nécessaire

---

# Dockerisation de l'application

### 1.Conteneurisation de l'application

1. Construire l'image Docker pour l'application PHP
```bash
docker build -t gestion_produits_php:latest -f Dockerfile .
```

2. Construire l'image Docker pour la base de données MySQL
```bash
docker build -t gestion_produits_mysql:latest -f Dockerfile-mysql .
```

3. Exécuter le conteneur MySQL
```bash
docker run --name gestion_produits_mysql -e MYSQL_ROOT_PASSWORD=root -d gestion_produits_mysql:latest
```

4. Exécuter le conteneur PHP et le lier au conteneur MySQL
```bash
docker run --name gestion_produits_php --link gestion_produits_mysql:db -p 80:80 -d gestion_produits_php:latest
```

### 2. Mise en place de Docker Compose

1. Construire les images Docker
```bash
docker-compose build
```

2. Exécuter les conteneurs
```bash
docker-compose up -d
```

3. Arrêter les conteneurs
```bash
docker-compose down
```

### 3. Version Dev: mise en place de la plateforme

1. se placer sur la branche dev
```bash
git checkout dev
```

2. Construire les images Docker
```bash
docker-compose build
```

3. Exécuter les conteneurs
```bash
docker-compose up -d
```

4. Arrêter les conteneurs
```bash
docker-compose down
```

### 4. Version PostgreSql 

1. se placer sur la branche dev
```bash
git checkout postgre-sql
```

2. Construire les images Docker
```bash
docker-compose build
```

3. Exécuter les conteneurs
```bash
docker-compose up -d
```

4. Arrêter les conteneurs
```bash
docker-compose down
```