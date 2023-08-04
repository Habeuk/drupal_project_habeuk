# Composer template for Drupal projects by [habeuk.com](habeuk.com)

Installing drupal 9

Create a folder named (mkdir /website/my drupal), access this folder (cd /website/mydrupal) and run the command below:

```
composer create-project habeuk/drupal_project_habeuk:dev-9x public --no-interaction
```

This command creates a public folder and uploads the drupal files to it.
Access the public folder, run the following commands:

```
vendor/bin/drush site:install habeuk_profile
```

Follow the instructions to complete the drupal 9 installation.
The installation of the site ends with the creation of an administrator account.
You can use these identifiers to access your new website.
