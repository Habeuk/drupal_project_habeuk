# Composer template for Drupal projects by habeuk.com

Installation de drupal 9

```
Creer un dossier nommé /siteweb/mydrupal, acceder à ce dossier et executer la commande ci-déssous:
```

cd /siteweb/mydrupal

```
composer create-project habeuk/drupal_project_habeuk:dev-10x public --no-interaction
```

Cette commande cree un dossier public et y telechage les fichiers de drupal. ( plus d'infos ).

```
Acceder au dossier public, executer les commande suivantes :
```

vendor/bin/drush site:install habeuk_profile

```
suivez les instructions afin de terminer l'installation de drupal 10.
```

L'installation du site se termine par la creation d'un compte adminitrateur.

```
Vous pouvez utiliser ces identifiant afin d'acceder à votre nouveaau site web.
```
