function week() {
    var weeks, text, fLen, i;
    weeks = ["Lunedì", "Martedì", "Mercoledi", "Giovedi", "Venerdì", "Sabato", "Domenica"];
    var oraInizio = document.getElementById('orari');
    var oraInizio1 = document.getElementById('orari2');
    var oraInizio2 = document.getElementById('orari4');
    var oraInizio3 = document.getElementById('orari6');
    var oraInizio4 = document.getElementById('orari8');
    var oraInizio5 = document.getElementById('orari10');
    var oraInizio6 = document.getElementById('orari12');
    oraInizio= [oraInizio.value, oraInizio1.value, oraInizio2.value, oraInizio3.value, oraInizio4.value, oraInizio5.value, oraInizio6.value,];
    var oraFine = document.getElementById('orari1');
    var oraFine1 = document.getElementById('orari3');
    var oraFine2 = document.getElementById('orari5');
    var oraFine3 = document.getElementById('orari7');
    var oraFine4 = document.getElementById('orari9');
    var oraFine5 = document.getElementById('orari11');
    var oraFine6 = document.getElementById('orari13');
    oraFine= [oraFine.value, oraFine1.value, oraFine2.value, oraFine3.value, oraFine4.value, oraFine5.value, oraFine6.value];
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
        text += "<td>" + oraInizio[i] + "</td>\n";
        text += "<td>" + oraFine[i] + "</td>\n";
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

function calcola() {
    var postiTotali = document.moduloCalcolaTurni.postiSala.value;
    var turno = document.moduloCalcolaTurni.durataTurno.value;
    var data = new Date();
    var oraInizio = (data.getHours()*3600);
    var oraFine = oraInizio + (3*3600);
    if (postiTotali === '') {
        alert('Dato non inserito')
    } else {
        numeroTurni = (((oraFine-oraInizio)/ turno)/60)
        insert()
    }
}

function insert() {
    var weeks, oraInizio, oraFine, stanza, text, fLen, i;
    var today = new Date();
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
        "                           </thead>\n" +
"                                   <tbody>\n" +
"                                       <tr>\n"
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
    var t = Math.floor((screen.height)/2);
    var l = Math.floor((screen.width)/3);
    var w = Math.floor((screen.width)/3);
    var h = Math.floor((screen.height)/3);
    var stile = "top="+t+", left="+l+", width="+w+", height="+h+", status=no, menubar=no, toolbar=no scrollbars=no";
    window.open('modifica.html', '', stile);
    var postiTotali = document.moduloCalcolaTurni.postiSala.value;
    var turno = document.moduloCalcolaTurni.durataTurno.value;
    var testoNumerico = postiTotali / turno;
    document.getElementsByTagName('P').add(testoNumerico);
}

function confirm() {
    alert('Inserimento dati avvennuto con successo')
    window.close()
}

function chiudi() {
    window.close();
}
