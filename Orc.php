<?php
    require_once(__DIR__ .'/Character.php');

    /**
     * [Description Orc]
     */
    class Orc extends Character {
        private int $_damages;

        public function __construct(int $_health, int $_rage){
            parent::__construct($_health, $_rage);
            $this->_damages = rand(501, 950);
        }

        public function getDamages():int{
            return $this->_damages;
        }

        public function setDamages(int $value):void{
            $this->_damages = $value;
        }

        /**
         * Méthode permettant d'initialiser la valeur d'attaque de l'orc avec un nombre aléatoire
         * @return int
         */
        public function attack():int{
            return rand(600, 800);
        }
    }