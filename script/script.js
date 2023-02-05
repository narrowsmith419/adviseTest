//Create a Unique six (6) character identifier (TOKEN) / Populate token field with it
let longToken = crypto.randomUUID();
let token = longToken.substring(0,6);

//show new token or previous token
let tokenField = document.getElementById("tokenDisplay");
let tokenInput = document.getElementById("token");


tokenField.innerHTML = token;
tokenInput.setAttribute('value', token);













