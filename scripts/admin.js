/////////////////////////////////////////////////////////////////
//ADMIN
let formsEdit = document.querySelectorAll('.form-admin-edit');
formsEdit.forEach(form => {
    form.inputs = document.querySelectorAll('#' + form.id + ' input:not([type=button]');
    // console.log('INPUTS: ', form.inputs);
    // btn.style.display = 'none';

    form.inputs.forEach(input => {
        input.disabled = true;
    })
})
let btnsEditOn = document.querySelectorAll('.btn-edit-on');
let lastAbleOnEdit;

btnsEditOn.forEach(btn => {
    btn.addEventListener('click', function() {
        let form = document.querySelector('#form-edit-' + this.id);

        if(lastAbleOnEdit != undefined) {
            if(form == lastAbleOnEdit) {
                activeForm(form, false);
            }
            else {
                activeForm(lastAbleOnEdit, false);
                activeForm(form);
            }
        }
        else {
            activeForm(form);
        }
        console.log(lastAbleOnEdit);
    })
})

function activeForm(form, bool) {
    if(bool == true || bool == undefined) {
        form.classList.add('on-edit');
        form.inputs.forEach(input => {
            input.disabled = false;
        })
        lastAbleOnEdit = form;
    }
    else if (bool == false) {
        form.classList.remove('on-edit');
        form.inputs.forEach(input => {
            input.disabled = true;
        })
        lastAbleOnEdit = undefined;
    }

}

let btnsEditConfirm = document.querySelectorAll('.btn-edit-confirm');
btnsEditConfirm.forEach(btn => {
    btn.addEventListener('click', function() {
        console.log(lastAbleOnEdit);
        let form = lastAbleOnEdit;
        lastAbleOnEdit = undefined;
        form.submit();
    })
})