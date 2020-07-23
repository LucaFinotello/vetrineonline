function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

function creaPdf() {
    var doc = new jsPDF();
    var data = document.getElementById("data").value;
    var fascia = document.getElementById("fascia").value;
    var turno = document.getElementById("turno").value;
    var stanza = document.getElementById("stanza").value;

    var host = "VetrineOnline.com";

    doc.setFontSize(35)
    doc.text(60, 20, host);
    doc.setFontSize(12)
    doc.text(70, 40, 'Data: ' + data);
    doc.text(70, 50, 'Fascia: ' + fascia);
    doc.text(70, 60, 'Turno: ' + turno);
    doc.text(70, 70, 'Stanza: ' + stanza);
    doc.addPage();

    // Save the PDF
    doc.save('prenotazione.pdf');

}