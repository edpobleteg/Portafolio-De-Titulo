
const username = document.getElementById("username")
const lastname = document.getElementById("lastname")
const mail = document.getElementById("mail")
const rut = document.getElementById("rut")
const password = document.getElementById("password")
const password2 = document.getElementById("password2")
const form = document.getElementById("form")
const paragraph = document.getElementById("warnings")
const submitButton = document.getElementById("submit-btn")

let timeout = null;

let errors = {
    name: true,
    lastname: true,
    rut: true,
    email: true,
    password: true,
    password2: true,
}

const mailformatRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

const nameRegex = /^[a-zA-ZÀ-ÿ\s]{1,40}$/

document.querySelectorAll('.form-box').forEach((box) => {
    const boxInput = box.querySelector('input');

    // let validatorRut = new ValidatorRut(rut.boxInput)

    boxInput.addEventListener('keydown', (event) => {

        clearTimeout(timeout);
        timeout = setTimeout(() => {
            // console.log(`Input ${boxInput.name} value: `, boxInput.value);

            validation(box, boxInput)
        },300);     
    });
});

validation = (box, boxInput) => {
    if(boxInput.value == ''){
        showError(true, box, boxInput);
    }else{
        showError(false, box, boxInput);
    }

    if(boxInput.name == 'name'){

        if(boxInput.value.length < 3){
            showError(true, box, boxInput);
        }
        else if(!boxInput.value.match(nameRegex)){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'lastname'){

        if(boxInput.value.length < 3){
            showError(true, box, boxInput);
        }
        else if(!boxInput.value.match(nameRegex)){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'email'){

        if(!boxInput.value.match(mailformatRegex)){
            showError(true, box, boxInput);
        }else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'rut'){
        let validatorRut = new ValidatorRut(boxInput.value)
        if(!validatorRut.isValid){
            showError(true, box, boxInput);
        }else{
            showError(false, box, boxInput);
        }
    }

    if(boxInput.name == 'password'){
        if(boxInput.value.length < 6){
            showError(true, box, boxInput);
        }else{
            showError(false, box, boxInput);
        }
    }

    if(boxInput.name == 'password2'){
        if(boxInput.value.length < 6){
            showError(true, box, boxInput);
        }if(boxInput.value != password.value){
            showError(true, box, boxInput);
        }else{
            showError(false, box, boxInput);
        }
    }

    submitController()
}

showError = (check, box, boxInput) => {
    if(check){
        box.classList.remove('form-success');
        box.classList.add('form-error');
        errors[boxInput.name] = true
    }else{
        box.classList.remove('form-error');
        box.classList.add('form-success');
        errors[boxInput.name] = false
    }
}

submitController = () => {
    if(errors.name || errors.lastname || errors.email || errors.rut || errors.password || errors.password2){
        submitButton.toggleAttribute('disabled', true)
    }
    else{
        submitButton.toggleAttribute('disabled', false)
    }
}

