//Nama: Fildzah Nur Izzati
//NIM: 222413578
//Kelas: 2KS4

function validate06C() {

    let errorBox = document.getElementById("pesanError");

    errorBox.style.display = "none";
    errorBox.className = "";

    let nomor = document.getElementById("nomor").value;
    let judul = document.getElementById("judul").value;
    let tanggal = document.getElementById("tanggalrilis").value;

    let pesan = "";

    if (nomor === "") {
        pesan += "Nomor tidak boleh kosong<br>";
    } else if (!/^[0-9]+$/.test(nomor)) {
        pesan += "Masukkan nomor dalam angka<br>";
    }

    if (judul === "") {
        pesan += "Judul tidak boleh kosong<br>";
    } else if (!/^[a-zA-Z0-9 :\-]+$/.test(judul)) {
        pesan += "Terdapat karakter yang tidak valid pada judul<br>";
    }

    if (tanggal === "") {
        pesan += "Tanggal rilis tidak boleh kosong<br>";
    } else if (tanggal > hariIni) {
        pesan += "Tanggal rilis tidak boleh melebihi hari ini<br>";
    }

    if (pesan !== "") {
        errorBox.innerHTML = pesan;
        errorBox.style.display = "block";
        return false;
    }

    return true;
}