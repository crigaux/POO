<?php

    class Hero extends Character {

        private string $_weapon;
        private int $_weaponDamage;
        private string $_shield;
        private int $_shieldValue;

        // Méthodes magiques
        public function __construct(int $health, int $rage, string $weapon, int $weaponDamage, string $shield, int $shieldValue){

            parent::__construct($health, $rage);

            $this->_weapon = $weapon;
            $this->_weaponDamage = $weaponDamage;
            $this->_shield = $shield;
            $this->_shieldValue = $shieldValue;
        }

        // public function __toString():string{
        //     return "<h2>Statistiques du personnage, $this->_health PV, $this->_rage de rage, arme principale : $this->_weapon $this->_weaponDamage dégats, $this->_shield $this->_shieldValue points d'armures<br></h2>";
        // }

        public function getWeapon():string{
            return $this->_weapon;
        }
        public function getWeaponDamage():int{
            return $this->_weaponDamage;
        }
        public function getShield():string{
            return $this->_shield;
        }
        public function getShieldValue():int{
            return $this->_shieldValue;
        }

        public function setWeapon(string $value):void{
            $this->_weapon = $value;
        }
        public function setWeaponDamage(int $value):void{
            $this->_weaponDamage = $value;
        }
        public function setShield(string $value):void{
            $this->_shield = $value;
        }
        public function setShieldValue(int $value):void{
            $this->_shieldValue = $value;
        }

        // Autres méthodes
        /**
         * @param mixed $damages
         * 
         * @return [type]
         */
        public function attacked(int $damages):string {
            $this->unrage();
            if($this->_shieldValue >= $damages){
                return "<span class=\"noDamages\">$damages</span>";
            } else {
                $damages = $damages - $this->_shieldValue;
                $this->_health -= $damages;
                if($this->_health <= 0){
                    return '<span class="heroDeath"></span>';
                } else {
                    return "<span class=\"damages\">$damages</span><span class=\"health\">$this->_health</span>";
                }
            }
        }

        /**
         * @return [type]
         */
        public function unrage():void {
            $this->_rage += 50;
        }
    }