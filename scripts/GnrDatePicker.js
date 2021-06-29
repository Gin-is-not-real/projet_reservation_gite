class GnrDatePicker {
    container;
    title;
    parentId;
    inputArrivee;
    inputDepart;
    btnArrivee;
    btnDepart;

    monthNum;

    unablesDays = [];

    constructor(containerId, unables) {
        let parentId = '#picker-' + containerId;
        this.parentId = parentId;
        this.container = document.querySelector(parentId);
        this.title = document.querySelector(parentId + ' .dp-title');

        this.inputArrivee = document.querySelector(parentId + ' #calendar-arrivee');
        this.inputDepart = document.querySelector(parentId + ' #calendar-depart');
        this.btnArrivee = document.querySelector(parentId + ' #btn-arrivee');
        this.btnDepart = document.querySelector(parentId + ' #btn-depart');

        this.unablesDays = unables;
        this.initListeners(parentId);
        this.updateMonth(new Date().getMonth());
        // console.log(parentId, this);
    }

    initListeners(pickerId) {
        let picker = this;
        //arrows
        document.querySelector(pickerId + ' .dp-down').addEventListener('click', function() {
            // picker.setMonthNum(picker.monthNum - 1);
            picker.updateMonth(picker.monthNum - 1);

        })
        document.querySelector(pickerId + ' .dp-up').addEventListener('click', function() {
            // picker.setMonthNum(picker.monthNum + 1);
            picker.updateMonth(picker.monthNum + 1);
        })

        //btns
        let btns = [this.btnArrivee, this.btnDepart];
        btns.forEach(btn => {
            btn.addEventListener('click', function() {
                let index = btns.indexOf(btn);
                btns.forEach(b => {
                    if(btns.indexOf(b) == index) {
                        b.classList.add('active');
                    }
                    else {
                        b.classList.remove('active');
                    }
                })
            })
        });
        this.btnDepart.addEventListener('click', function() {
            picker.inputDepart.value = picker.inputArrivee.value;
            // console.log(calendarArrivee.value);
        })

        this.subFormDates = document.querySelector('#sub-form-dates');
        this.subFormDates.addEventListener('click', function() {
            confirm('vous confirmez ?');
        })

        this.dayElements = document.querySelectorAll(pickerId + ' .calendar-case');
        this.dayElements.forEach(elt => {
            elt.addEventListener('click', function() {
                let date = new Date(picker.inputArrivee.value);

                //on lui assigne la valeur de la case cliquée
                date.setDate(this.value);
                date.setMonth(parseInt(picker.title.textContent) -1);

                picker.sendValueToActiveDateInput(formatDateToStr(date));
            })
        })

        let btnSend = document.querySelector(pickerId + ' #btn-send');
        btnSend.addEventListener('click', function() {

            let formResa = document.querySelector(pickerId +' #form-resa');
                if(formResa.checkValidity() ) {

                    if(picker.inputDepart.value == undefined || picker.inputDepart.value == '')  {
                        alert('Veuillez remplir tout les champs ');
                    }
                    else {
                        picker.inputArrivee.disabled = false;
                        picker.inputDepart.disabled = false;

                        if(confirm("Vous allez réserver du " + picker.inputArrivee.value + " au " + picker.inputDepart.value + '\n Confirmer ?')) {
                            //#envoyer mail
                            alert('Un mail va vous étre adresser, merci de verifier vos spams');
                            formResa.submit();
                        }
                    }
                }
                else {
                    alert('Veuillez remplir tout les champs ');
                }
        })
    }

    sendValueToActiveDateInput(dateStr) {
        //on cherche l'input actif et lui assigne la valeur envoyée par le picker
        let active = this.btnArrivee.classList.contains('active') ? this.inputArrivee : this.inputDepart;
        active.value = dateStr;
    
        //on instancie les dates a partir des valeurs d'inputs
        let dateArrivee = new Date(this.inputArrivee.value);
        let dateDepart = new Date(this.inputDepart.value);
    
        //on verifie que la date de depart est superieure a la date d'arrivée
        if(dateArrivee.getMonth() > dateDepart.getMonth()) {
            dateDepart.setMonth(dateArrivee.getMonth());
        }
        else if(dateArrivee.getMonth() == dateDepart.getMonth()) {
            if(dateArrivee.getDate() >= dateDepart.getDate()) {
                dateDepart.setDate(dateArrivee.getDate() + 1);
            }
        }

        //on réajuste les valeur d'inputs
        this.inputArrivee.value = formatDateToStr(dateArrivee);
        this.inputDepart.value = formatDateToStr(dateDepart);
        this.dateArrivee = dateArrivee;
        this.dateDepart = dateDepart;

        let priceDisplay = document.querySelector(this.parentId + ' #gnr-price');
        let priceHidden = document.querySelector(this.parentId + ' #gnr-hidden-price');

        // console.log('time arrivee: ' + dateArrivee.getTime(), 'time depart: ', dateDepart.getTime(), 'price: ', priceHidden.value);
        let nbrDays = dateDepart.getTime() - dateArrivee.getTime();

        // console.log((nbrDays /1000 /60/60/24) * priceHidden.value );
        priceDisplay.value = (nbrDays /1000 /60/60/24) * priceHidden.value;
        priceDisplay.textContent = priceDisplay.value + ' euro';

        this.styleActiveDayElements();
    }

    setMonthNum(num) {
        if(num <= 11 && num >= 0) {
            this.monthNum = num;
        }
    }

    updateMonth(num) {
        this.setMonthNum(num);

        this.restartElements();
        this.styleActiveDayElements();

        if(this.unablesDays != undefined) {
            this.madeUnablesDays();
        }
    }

    styleActiveDayElements() {
        this.dayElements.forEach(day => {
            if(day.value >= this.dateArrivee.getDate() && day.value <= this.dateDepart.getDate() ) {
                day.style.backgroundColor = "brown";
                day.style.color = "orange";
            }
            else {
                day.style.backgroundColor = "lightgrey";
                day.style.color = "black";
            }
        })
    }

    restartElements() {
        let monthFormatNum = formatMonth(this.monthNum);
        //on change les valeurs affichée en html et on actualise la valeur du champ date:active
        this.title.textContent = monthFormatNum;
        this.sendValueToActiveDateInput('2021-' + monthFormatNum + "-01");
        //on remet le style des elements a zéro et on les réactive
        let nbrDays = getNbrDaysInMonth(new Date(this.inputArrivee.value));

        this.dayElements.forEach(day => {
            // day.style.backgroundColor = "lightgrey";
            day.style.opacity = "1";
            day.disabled = false;

            if(day.value <= nbrDays) {
                day.style.display = 'block';
            }
            else {
                day.style.display = 'none';
            }
        })
    }

    /*
        TODO
        getNbrDaysInMonth()
        call this function for return the number of days of the current month, and hidde the 31
        if is necessary
    */

    madeUnablesDays() {
        this.unablesDays.forEach(unab => {
            this.findIntervalInDays(unab.arr, unab.dep, this.monthNum);
        })
        
        this.dayElements.forEach(day => {

            if(day.value <= getNbrDaysInMonth(this.dateArrivee)) {
                day.style.display = 'block';
            }
            else {
                day.style.display = 'none';
            }
        })
    }

    /*
        TODO
        clone this function or pass a param for able selection of reservation range
        there will affect style elements but not disable 
    */
    findIntervalInDays(arr, dep, monthNum) {
        let firstDay, lastDay;

        if(arr.getMonth() === monthNum) {
            firstDay = arr.getDate();
            lastDay = (dep.getMonth()) === monthNum ? dep.getDate() : 31;
    
            this.affectElements({firstDay, lastDay});
        }
    }
    
    affectElements(interval) {
        // console.log('will affect ' , interval);
        //boucle for: on part du premier jour, on s'arrete au dernier, et z chaque tour on agit sur le DOM
        for(let i = interval.firstDay; i <= interval.lastDay; i++) {
            
            let day = document.querySelector(this.parentId + ' #day-' + i);
            // console.log(day.id);
            day.style.backgroundColor = "rgba(255, 166, 0, 0.37)";
            day.style.opacity = "0.4";
            day.disabled = true;
        }
    }
}

//////////////////////////////////////////////////////
//FUNCTIONS
function formatMonth(number) {
    //on ajuste le num du mois car celui qu'on va recuperer partira de 0, et on veux aussi un format '01' et pas '1'
    let formatNum = number + 1;
    formatNum = formatNum < 10 ? '0' + formatNum : formatNum;
    return formatNum;
}
function formatDay(number) {
    //on ajuste le num du mois car celui qu'on va recuperer partira de 0, et on veux aussi un format '01' et pas '1'
    let formatNum = number;
    formatNum = formatNum < 10 ? '0' + formatNum : formatNum;
    return formatNum;
}
function formatDateToStr(date) {
    let dateStr = date.getFullYear().toString(10) + '-' + formatMonth(date.getMonth()).toString(10) + '-' + formatDay(date.getDate()).toString(10);
    // console.log(dateStr)
    return dateStr;
}

function getNbrDaysInMonth(date){
    return new Date(date.getFullYear(), date.getMonth()+1, -1).getDate()+1;
    // return new Date(picker.inputArrivee.value.getFullYear(), picker.monthNum +1, -1).getDate()+1;
}