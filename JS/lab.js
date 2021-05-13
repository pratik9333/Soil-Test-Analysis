// VALIDATING CODE FOR LAB
var email_v = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
var letters = /^[A-Za-z]+$/;
document.getElementById('formSubmit').addEventListener('submit',(e)=>{
    let messages=[];
    if(document.getElementById('lname').value.match(letters)){}
    else{
        messages.push('*incorrect name');
        console.log(2);
    }
    if(document.getElementById('lworkspace').value.match(letters)){}
    else{
        messages.push('*incorrect workspace');
        console.log(4);
    }
    if(document.getElementById('lcontact').value.length!=10){
        messages.push('*incorrect contact number');
    }
    if(document.getElementById('lemail').value.match(email_v)){}
    else{
        messages.push('*incorrect email');
    }
    if(document.getElementById('lfpassword').value===document.getElementById('lcpassword').value){}
    else{
        messages.push("*password doesn't match");
    }
    if(messages.length>0){
        e.preventDefault();
        document.querySelector('.lab_errors').textContent=messages.join(' ');
    }
    else{
        return true;
    }   
});
// VALIDATING LOGIN FORM //
let lForm=document.getElementById('loginForm');
lForm.addEventListener('submit',(e)=>{
    let labemail=document.getElementById('loginEmail');    
    let msgs=[];
    if(labemail.value.match(email_v)){} 
    else{
        msgs.push('*Incorrect email');
        console.log(msgs);
    }

    if(msgs.length>0){
        document.querySelector('.lab_errors').textContent=msgs.join(' ');
        e.preventDefault();
    }
    else{
        return true;
    }
});

function req(){
    var input=document.getElementsByTagName('input');
    for (i = 0; i < input.length; i++) {
        if (input[i].value == "") {
          input[i].className += " invalid";
        }
    }
}
