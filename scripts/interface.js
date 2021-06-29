let cardsContainer = document.querySelector('#cards');
let cards = document.querySelectorAll('.card');

let lastSelectedCard;
cards.forEach(card => {
    card.classList.add('unfocused-card');
    card.addEventListener('click', function() {
        focusOnTheSelectedCard(card);
    });
})

//close the focused card and replace them to this initial position
let btnsClose = document.querySelectorAll('#card-close');
btnsClose.forEach(btn => {
    btn.addEventListener('click', function() {
        lastSelectedCard.classList.remove('focused-card');
        lastSelectedCard.classList.add('unfocused-card');

        window.setTimeout(function() {
            resetStyle();

            lastSelectedCard = undefined;
            // console.log('close', lastSelectedCard);
        }, 300);
    })
})

//focus the selected card
function focusOnTheSelectedCard(card) {
    manageClassNames(card);
    lastSelectedCard = card;
    applyFocus(card);

    // getReservationsDates(card);
    let picker = new GnrDatePicker(card.id, getReservationsDates(card));
    // let picker = createADatePicker(card.id, getReservationsDates(card));
}

function manageClassNames(card) {
    if(lastSelectedCard != undefined && lastSelectedCard != card) {
        lastSelectedCard.classList.remove('focused-card');
        lastSelectedCard.classList.add('unfocused-card');
        // console.log('lastSelectedCard != undefined');
    }
    if(lastSelectedCard == card) {
        // console.log('lastSelectedCard == card');
    }
    if(lastSelectedCard != card) {
        card.classList.remove('unfocused-card');
        card.classList.add('focused-card');
        // console.log('else');
    }
}

function applyFocus() {
    document.querySelector('#sec-filters').style.opacity = '0.3';

    cards.forEach(card => {
        if(card.classList.contains('focused-card')) {
            card.style.border = '2px solid red';
            card.style.opacity = '1';
            // console.log(card.id + " " + card.className + " FOCUS");
        }
        else {
            card.style.border = '1px solid black';
            card.style.opacity = '0.3';
            // console.log(card.id + " " + card.className + " UNFOCUS");
        }
    })
}

function resetStyle() {
    document.querySelector('#sec-filters').style.opacity = '1';

    cards.forEach(card => {
        card.style.opacity = '1';
    });
}

//recupere les inputs hidden ou on as stocké les résultats de la req
function getReservationsDates(card) {
    let id = card.id;
    let arrivees = document.querySelectorAll('.date_occupation-' + id.toString());
    let departs = document.querySelectorAll('.date_liberation-' + id.toString());

    if(arrivees.length > 0) {
        return formatReservationsForDatePicker(arrivees, departs);
    }
}

function formatReservationsForDatePicker(arrivees, departs) {
    let reservations = [];
    
    for(let i = 0; i < arrivees.length; i++) {
        reservations.push({arr: new Date(arrivees[i].value), dep: new Date(departs[i].value)});
    }

    return reservations;
}


