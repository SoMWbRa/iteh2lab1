const xhttp = new XMLHttpRequest();

function load_fid_ward() {
    var e = document.getElementById('0');
    var id_nurse = e.options[e.selectedIndex].text;
    xhttp.onload = function () {
        document.getElementById("demo").innerHTML = this.responseText;
    }
    xhttp.open("GET", "fid_ward.php?id_nurse=" + id_nurse, true);
    xhttp.send();
}

function load_id_nurse() {
    var e = document.getElementById('1');
    var department_id = e.options[e.selectedIndex].text;
    xhttp.onload = function () {
        var data = JSON.parse(this.responseText);
        var str = '';

        Object.values(data).forEach(function (value) {
            str += value['id_nurse'] + "&nbsp;";
        });

        document.getElementById("demo").innerHTML = str;
    }
    xhttp.open("GET", "id_nurse.php?department=" + department_id, true);
    xhttp.send();
}

function load_name_shift() {
    const xmlHttpRequest = new XMLHttpRequest();
    xmlHttpRequest.responseType = 'document';
    var e = document.getElementById('2');
    var shift = e.options[e.selectedIndex].text;

    xmlHttpRequest.onload = function () {
        var xmlDoc = this.responseXML;
        var nurse = xmlDoc.getElementsByTagName('nurse');

        var str = '';
        if (nurse[0].childNodes[0].childNodes.length == 0)
            str = 'not found';
        str += '<tr>';
        //alert(nurse[0].childNodes.length);
        for (var i = 0; i < nurse[0].childNodes.length; i++) {
            str += '&nbsp;';
            for (var j = 0; j < nurse[0].childNodes[i].childNodes.length; j++)
                str += '<td>'
                    + nurse[0].childNodes[i].childNodes[j].childNodes[0].nodeValue
                    + '</td>';
            str += '</tr>';
        }
        document.getElementById('demo').innerHTML = str;

    }
    xmlHttpRequest.open("GET", "name_shift.php?shift=" + shift, true);
    xmlHttpRequest.send();
}
