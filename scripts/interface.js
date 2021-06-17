let cards = document.querySelectorAll('.card');
let btnSeeMore = document.querySelectorAll('.btn-seemore');

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

let btnsClose = document.querySelectorAll('#card-close');
btnsClose.forEach(btn => {
    
    btn.addEventListener('click', function() {

        lastSelectedCard.classList.remove('focused-card');
        console.log('lastSelectedCard', lastSelectedCard);

    })
})

//focus the selected card
function focusOnTheSelectedCard(card) {
    if(lastSelectedCard != undefined) {
        lastSelectedCard.classList.remove('focused-card');
    }
    // console.log(card);
    card.classList.add('focused-card');

    lastSelectedCard = card;
}

