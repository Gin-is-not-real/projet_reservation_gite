class GinDatePicker {
    container;
    title;
    inputArrivee;
    inputDepart;
    btnArrivee;
    btnDepart;

    monthNum;

    unablesDays = [];

    constructor(id) {
        let strId = '#picker-' + id;
        this.container = document.querySelector(strId);
        this.title = document.querySelector(strId + ' .dp-title');

        this.monthNum = new Date().getMonth();
        this.setMonthNum(this.monthNum);

        this.inputArrivee = document.querySelector(strId + ' #calendar-arrivee');
        this.inputDepart = document.querySelector(strId + ' #calendar-depart');
        this.btnArrivee = document.querySelector(strId + ' #btn-arrivee');
        this.btnDepart = document.querySelector(strId + ' #btn-depart');

        this.initArrow(strId);

        console.log(id, this);
    }

    initArrow(pickerId) {
        let picker = this;
        document.querySelector(pickerId + ' .dp-down').addEventListener('click', function() {
            picker.setMonthNum(picker.monthNum - 1);
        })
        document.querySelector(pickerId + ' .dp-down').addEventListener('click', function() {
            picker.setMonthNum(picker.monthNum + 1);
        })
    }

    setMonthNum(num) {
        if(num <= 11 && num >= 0) {
            this.monthNum = num;
        }
        this.title.textContent = formatMonth(this.monthNum);
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