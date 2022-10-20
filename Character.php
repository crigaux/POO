<?php

    class Character {
        protected int $_health;
        protected int $_rage;

        public function __construct(int $health, int $rage){
            $this->_health = $health;
            $this->_rage = $rage;
        }

        public function getHealth():int{
            return $this->_health;
        }
        public function getRage():int{
            return $this->_rage;
        }

        public function setHealth(int $value):void{
            $this->_health = $value;
        }
        public function setRage(int $value):void{
            $this->_rage = $value;
        }
    }