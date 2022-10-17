

const form = document.getElementById("form")
const submitButton = document.getElementById("submit-btn")

let timeout = null;

let errors = {
    name: true,
    address: true,
    phone: true,
    email: true,
    description: true,
    schedule: true,
    type: true,
}

const mailformatRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ // Mail format XXX@XXX.XX

const nameRegex = /^[a-zA-ZÀ-ÿ\s]{1,40}$/ // Name format, only letters

const phoneRegex = /^(\+?56)?(\s?)(0?9)(\s?)[98765432]\d{7}$/ // Chilean number format +569XXXXXXXX

document.querySelectorAll('.form-box-text').forEach((box) => {
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

document.querySelectorAll('.form-box-textarea').forEach((box) => {
    const boxInput = box.querySelector('textarea');

    // let validatorRut = new ValidatorRut(rut.boxInput)

    boxInput.addEventListener('keydown', (event) => {

        clearTimeout(timeout);
        timeout = setTimeout(() => {
            // console.log(`Input ${boxInput.name} value: `, boxInput.value);

            validation(box, boxInput)
        },300);     
    });
});

document.querySelectorAll('.form-box-select').forEach((box) => {
    const boxInput = box.querySelector('select');

    // let validatorRut = new ValidatorRut(rut.boxInput)

    boxInput.addEventListener('change', (event) => {

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

    if(boxInput.name == 'address'){

        if(boxInput.value.length < 5){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'phone'){

        if(!boxInput.value.match(phoneRegex)){
            showError(true, box, boxInput);
        }else{
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

    if(boxInput.name == 'description'){

        if(boxInput.value.length < 10){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'schedule'){

        if(boxInput.value.length < 5){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'type'){

        if(boxInput.value == ''){
            showError(true, box, boxInput);
        }
        else{
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
    if(errors.name || errors.address || errors.phone || errors.email || errors.description || errors.schedule || errors.type){
        submitButton.toggleAttribute('disabled', true)
    }
    else{
        submitButton.toggleAttribute('disabled', false)
    }
}

