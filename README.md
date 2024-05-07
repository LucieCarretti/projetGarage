# Projet Garage - Garage V.Parrot

EN
This folder contains the content for my car garage page web. The web site covers topics related to cars including:

Cars sales 
Services
Users
Web aesthetic
I welcome contributions from anyone who is interested in coding. Please feel free to submit pull requests with new posts or improvements to existing posts.

Contributing
To contribute to the blog, please follow these steps:

Fork the repository.
Clone your fork to your local machine.
Create a new branch for your contribution.
Make your changes to the files.
Commit your changes and push your branch to your fork.
Create a pull request to the main repository.
I will review your pull request and merge it if it meets the following criteria:

The post is relevant to the topic of the web site.
The post is well-written and informative.
The post is free of errors.
(If based on external sources) The post's original author is cited
I look forward to seeing your contributions!

FR
Ce dossier contient le contenu de mon site web sur le garage de V.Parrot. Le site couvre des sujets liés à la vente de voitures d'occasion, y compris :

Les Services vendues
La création et la gestion de comptes
Les contributions de toutes personnes intéressées par le codage sont les bienvenues. N'hésitez pas à soumettre des demandes d'ajout de nouveaux articles ou d'amélioration d'articles existants.

Contribuer
Pour contribuer au blog, veuillez suivre les étapes suivantes :

Dupliquez (fork) le dépôt.
Clonez-le sur votre machine locale.
Créez une nouvelle branche pour votre contribution.
Apportez vos modifications aux fichiers.
Validez vos modifications (commits) et poussez votre branche vers votre clone.
Créez une demande de tirage vers le dépôt principal.
J'examinerai votre demande et la fusionnerai si elle répond aux critères suivants :

L'article est pertinent pour le sujet du site web.
L'article est bien écrit et informatif.
L'article ne contient pas d'erreurs.
(S'il est basé sur des sources externes) L'auteur d'origine est cité.

J'attends avec impatience vos contributions !

## Télécharger le projet en local

Lancer l'invite de commandes puis se placer dans le dossier que vous souhaitez
```bash
cd le-chemin-vers-votre-dossier
```
Cloner le projet dans votre dossier
  ```bash
  git clone https://github.com/hichemchems/projetGarage.git
  ```
Se placer dans le dossier du projet
  ```bash
  cd projetGarage
  ```
Lancer le projet sur Visual Studio Code
  ```bash
  code .
  ```

## Installation de SQL et noSQL (framework Symfony)

Installer le framework Symfony 
Creer un nouveau projet
```symfony new --webapp nom_du_dossier```
installer le certificat d'authentification
```symfony server:ca:install```
installer mongodb 
```composer require mongodb/mongo db
composer require mongodb/mongodb-odm```
pour créer une base de donnée SQL
```symfony console doctrine:database:create```
depuis votre .env
lié votre base de donnée SQL
implémenter une entité dans une BDD
```symfony console make:user
symfony console make:migration
symfony console doctrine:migration:migrate (d:m:m)
symfony console make:entity nom_de_l'entité```
