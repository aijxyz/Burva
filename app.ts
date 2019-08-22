
console.log('hello world!' );

var monNom : string = 'julien';

console.log('valeur',monNom);
 
/// peut prendre tous les types

var x : any = 'Salut!'; 
  x = false; 

/////  type tuple

var y :[string , boolean] = ['Julien',true];

/// type multiple (union type}

var z: string | number;
 z = 'bonjour';
 console.log('valeu',z);

z=55;  
console.log('valeur',z);


//type objet

var data:{
    nom : string,
    age : number,
    maurié : boolean,
   }
  //fonction comme type

  var myFx : ()=>number;

  //aussi

   var myFx1 : (nom : string, age : number)=>any;

  // exemple

    var myFx1 : (nom : string , age : number)=>any;

     myFx1 = function(nom,age){

      return age*2;
     }

/// mon propre type(custom type) 

type mesFonctions=(nom : string, age : number) => number;

var maFonction : mesFonctions 
maFonction = function(nom,age) : number{

return age+5;

}

var tab1 :number[];
tab1=[4,5,6,];

var tab2:(string | number)[];

tab2=['azerty',2,'sdf',9];

interface meth{

  nom : string,
  age :number

}

/*function tripl(n: number): number {
  return 3 * n;
  }
  function doubl(n: number,y:number): number {
    return y * n;
    }*/
//flechée

var tast = (n: number, y: number)=>{
  return  3 * n;
}
