# ZendSkeletonApplication

## Exemple de création d'un CRUD (Create, Read, Update, Delete) sous Zf3

Issue du tutoriel officiel "In Depth Tutorial".

#### Tester sur votre localhost

Vous devez posséder git et composer sur votre machine

> git clone

> composer install

#### Bdd

**Schéma :**

Une première fois,
```
CREATE DATABASE `zf2`;
```

Et dans cette base,
```
CREATE TABLE posts (id INTEGER PRIMARY KEY AUTO_INCREMENT, title varchar(100) NOT NULL, text TEXT NOT NULL);

INSERT INTO posts (title, text) VALUES ('Blog #1', 'Welcome to my first blog post');
INSERT INTO posts (title, text) VALUES ('Blog #2', 'Welcome to my second blog post');
INSERT INTO posts (title, text) VALUES ('Blog #3', 'Welcome to my third blog post');
INSERT INTO posts (title, text) VALUES ('Blog #4', 'Welcome to my fourth blog post');
INSERT INTO posts (title, text) VALUES ('Blog #5', 'Welcome to my fifth blog post');
```

Le Db configuré par défaut dans le zip, dans **config/autoload/global.php**

```
'db' => [
        'driver'    => 'Pdo',
        'dsn'       => 'mysql:dbname=zf2;host=localhost;charset=utf8',

        // WARNING move in the local.php file
        'username'  => 'root',
        'password'  => '',
    ],
```

Une fois installé,
> Route de test à partir de votre localhost : **/blog**



