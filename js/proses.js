function simpan() {
    var nim = document.getElementById('nim').value;
    var nama = document.getElementById('nama').value;
    var tugas = document.getElementById('tugas').value;
    var uts = document.getElementById('uts').value;
    var uas = document.getElementById('uas').value;

    var xhr = new XMLHttpRequest();

    var params = "nim="+nim+"&nama="+nama+"&tugas="+tugas+"&uts="+uts+"&uas="+uas;
    var url = "./tambah.php";
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('tabel').innerHTML = xhr.responseText;
            bersih();
        }
    }
    xhr.open("POST", url, true);
    xhr.send(params);
}

function hapus(id) {
    var xhr = new XMLHttpRequest();
    var url = "./hapus.php?id=" + id;
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('tabel').innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", url, true);
    xhr.send();
}

function edit(id) {
    var xhr = new XMLHttpRequest();
    var url = "./edit.php?id=" + id;
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('edit').innerHTML = xhr.responseText;
        }
    }
    xhr.open("GET", url, true);
    xhr.send();
}

function simpanEdit(id) {
    var nim = document.getElementById('nim').value;
    var nama = document.getElementById('nama').value;
    var tugas = document.getElementById('tugas').value;
    var uts = document.getElementById('uts').value;
    var uas = document.getElementById('uas').value;

    var xhr = new XMLHttpRequest();

    var params = "nim="+nim+"&nama="+nama+"&tugas="+tugas+"&uts="+uts+"&uas="+uas;
    var url = "./edit.php?id=" + id;
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById('tabel').innerHTML = xhr.responseText;
        }
    }
    xhr.open("POST", url, true);
    xhr.send(params);
}

function bersih() {
    document.getElementById("nim").value = "";
    document.getElementById("nama").value = "";
    document.getElementById("tugas").value = "";
    document.getElementById("uts").value = "";
    document.getElementById("uas").value = "";
}