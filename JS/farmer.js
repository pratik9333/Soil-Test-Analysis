// CODE FOR VALIDATING SIGNUP FORM FARMER //
var email_v = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
var letters = /^[A-Za-z]+$/;

document.getElementById('formSubmit').addEventListener('submit',(e)=>{
    let messages=[];
    if(document.getElementById('name').value.match(letters)){}
    else{
        messages.push("*incorrect name");
    }
    if(document.getElementById('age').value.length>2){
        messages.push("*incorrect age");
    }
    if(document.getElementById('aadhaar').value.length!=12){
        messages.push("*incorrect aadhar no");
    }       

    if(document.getElementById('contact').value.length!=10){
        messages.push("*incorrect contact no");
    }

    if(document.getElementById('email').value.match(email_v)){
    }
    else{
        messages.push("*incorrect email");
    }

    if(document.getElementById('fpassword').value===document.getElementById('lpassword').value){}
    else{
        messages.push("*password doesn't match");
    }

    if(messages.length>0){
        document.querySelector('.errors').textContent=messages.join(' ');
        e.preventDefault();
    }
    else{
        return true;
    }
});
// VALIDATING LOGIN FORM //
let lForm=document.getElementById('loginForm');
lForm.addEventListener('submit',(e)=>{
    let lemail=document.getElementById('loginEmail');    
    let msgs=[];
    if(lemail.value.match(email_v)){

    } 
    else{
        msgs.push('*Incorrect email');
        console.log(msgs);
    }

    if(msgs.length>0){
        document.querySelector('.l_errors').textContent=msgs.join(' ');
        e.preventDefault();
    }
    else{
        return true;
    }
});

function req(){
    var input=document.getElementsByTagName('input');
    if(document.getElementById("address").value==""){
        document.getElementById("address").className += " invalid";
        console.log(1);
    }
    for (i = 0; i < input.length; i++) {
        if (input[i].value == "") {
          input[i].className += " invalid";
        }
    }
}
