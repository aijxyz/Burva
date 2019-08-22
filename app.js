console.log('hello world!');
var monNom = 'julien';
console.log('valeur', monNom);
/// peut prendre tous les types
var x = 'Salut!';
x = false;
/////  type tuple
var y = ['Julien', true];
/// type multiple (union type}
var z;
z = 'bonjour';
console.log('valeu', z);
z = 55;
console.log('valeur', z);
//type objet
var data;
//fonction comme type
var myFx;
//aussi
var myFx1;
// exemple
var myFx1;
myFx1 = function (nom, age) {
    return age * 2;
};
var maFonction;
maFonction = function (nom, age) {
    return age + 5;
};
var tab1;
tab1 = [4, 5, 6,];
var tab2;
tab2 = ['azerty', 2, 'sdf', 9];
/*function tripl(n: number): number {
  return 3 * n;
  }
  function doubl(n: number,y:number): number {
    return y * n;
    }*/
//flechée
var tast = function (n, y) {
    return 3 * n;
};
