    <!-- 
        for include this section, don't forget:
            
            - to link the js script: 
                <script src='datePicker.js' type="text/javascript"></script>

            - and the stylesheet:
                <link rel="stylesheet" href="datePicker.css">
    -->

    <!-- <section class="reservation-picker" data-numId="<?= $hebergement->getId(); ?>"> -->

        <div id="date-picker">
            <header>
                <input class='dp-down' type="button" value="<" >
                <h3 class="dp-title">MOIS</h3>
                <input class='dp-up' type="button" value=">">
            </header>
            
            <div id ="calendar">
                <input type="button" class="calendar-case" id="day-1" value="1">
                <input type="button" class="calendar-case" id="day-2" value="2">
                <input type="button" class="calendar-case" id="day-3" value="3">
                <input type="button" class="calendar-case" id="day-4" value="4">
                <input type="button" class="calendar-case" id="day-5" value="5">
                <input type="button" class="calendar-case" id="day-6" value="6">
                <input type="button" class="calendar-case" id="day-7" value="7">
                <input type="button" class="calendar-case" id="day-8" value="8">
                <input type="button" class="calendar-case" id="day-9" value="9">
                <input type="button" class="calendar-case" id="day-10" value="10">
                <input type="button" class="calendar-case" id="day-11" value="11">
                <input type="button" class="calendar-case" id="day-12" value="12">
                <input type="button" class="calendar-case" id="day-13" value="13">
                <input type="button" class="calendar-case" id="day-14" value="14">
                <input type="button" class="calendar-case" id="day-15" value="15">
                <input type="button" class="calendar-case" id="day-16" value="16">
                <input type="button" class="calendar-case" id="day-17" value="17">
                <input type="button" class="calendar-case" id="day-18" value="18">
                <input type="button" class="calendar-case" id="day-19" value="19">
                <input type="button" class="calendar-case" id="day-20" value="20">
                <input type="button" class="calendar-case" id="day-21" value="21">
                <input type="button" class="calendar-case" id="day-22" value="22">
                <input type="button" class="calendar-case" id="day-23" value="23">
                <input type="button" class="calendar-case" id="day-24" value="24">
                <input type="button" class="calendar-case" id="day-25" value="25">
                <input type="button" class="calendar-case" id="day-26" value="26">
                <input type="button" class="calendar-case" id="day-27" value="27">
                <input type="button" class="calendar-case" id="day-28" value="28">
                <input type="button" class="calendar-case" id="day-29" value="29">
                <input type="button" class="calendar-case" id="day-30" value="30">
                <input type="button" class="calendar-case" id="day-31" value="31">
            </div>
        </div>
        <form id="form-resa" action="index.php?action=add-resa&id=<?= $hebergement->getId(); ?>" method='post'>

            <div id="div-inputs">
                <div>
                    <input type="button" id="btn-arrivee" value="arrivée" class="active"></button>
                    <input name="calendar-depart" id="calendar-arrivee" type="date" disabled=true required>
                </div>
                <div>
                    <input type="button" id="btn-depart" value="depart"></button>
                    <input name="calendar-arrivee" id="calendar-depart" type="date" disabled=true required>
                </div>

                <input type="submit" id="sub-form-dates" name="sub-form-dates" hidden>
            </div>

            <div id="div-price">
                <input type="hidden" id="gnr-hidden-price" value="<?= $hebergement->getPrix(); ?>">
                <p>Prix: </p>
                <p id="gnr-price"></p>
            </div>

            <div id="div-mail">
                <label for="user-mail">Entrez votre mail:</label>
                <input type="email" name="user-mail" required>

                <input type="button" id="btn-send" value="envoyer"></button>
                <input type="submit" id="sub-send" hidden></button>
            </div>
        </form>
