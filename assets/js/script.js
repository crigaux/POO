let container = document.querySelector('.container');
let knightContainer = document.querySelector('.knight img');
let evilKnightContainer = document.querySelector('.evilKnight img');
let evilKnightDamages = document.querySelector('.evilKnight');
let knightDamages = document.querySelector('.knight');
let button = document.querySelector('button');

let heroMaxLife = document.querySelector('.heroMaxLife').textContent;
let heroArmor = document.querySelector('.heroArmor').textContent;
let heroDamage = document.querySelector('.heroDamage').textContent;
let orcDamage = document.querySelector('.orcDamage').textContent;
let orcMaxLife = document.querySelector('.orcMaxLife').textContent;

let heroActualLife = 100;
let orcActualdamage = orcDamage - heroArmor;
let heroLifeLost = Math.round(100 - ((heroMaxLife - orcActualdamage) / heroMaxLife) * 100);
let orcActualLife = 100;
let orcLifeLost = Math.round(100 - ((orcMaxLife - heroDamage) / orcMaxLife) * 100);

function death() {
    knightContainer.setAttribute('src', './assets/img/goodKnight/knightDeath.gif');
}
function attack() {
    knightContainer.setAttribute('src', './assets/img/goodKnight/knightAttack.gif');
}
function hurt() {
    knightContainer.setAttribute('src', './assets/img/goodKnight/knightHurt.gif');
}
function idle() {
    knightContainer.setAttribute('src', './assets/img/goodKnight/knightIdle.gif');
}
function walk() {
    knightContainer.setAttribute('src', './assets/img/goodKnight/knightWalk.gif');
}
function jump() {
    knightContainer.setAttribute('src', './assets/img/goodKnight/knightJump.gif');
}

function evilKnightDeath() {
    evilKnightContainer.setAttribute('src', './assets/img/badKnight/evilKnightDeath.gif');
}
function evilKnightAttack() {
    evilKnightContainer.setAttribute('src', './assets/img/badKnight/evilKnightAttack.gif');
}
function evilKnightHurt() {
    evilKnightContainer.setAttribute('src', './assets/img/badKnight/evilKnightHurt.gif');
}
function evilKnightIdle() {
    evilKnightContainer.setAttribute('src', './assets/img/badKnight/evilKnightIdle.gif');
}
function evilKnightWalk() {
    evilKnightContainer.setAttribute('src', './assets/img/badKnight/evilKnightWalk.gif');
}
function evilKnightJump() {
    evilKnightContainer.setAttribute('src', './assets/img/badKnight/evilKnightJump.gif');
}


let results = document.querySelectorAll('.resultContainer > span');
let display = document.querySelector('.displayContainer');


walk();
evilKnightWalk();

setTimeout(() => {
    for(let i = 0 ; i < results.length ; i++) {
        setTimeout(() => {
            document.querySelector('.button').disabled = true;
            if(results[i].className == 'damages'){
                setTimeout(() => {
                    evilKnightAttack();
                    setTimeout(() => {
                        hurt();
                        heroActualLife -= heroLifeLost;
                        document.querySelector('.heroLife').style='width:'+heroActualLife+'%'
                        setTimeout(() => {
                            evilKnightIdle();
                            setTimeout(() => {
                                idle();
                            }, 800);
                        }, 200);
                    }, 400);
                }, 600);
            } else if(results[i].className == 'heroAttack'){
                setTimeout(() => {
                    knightContainer.style='filter: drop-shadow(16px 16px 20px red);';
                    attack();
                    setTimeout(() => {
                        evilKnightHurt();
                        orcActualLife -= orcLifeLost;
                        document.querySelector('.orcLife').style='width:'+orcActualLife+'%'
                        setTimeout(() => {
                            idle();
                            setTimeout(() => {
                                knightContainer.style='filter: none;';
                                evilKnightIdle();
                            }, 800);
                        }, 200);
                    }, 400);
                }, 600);
            } else if(results[i].className == 'orcDeath'){
                setTimeout(() => {
                    knightContainer.style='filter: drop-shadow(16px 16px 20px gold);';
                    attack();
                    setTimeout(() => {
                        evilKnightDeath();
                        document.querySelector('.orcLife').style='width:0%'
                        document.querySelector('h2').textContent = 'VICTOIRE !';
                        document.querySelector('h2').style = 'background-color:green;';
                        setTimeout(() => {
                            jump();
                        }, 300);
                    }, 600);
                }, 600);
            } else if(results[i].className == 'heroDeath'){
                setTimeout(() => {
                    evilKnightAttack();
                    setTimeout(() => {
                        death();
                        document.querySelector('.heroLife').style='width:0%'
                        document.querySelector('h2').textContent = 'DEFAITE...';
                        document.querySelector('h2').style = 'background-color:red;';
                        setTimeout(() => {
                            evilKnightJump();
                        }, 300);
                    }, 400);
                }, 600);
            }
            document.querySelector('.button').disabled = false;
        }, 1000 * i);
    }
}, 4500);