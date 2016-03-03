"use strict";
//Variables That are gotten from the dom based on thier classes and ID's
var textBoxes = document.getElementsByClassName("textBox");
var firstName= document.getElementById("fName");
var lastName = document.getElementById("lName");
var Gender= document.getElementById("gender");
var nameRegex = /^[A-Z][a-z]+$/;//regular expression that i use to check if it is a valid name in my eyes


function validForm(){//function that is called when I submit my forms that need to be Validated
    var formIsValid = true;//Boolean that I return to say whether it is valid or not
    for (var i = 0; i < textBoxes.length; i++) {//Checks everything that has the class "textbox" to see if they're empty
        if (textBoxes[i].value === "") {
            formIsValid = false;//sets the return variable false
            textBoxes[i].style.borderColor = "red";//sets a text box that caused that red
        }else{
            textBoxes[i].style.borderColor = "";//sets that text box to not red
        }
    }
    if(!nameRegex.test(firstName.value)){//checks the value in the first name box against my regular expression
        formIsValid = false;//sets the return variable false
        firstName.style.borderColor = "red";//sets a text box that caused that red
    }else{
        firstName.style.borderColor = "";//sets that text box to not red
    }
    if(!nameRegex.test(lastName.value)){//checks the value in the Last box against my regular expression
        formIsValid = false;//sets the return variable false
        lastName.style.borderColor = "red";//sets a text box that caused that red
    }else{
        lastName.style.borderColor = "";//sets that text box to not red
    }
    if(Gender.value=="M"||Gender.value=="F"){//checks the value in the gender textbox is M or F
        Gender.style.borderColor = "";//sets that text box to not red
    }else{
        formIsValid = false;//sets the return variable false
        Gender.style.borderColor = "red";//sets a text box that caused that red
    }

    return formIsValid;//returns my variable whether it is true or false
}

