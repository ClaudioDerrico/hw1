function checkName(event) {
    const input = event.currentTarget;
    
    /* if(formStatus[input.name] = /^[a-zA-Z]+$/.test(input.value)) { */
    if (input.value.length <= 0) {
        input.parentNode.parentNode.querySelector('span').textContent = "inserisci nome utente o cognome";
        input.parentNode.parentNode.classList.add('errorj');
        input.parentNode.parentNode.querySelector("span").classList.add("visibile");
        
        
    } else {
        input.parentNode.parentNode.classList.remove('errorj');
        document.querySelector(".username span").classList.add("hidden");
    }
    
  
}



function checkUsername(event) {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.parentNode.parentNode.classList.add('errorj');
        input.parentNode.parentNode.querySelector("span").classList.add("visibile");

        
    }   else{
        document.querySelector(".username span").classList.add("hidden");
        input.parentNode.parentNode.classList.remove('errorj');
    }
}

function checkEmail(event) {
    const input = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(input.value).toLowerCase())) {
        input.parentNode.parentNode.querySelector('span').textContent = "email non valida";
        input.parentNode.parentNode.classList.add('errorj');
        input.parentNode.parentNode.querySelector("span").classList.add("visibile");
    } 
    else{
        document.querySelector(".email span").classList.add("hidden");
        input.parentNode.parentNode.classList.remove('errorj');
    }
}

function checkPassword(event) {
    const input = event.currentTarget;
    
    /* if(formStatus[input.name] = /^[a-zA-Z]+$/.test(input.value)) { */
    if (input.value.length < 8) {
        input.parentNode.parentNode.querySelector('span').textContent = "inserisci una password valida";
        input.parentNode.parentNode.classList.add('errorj');
        input.parentNode.parentNode.querySelector("span").classList.add("visibile");
        
        
    } else {
        input.parentNode.parentNode.classList.remove('errorj');
        document.querySelector(".password span").classList.add("hidden");

    }
   
}

document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkName);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword); 


