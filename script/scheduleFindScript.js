//grab all inner html from the <p> tags in schedule-finder.php, then set those values as the input values in the
//form on the same page

let fallP = document.getElementById("schedFall");
let fallPNotes = document.getElementById("schedFallNotes");
let fall = fallP.innerHTML; //saved value
let fallNotes = fallPNotes.innerHTML //saved notes value

let fallInput = document.getElementById("fall");
let fallTextInput = document.getElementById("fallText");
fallInput.setAttribute("value", fall);
fallTextInput.setAttribute("value", fallNotes);

//see if this works with spaced values,

