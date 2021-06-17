let titleMonth = document.querySelector('#date-picker h3');
// let calendar = document.querySelector('#calendar');
let calendarArrivee = document.querySelector('#calendar-arrivee');
let calendarDepart = document.querySelector('#calendar-depart');
//
let btnArrivee = document.querySelector('#btn-arrivee');
let btnDepart = document.querySelector('#btn-depart');
let btns = [btnArrivee, btnDepart];
btns.forEach(btn => {
    btn.addEventListener('click', function() {
        let index = btns.indexOf(this);

        btns.forEach(b => {
            if(btns.indexOf(b) == index) {
                b.classList.add('active');
            }
            else {
                b.classList.remove('active');
            }
        })
        // console.log(this.className);
    })
})
btnDepart.addEventListener('click', function() {
    calendarDepart.value = calendarArrivee.value;
    // console.log(calendarArrivee.value);
})
//
let btnSend = document.querySelector('#btn-send');
btnSend.addEventListener('click', function() {
    alert("du " + calendarArrivee.value + " au " + calendarDepart.value);
})
//calendar cases and listener
//on veux que les champs arrivée et depart du formulaire de depart soit remplis par un clic sur une case.
//on recupere le jour via l'id de la case, et le mois par le num de la section au moment du clic
let dayElement = document.querySelectorAll('.calendar-case');
dayElement.forEach(elt => {
    elt.addEventListener('click', function() {
        let date = new Date(calendarArrivee.value);
        date.setDate(this.id.replace('day-', ''));
        date.setMonth(parseInt(titleMonth.textContent) -1);
        // console.log('date', date);

        sendValueToActiveDateInput(formatDateToStr(date));
    })
})

function formatDateToStr(date) {
    let dateStr = date.getFullYear().toString(10) + '-' + formatMonth(date.getMonth()).toString(10) + '-' + formatDay(date.getDate()).toString(10);
    // console.log(dateStr)
    return dateStr;
}

function sendValueToActiveDateInput(dateStr) {
    let active = btnArrivee.classList.contains('active') ? calendarArrivee : calendarDepart;
    active.value = dateStr;

    let dateArrivee = new Date(calendarArrivee.value);
    let dateDepart = new Date(calendarDepart.value);

    if(active === calendarArrivee) {
        if(dateArrivee.getMonth() > dateDepart.getMonth() || dateArrivee.getDate() > dateDepart.getDate() ) {
            calendarDepart.value = calendarArrivee.value;
        }
    }
}

//on recupere le num du mois en cours
let actualMonth = new Date().getMonth();
// console.log(actualMonth);
let monthNum = actualMonth;

//on va recuperer les resa de la bdd sous forme d'objet: {arr, dep} -> fait dans l'interface.js
let reservations = [
    {arr: new Date('2021-01-02'), dep: new Date('2021-01-10')},
    {arr: new Date('2021-01-15'), dep: new Date('2021-01-18')},
];

setMonthNum(actualMonth);
//////////////////////////////////////////////////////
//BUTTONS FUNCTIONS
function setMonthNum(num) {
    if(num <= 11 && num >= 0) {
        monthNum = num;
        restartElements();

        //on descative les jours qui sont inclus dans les intervales réservés
        reservations.forEach(resa => {
            findIntervalInDays(resa.arr, resa.dep, monthNum);
        });
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

function restartElements() {
    let monthFormatNum = formatMonth(monthNum);

    //on change les valeurs affichée en html et on actualise la valeur du champ date:active
    titleMonth.textContent = monthFormatNum;
    sendValueToActiveDateInput('2021-' + monthFormatNum + "-01");

    //on remet le style des elements a zéro et on les réactive
    let days = document.querySelectorAll('[id*=day-]');
    days.forEach(day => {
        day.style.backgroundColor = "lightgrey";
        day.style.opacity = "1";
        day.disabled = false;
    })
}

function findIntervalInDays(arr, dep, monthNum) {
    let firstDay, lastDay;

    if(arr.getMonth() === monthNum) {
        firstDay = arr.getDate();
        lastDay = (dep.getMonth()) === monthNum ? dep.getDate() : 31;

        affectElements({firstDay, lastDay});
    }
}

function affectElements(interval) {
    console.log('will affect ' , interval);
    //boucle for: on part du premier jour, on s'arrete au dernier, et z chaque tour on agit sur le DOM
    for(let i = interval.firstDay; i <= interval.lastDay; i++) {
        let day = document.querySelector('[id*="' + i + '"]');
        // console.log(day.id);
        day.style.backgroundColor = "orange";
        day.style.opacity = "0.4";
        day.disabled = true;
    }
}


