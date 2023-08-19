function nameValidation(){
    let firstName = document.getElementById("your_name");
    let nameValue = document.getElementById('your_name').value;
    const namePattern = /^(?=.*\S)[a-zA-Z\s]+$/;
    if(nameValue.length<6 || !namePattern.test(nameValue)){
        firstName.style.outline = '2px solid red'
        firstName.style.border = 'none'
        return false
    }else if(nameValue.length>=6){
        firstName.style.outline = '2px solid green'
        firstName.style.border = 'none'
        return true
    }
}

function emailValidation(){
    let yourEmail = document.getElementById("your_email");
    let emailValue = document.getElementById('your_email').value;
    const emailPattern = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i;
    if(!emailPattern.test(emailValue)){
        yourEmail.style.outline = '2px solid red'
        yourEmail.style.border = 'none'
        return false
    }else{
        yourEmail.style.outline = '2px solid green'
        yourEmail.style.border = 'none'
        return true
    }
}

function passwordValidation(){
    let password = document.getElementById("your_password");
    let passwordValue = document.getElementById('your_password').value;
    const passwordPattern = /^(?=.*\S)[a-zA-Z\s]+$/;
    if(passwordValue.length<6 || !passwordPattern.test(passwordValue)){
        password.style.outline = '2px solid red'
        password.style.border = 'none'
        return false
    }else{
        password.style.outline = '2px solid green'
        password.style.border = 'none'
        return true
    }
}

function selectValidation(field,inputValue){
    let value = inputValue;
    
    if(value == ''){
        field.style.outline = '2px solid red'
        field.style.border = 'none'
        return false
    }else{
        field.style.outline = '2px solid green'
        field.style.border = 'none'
        return true
    }
}
let role = document.getElementById('role');
role.addEventListener('input',()=>selectValidation(role,role.value));

let city = document.getElementById('city');
city.addEventListener('input',()=>selectValidation(city,city.value));

let bloodGroup = document.getElementById('bloodgroup');
bloodGroup.addEventListener('input',()=>selectValidation(bloodGroup,bloodGroup.value));

let gender = document.getElementById('gender');
gender.addEventListener('input',()=>selectValidation(gender,gender.value));


function simpleValidation(field,inputValue){
    const Pattern = /^(?=.*\S)[a-zA-Z\s]+$/;
    if(inputValue == "" || inputValue.length<6 || !Pattern.test(inputValue)){
        field.style.outline = '2px solid red'
        field.style.border = 'none'
    }else{
        field.style.outline = '2px solid green'
        field.style.border = 'none'
    }
}

let address = document.getElementById('your_address');
address.addEventListener("input",()=>simpleValidation(address,address.value));

function mostsimpleValidation(field,inputValue){
    if(inputValue == ""){
        field.style.outline = '2px solid red'
        field.style.border = 'none'
    }else{
        field.style.outline = '2px solid green'
        field.style.border = 'none'
    }
}
let weight = document.getElementById('your_weight');
weight.addEventListener("input",()=>mostsimpleValidation(weight,weight.value));
let height = document.getElementById("your_height");
height.addEventListener("input",()=>mostsimpleValidation(height,height.value));

function dateOfBirthValidation(field,inputValue){
    let currentDate = new Date();
    let year = currentDate.getFullYear();
    let month = String(currentDate.getMonth() + 1).padStart(2, '0');
    let day = String(currentDate.getDate()).padStart(2, '0');
    let formattedDate = `${year}-${month}-${day}`;
    if(formattedDate<inputValue){
        field.style.outline = '2px solid red'
        field.style.border = 'none'
    }else{
        field.style.outline = '2px solid green'
        field.style.border = 'none'
    }
}
let date = document.getElementById('your_date');
date.addEventListener("input",()=>simpleValidation(date,date.value));
date.addEventListener("input",()=>dateOfBirthValidation(date,date.value));





function contactNumberValidation(field,inputValue){
    const regex = /^(\+92|0)?[1-9]\d{9}$/;
    if(!regex.test(inputValue)){
        field.style.outline = '2px solid red'
        field.style.border = 'none'
    }else{
        field.style.outline = '2px solid green'
        field.style.border = 'none'
    }
}
let contact = document.getElementById('your_phone');
contact.addEventListener("input",()=>contactNumberValidation(contact,contact.value))




function formValidation(){
    if(nameValidation() && emailValidation() && passwordValidation()){
        let errorArray = []
        let role = document.getElementById('role');
        if(role.value == ''){
            role.style.outline = '2px solid red'
            role.style.border = 'none'
            errorArray.push(false)
        }else{
            role.style.outline = '2px solid green'
            role.style.border = 'none'
        }
        let city = document.getElementById('city');
        if(city.value == ''){
            city.style.outline = '2px solid red'
            city.style.border = 'none'
            errorArray.push(false)
        }else{
            city.style.outline = '2px solid green'
            city.style.border = 'none'
        }
        let bloodGroup = document.getElementById('bloodgroup');
        if(bloodGroup.value == ''){
            bloodGroup.style.outline = '2px solid red'
            bloodGroup.style.border = 'none'
            errorArray.push(false)
        }else{
            bloodGroup.style.outline = '2px solid green'
            bloodGroup.style.border = 'none'
        }
        let gender = document.getElementById('gender');
        if(gender.value == ''){
            gender.style.outline = '2px solid red'
            gender.style.border = 'none'
            errorArray.push(false)
        }else{
            gender.style.outline = '2px solid green'
            gender.style.border = 'none'
        }

        let address = document.getElementById('your_address');
        if(address.value == "" || address.length<6){
            address.style.outline = '2px solid red'
            address.style.border = 'none'
            errorArray.push(false)
        }else{
            address.style.outline = '2px solid green'
            address.style.border = 'none'
        }

        let contact = document.getElementById('your_phone');
        const contactPattern = /^(\+92|0)?[1-9]\d{9}$/;
        if(!contactPattern.test(contact.value)){
            contact.style.outline = '2px solid red'
            contact.style.border = 'none'
            errorArray.push(false)
        }else{
            contact.style.outline = '2px solid green'
            contact.style.border = 'none'
        }

        let date = document.getElementById('your_date');
        let currentDate = new Date();
        let year = currentDate.getFullYear();
        let month = String(currentDate.getMonth() + 1).padStart(2, '0');
        let day = String(currentDate.getDate()).padStart(2, '0');
        let formattedDate = `${year}-${month}-${day}`;
        if(date.value == '' || formattedDate<date.value){
            date.style.outline = '2px solid red'
            date.style.border = 'none'
            errorArray.push(false)
        }else{
            date.style.outline = '2px solid green'
            date.style.border = 'none'
        }

        let weight = document.getElementById('your_weight');
        if(weight.value == ""){
            weight.style.outline = '2px solid red'
            weight.style.border = 'none'
            errorArray.push(false)
        }else{
            weight.style.outline = '2px solid green'
            weight.style.border = 'none'
        }

        let height = document.getElementById('your_height');
        if(height.value == ""){
            height.style.outline = '2px solid red'
            height.style.border = 'none'
            errorArray.push(false)
        }else{
            height.style.outline = '2px solid green'
            height.style.border = 'none'
        }

        if(errorArray.includes(false)){
            return false
        }else{
            return true
        }

    }else{
        return false
    }
}




