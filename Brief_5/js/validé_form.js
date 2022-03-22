function validation(){
    var valid = true;

    formLabels = document.getElementsByTagName("label");

    var nom = document.inscription.nom.value;
    var re_name = /^([A-Za-z]{4})+$/;
    if(!re_name.test(nom)){
        formLabels[0].innerHTML="Nom: [seul text et ajouter 4 alphabets ou plus ]";
        formLabels[0].style="color: red";
        valid = false;
    }
    else if( !isNaN(nom)){
        formLabels[0].innerHTML="nom: [Obligatoire seul text] ";
        formLabels[0].style="color: red";
        valid = false;
    }
    else {
        formLabels[0].innerHTML="Nom :";
        formLabels[0].style="color: black";
        valid = (valid) ? true : false;
    }
    var prénom = document.inscription.prénom.value;
    if(!re_name.test(prénom)){
        formLabels[1].innerHTML="Prénom: [seul text et ajouter 4 alphabets ou plus ]";
        formLabels[1].style="color: red";
        valid = false;
    }
    else if(!isNaN(prénom)){
        formLabels[1].innerHTML="Prénom: [Obligatoire seul text]";
        formLabels[1].style="color: red";
        valid = false;
    }
    else {
        formLabels[1].innerHTML="Last Name:";
        formLabels[1].style="color: black";
        valid = (valid) ? true : false;
    }
    var email = document.inscription.email.value;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(email==""){
        formLabels[2].innerHTML="Email: [Obligatoire]";
        formLabels[2].style="color: red";
        valid = false;
    }
    else if(!re.test(email)){
        formLabels[2].innerHTML="Email: [Adresse email incorrecte]";
        formLabels[2].style="color: red";
        valid = false;
    }
    else {
        formLabels[2].innerHTML="Email:";
        formLabels[2].style="color: black";
        valid = (valid) ? true : false;
    }
    var date_de_naissance = document.inscription.date_de_naissance.value;
    if(date_de_naissance==""){
        formLabels[3].innerHTML="Date de naissance: [Obligatoire date]";
        formLabels[3].style="color: red";
        valid = false;
    }
    else if( !isNaN(date_de_naissance)){
        formLabels[3].innerHTML="Date de naissance: [Obligatoire date]";
        formLabels[3].style="color: red";
        valid = false;
    }
    else {
        formLabels[3].innerHTML="Date de naissance:";
        formLabels[3].style="color: black";
        valid = (valid) ? true : false;
    }
    var password = document.inscription.password.value;
    if(password == ""){
        formLabels[4].innerHTML="Password: [Obligatoire]";
        formLabels[4].style="color: red";
        valid = false;
    }
    else if(password.length < 8){
        formLabels[4].innerHTML="Password: [Doit être > 8]";
        formLabels[4].style="color: red";
        valid = false;
    }
    else {
        formLabels[4].innerHTML="Password:";
        formLabels[4].style="color: black";
        valid = (valid) ? true : false;
    }



    return valid;
}
