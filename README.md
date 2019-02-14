# RacineCRUD_CI
Version CodeIgniter du projet RacineCRUD.  
## Config  
Modifiez la config en fonction de votre environnement.  
Toute la config se trouve dans le dossier `application/config`.  
Mettre l'url menant vers le projet au niveau de la variable `$config['base_url']` dans `application/config/config.php`, puis renseignez la config de votre base de donnée (`hôte, mot de passe, etc`) au niveau de `application/config/database.php`.   
## Note
Veillez à ce que le `mod_rewrite` de votre serveur web soit activé afin de ne pas rencontrer de problème avec `l'URL Rewritting` mis en place au niveau du fichier `.htaccess` à la racine du projet.   