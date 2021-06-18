class GinDatePicker {
    container;
    title;
    inputArrivee;
    inputDepart;
    btnArrivee;
    btnDepart;

    monthNum;

    unablesDays = [];

    constructor(id, unables) {
        let strId = '#picker-' + id;
        this.strId = strId;
        this.container = document.querySelector(strId);
        this.title = document.querySelector(strId + ' .dp-title');

        this.inputArrivee = document.querySelector(strId + ' #calendar-arrivee');
        this.inputDepart = document.querySelector(strId + ' #calendar-depart');
        this.btnArrivee = document.querySelector(strId + ' #btn-arrivee');
        this.btnDepart = document.querySelector(strId + ' #btn-depart');

        this.unablesDays = unables;
        this.initListeners(strId);
        this.updateMonth(new Date().getMonth());

        console.log(id, this);
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

        this.dayElements = document.querySelectorAll(pickerId + ' .calendar-case');
        this.dayElements.forEach(elt => {
            elt.addEventListener('click', function() {
                let date = new Date(picker.inputArrivee.value);
                date.setDate(this.id.replace('day-', ''));
                date.setMonth(parseInt(picker.title.textContent) -1);
                picker.sendValueToActiveDateInput(formatDateToStr(date));
            })
        })
    }

    sendValueToActiveDateInput(dateStr) {
        let active = this.btnArrivee.classList.contains('active') ? this.inputArrivee : this.inputDepart;
        active.value = dateStr;
    
        let dateArrivee = new Date(this.inputArrivee.value);
        let dateDepart = new Date(this.inputDepart.value);
    
        if(active === this.inputArrivee) {
            if(dateArrivee.getMonth() > dateDepart.getMonth() || dateArrivee.getDate() > dateDepart.getDate() ) {
                this.inputDepart.value = this.inputArrivee.value;
            }
        }
    }
    setMonthNum(num) {
        if(num <= 11 && num >= 0) {
            this.monthNum = num;
        }
        // this.title.textContent = formatMonth(this.monthNum);

        // this.unablesDays.forEach(unab => {
        //     this.findIntervalInDays(unab.arr, unab.dep, this.monthNum);
        // })
    }

    updateMonth(num) {
        this.setMonthNum(num);
        this.restartElements();

        if(this.unablesDays != undefined) {
            this.unablesDays.forEach(unab => {
                this.findIntervalInDays(unab.arr, unab.dep, this.monthNum);
            })
        }
    }
    restartElements() {
        let monthFormatNum = formatMonth(this.monthNum);
        //on change les valeurs affichée en html et on actualise la valeur du champ date:active
        this.title.textContent = monthFormatNum;
        this.sendValueToActiveDateInput('2021-' + monthFormatNum + "-01");
    
        //on remet le style des elements a zéro et on les réactive
        this.dayElements.forEach(day => {
            day.style.backgroundColor = "lightgrey";
            day.style.opacity = "1";
            day.disabled = false;
        })
    }
    
    unablesDays() {

    }

    findIntervalInDays(arr, dep, monthNum) {
        let firstDay, lastDay;
    
        if(arr.getMonth() === monthNum) {
            firstDay = arr.getDate();
            lastDay = (dep.getMonth()) === monthNum ? dep.getDate() : 31;
    
            affectElements({firstDay, lastDay});
        }
    }
    
    //CHANGE HERE THE SEELCTOR

    affectElements(interval) {
        console.log('will affect ' , interval);
        //boucle for: on part du premier jour, on s'arrete au dernier, et z chaque tour on agit sur le DOM
        for(let i = interval.firstDay; i <= interval.lastDay; i++) {
            
            let day = document.querySelector(this.strID + ' #day-' + i);
            console.log("DAY: " + day);
            // console.log(day.id);
            day.style.backgroundColor = "orange";
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