function week() {
    var weeks, oraInizio, oraFine, text, fLen, i;
    weeks = ["Lunedì", "Martedì", "Mercoledi", "Giovedi", "Venerdì", "Sabato", "Domenica"];
    oraInizio = ["7:00"];
    oraFine = ["10:00"];
    fLen = weeks.length;

    text = "<table>\n" +
        "                                <thead>\n" +
        "                                <tr>\n" +
        "                                    <td>\n" +
        "                                        Giorno\n" +
        "                                    </td>\n" +
        "                                    <td>\n" +
        "                                        Ora di Inizio\n" +
        "                                    </td>\n" +
        "                                    <td>\n" +
        "                                        Ora di Fine\n" +
        "                                    </td>\n" +
        "                                </tr>\n" +
        "                                </thead>\n" +
        "                                 <tbody>\n" +
        "                                   <tr>\n"
    for (i = 0; i < fLen; i++) {
        text += "<td>" + weeks[i] + "</td>\n";
        text += "<td>" + oraInizio[0] + "</td>\n";
        text += "<td>" + oraFine[0] + "</td>\n";
        text +="</tr>"
    }
    text +="</tbody>"
    text += "</table>";

    document.getElementById("prenotazionePeriodo").innerHTML = text;
}

var i = 0;
function move() {
    if (i == 0) {
        i = 1;
        var elem = document.getElementById("myBar");
        var width = 1;
        var id = setInterval(frame, 10);
        function frame() {
            if (width >= 100) {
                clearInterval(id);
                i = 0;
            } else {
                width++;
                elem.style.width = width + "%";
            }
        }
    }
}

function insert() {
    /*document.getElementById('btn_aggiungi').onclick = function() {
        esempio_select_2 = document.getElementById('esempio_select_2');
        country_val = document.getElementById('esempio_text_1').value;
        if (country_val != '') {
            console.log(country_val);
            document.getElementById('esempio_text_1').value = '';
        } else {
            alert('Non hai inserito nessun valore.');
        }
    }*/

    var weeks, oraInizio, oraFine, stanza, text, fLen, i;
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    weeks = ["Lunedì", "Martedì", "Mercoledi", "Giovedi", "Venerdì", "Sabato", "Domenica"];
    oraInizio = ["7:00"];
    oraFine = ["10:00"];
    stanza = ["12", "26", "31", "6", "34", "27", "46"];
    fLen = weeks.length;

    text = "<table>\n" +
        "                                <thead>\n" +
        "                                <tr>\n" +
        "                                    <td>\n" +
        "                                        Giorno\n" +
        "                                    </td>\n" +
        "                                    <td>\n" +
        "                                        Turno\n" +
        "                                    </td>\n" +
        "                                    <td>\n" +
        "                                        Stanza\n" +
        "                                    </td>\n" +
        "                                    <td>\n" +
        "                                        Prenotato\n" +
        "                                    </td>\n" +
        "                                    <td>\n" +
        "                                        Modifica\n" +
        "                                    </td>\n" +
        "                                </tr>\n" +
        "                                </thead>\n" +
        "                                 <tbody>\n" +
        "                                   <tr>\n"
    for (i = 0; i < fLen; i++) {
        var giorno = (today.getDate())+i;
        text += "<td>" + giorno +'-'+(today.getMonth()+1)+'-'+today.getFullYear() + "</td>\n";
        text += "<td>" + oraInizio[0] + " - " + oraFine[0] + "</td>\n";
        text += "<td>" + stanza[i] + "</td>\n";
        text += "<td><div id='myProgress'><div id='myBar'></div></div></td>\n";
        text += "<td> <button id='btn_open_modal' onclick='modifica()'>Modifica</button> </td>\n";
        text +="</tr>"
    }
    text +="</tbody>"
    text += "</table>";

    document.getElementById("inserimento").innerHTML = text;
}

function modifica() {
    alert('da implemetare')
}