const form = document.getElementById("form")
const submitButton = document.getElementById("submit-btn")

let timeout = null;

let errors = {
    name: true,
    address: true,
    phone: true,
    email: true,
    description: true,
    service_type_id: true,
    photo: true,
}

const mailformatRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ // Mail format XXX@XXX.XX

const nameRegex = /^[a-zA-ZÀ-ÿ\s]{1,40}$/ // Name format, only letters

const phoneRegex = /^(\+?56)?(\s?)(0?9)(\s?)[98765432]\d{7}$/ // Chilean number format +569XXXXXXXX

// Input text
document.querySelectorAll('.form-box-text').forEach((box) => {
    const boxInput = box.querySelector('input');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        validateInput(box, boxInput)
    })

});

// Textarea
document.querySelectorAll('.form-box-textarea').forEach((box) => {
    const boxInput = box.querySelector('textarea');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
    
        validateInput(box, boxInput) 

    })

});

// Select

document.querySelectorAll('.form-box-select').forEach((box) => {
    const boxInput = box.querySelector('select');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
    
        validateInput(box, boxInput) 

    })

});

function validateSelectSchedule(array) {
    let emptyField = 0; // sin errores

    if (array.length != 0) {
        array.forEach(value => {
            if (document.getElementById(value).value === '' || document.getElementById(value).value === null) {
                emptyField = 1; // error en los dias seleccionados
            }
        });
    } else {
        emptyField = 2; // sin dias seleccionados
    }
    return emptyField
}

// Input file
document.querySelectorAll('.form-box-file').forEach((box) => {
    const boxInput = box.querySelector('input');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
    
        validateInput(box, boxInput) 

    })

});


validateInput = (box, boxInput) => {
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

    if(boxInput.name == 'service_type_id'){

        if(boxInput.value == ''){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'photo'){

        if(boxInput.value == ''){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    submitController();

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
    if(errors.name || errors.address || errors.phone || errors.email || errors.description || errors.service_type_id || errors.photo){
        // console.log("Hay un error")
    }
    else{
        // console.log("Todo ok")
        form.submit();
    }
}
