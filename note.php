<?php

    class Person{

        // public, propriétés accessible à l'intérieur et à l'extérieur de la classe
        // private, propriétés accessible à l'intérieur de la classe uniquement (à privilégier)
        // protected, propriétés accessible à l'intérieur de la classe et dans les classes enfants
        private $_firstname; 
        private $_eyeColor;
        private $_email;

        public function __contruct($firstname, $eyeColor, $email) {
            $this->_firstname = $firstname;
            $this->_eyeColor = $eyeColor;
            $this->_email = $email;
        }

        public function walk() {
            return "$this->_firstname se déplace";
        }

        // Déclaration d'un méthode statique
        public static function method($parameters) {
            // code...
        }
    }

    // class enfant de "Person"
    class Student extends Person {
        // code...
    }

    // Nouvel objet issue de la classe "Person"
    $claude = new Person('Claude', 'Rigaux', 'mail');

    // Hydratation de l'objet si attribut "public"
    // $claude->firstname = 'Claude';

    // Appel à une méthode statique
    Person::method($parameters);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php var_dump($claude) ?>
</body>
</html>