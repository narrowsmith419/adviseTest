//Create a Unique six (6) character identifier (TOKEN) / Populate token field with it
let longToken = crypto.randomUUID();
let token = longToken.substring(0,6);

let tokenField = document.getElementById("token");
tokenField.innerHTML = token;



