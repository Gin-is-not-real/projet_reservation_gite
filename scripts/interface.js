let cards = document.querySelectorAll('.card');
// let btnSeeMore = document.querySelectorAll('.btn-seemore');

// btnSeeMore.forEach(btn => {
//     btn.addEventListener('click', function() {
//         let cardId = btn.id.replace('seemore-', '');
//         cards.forEach(card => {
//             if(card.id == cardId) {
//                 focusOnTheSelectedCard(card);
//             }
//         })
//     })
// })

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
            lastSelectedCard = undefined;
            console.log('close', lastSelectedCard);
        }, 300);
    })
})

//focus the selected card
function focusOnTheSelectedCard(card) {
    if(lastSelectedCard != undefined && lastSelectedCard != card) {
        lastSelectedCard.classList.remove('focused-card');
        lastSelectedCard.classList.add('unfocused-card');
        console.log('lastSelectedCard != undefined');
    }
    //#
    if(lastSelectedCard == card) {
        console.log('lastSelectedCard == card');
    }
    else {
        card.classList.remove('unfocused-card');
        card.classList.add('focused-card');
        console.log('else');
    }
    lastSelectedCard = card;


    getHiddenReservationsDates(card);
    let picker = new GinDatePicker(card.id);
}


//recupere les inputs hidden ou on as stocké les résultats de la req
function getHiddenReservationsDates(card) {
    let id = card.id;
    let arrivees = document.querySelectorAll('.date_occupation-' + id.toString());
    let departs = document.querySelectorAll('.date_liberation-' + id.toString());

    if(arrivees.length > 0) {
        formatReservationsForDatePicker(arrivees, departs);
    }
}

function formatReservationsForDatePicker(arrivees, departs) {
    let reservations = [];
    
    for(let i = 0; i < arrivees.length; i++) {
        reservations.push({arr: new Date(arrivees[i].value), dep: new Date(departs[i].value)});
    }
    console.log(reservations);
}

