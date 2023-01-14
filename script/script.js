//Create a Unique six (6) character identifier (TOKEN)
import {v4 as uuidv4} from 'uuid';
let test = uuidv4();
console.log(test);
console.log("Hello World");

function createUniqueToken(){
    let tokenLength = 6;
    let tokenCharacters = ['a','b','c','d','e','f','g','h','i'];
    let token = document.getElementById("token");
}