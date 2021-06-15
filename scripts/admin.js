let cards = document.querySelectorAll('.card');

cards.forEach(card => {
    card.addEventListener('click', function() {
        console.log(this.id);

        // let title = card.querySelector('h3');
        // let cat = card.querySelector('h4');
        // let descr = card.querySelector('p');
        // let nbr_lits = card.querySelector()

        // let fields = [title, cat, descr];
        // fields.forEach(field => {
        //     console.log(field);
        // })

    })
})

