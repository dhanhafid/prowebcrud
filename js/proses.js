function simpan() {
    var nim = document.getElementById("nim").value;
    var nama = document.getElementById("nama").value;
    var tugas = document.getElementById("tugas").value;
    var uts = document.getElementById("uts").value;
    var uas = document.getElementById("uas").value;

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    var url = "./simpan.php";
    var params = "nim="+nim+"&nama="+nama+"&tugas="+tugas+"&uts="+uts+"&uas="+uas;
    xmlhttp.open("POST", url, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("tabel").innerHTML = xmlhttp.responseText;
            bersih();
        }
    }

    xmlhttp.send(params);
}

function bersih() {
    document.getElementById("nim").value = "";
    document.getElementById("nama").value = "";
    document.getElementById("tugas").value = "";
    document.getElementById("uts").value = "";
    document.getElementById("uas").value = "";
}