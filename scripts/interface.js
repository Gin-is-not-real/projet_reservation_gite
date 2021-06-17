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

//focus the selected card
function focusOnTheSelectedCard(card) {
    if(lastSelectedCard != undefined && lastSelectedCard != card) {
        lastSelectedCard.classList.remove('focused-card');
        lastSelectedCard.classList.add('unfocused-card');
        console.log('lastSelectedCard != undefined');
    }

    if(lastSelectedCard == card) {
        console.log('lastSelectedCard == card');
    }
    else {
        card.classList.remove('unfocused-card');
        card.classList.add('focused-card');
        console.log('else');
    }
    lastSelectedCard = card;
}

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

