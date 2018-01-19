var formValid = document.getElementById('bouton_envoi');
var prenom = document.getElementById('identifiant');
var missPrenom = document.getElementById('missIdentifiant');
var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;

formValid.addEventListener('click', validation);

function validation(event){
    //Si le champ est vide

    if (identifiant.validity.valueMissing){
        event.preventDefault();
        missIdentifiant.textContent = 'login manquant';
        missIdentifiant.style.color = 'red';
    }else if (identifiantValid.test(identifiant.value) == false){
        event.preventDefault();
        missPrenom.textContent = 'Format incorrect';
        missIdentifiant.style.color = 'red';

    }else{
    }

}
