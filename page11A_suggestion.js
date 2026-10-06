document.addEventListener("DOMContentLoaded", function () {
    var searchInput = document.getElementById("txt1");
    var hasilPublikasi = document.getElementById("hasilPublikasi");
    searchInput.addEventListener("input", function () {
        var keyword = searchInput.value;
        var xhr = new XMLHttpRequest();
        xhr.open(
            "GET",
            "page11A_gethint.php?keyword=" + encodeURIComponent(keyword),
            true
        );

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        var data = JSON.parse(
                            xhr.responseText
                        );

                        hasilPublikasi.innerHTML = "";

                        if (
                            !Array.isArray(data) ||
                            data.length === 0
                        ) {

                            hasilPublikasi.innerHTML = `

                                <tr>

                                    <td
                                        colspan="6"
                                        style="
                                            text-align:center;
                                            padding:25px;
                                        "
                                    >
                                        Publikasi tidak tersedia

                                    </td>
                                </tr>
                            `;
                            return;
                        }

                        data.forEach(function (row) {
                            var tr =
                                document.createElement("tr");
                            tr.innerHTML = `

                                <!-- NOMOR -->
                                <td>
                                    ${row.nomor}
                                </td>

                                <!-- JUDUL -->
                                <td>
                                    ${row.judul}
                                </td>

                                <!-- TANGGAL -->
                                <td>
                                    ${row.tanggal_rilis}
                                </td>

                                <!-- SAMPUL -->
                                <td>
                                    <img
                                        src="${row.sampul}"
                                        width="70"
                                        height="100"
                                        alt="Sampul Publikasi"
                                    >
                                </td>

                                <!-- SELENGKAPNYA -->
                                <td>
                                    <a
                                        href="${row.isi_publikasi}"
                                        target="_blank"
                                    >
                                        Lihat
                                    </a>
                                </td>

                                <!-- AKSI -->
                                <td>
                                    <!-- EDIT -->
                                    <a
                                        href="page09E.php?nomor=${encodeURIComponent(row.nomor)}"
                                        title="Edit Publikasi"
                                    >
                                        <img
                                            src="asset/edit.png"
                                            alt="Edit"
                                            style="
                                                width:25px;
                                                height:25px;
                                            "
                                        >
                                    </a>
                                    &nbsp;&nbsp;
                                    <!-- HAPUS -->
                                    <a
                                        href="page09F.php?nomor=${encodeURIComponent(row.nomor)}&sampul=${encodeURIComponent(row.sampul)}"
                                        title="Hapus Publikasi"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')"
                                    >
                                        <img
                                            src="asset/remove.png"
                                            alt="Hapus"
                                            style="
                                                width:30px;
                                                height:30px;
                                            "
                                        >

                                    </a>

                                </td>
                            `;
                            hasilPublikasi.appendChild(tr);
                        });
                    }
                    catch (error) {
                        console.error(
                            "JSON tidak valid:",
                            error
                        );

                        console.error(
                            "Response PHP:",
                            xhr.responseText
                        );
                    }
                }
                else {

                    console.error(
                        "AJAX gagal. Status:",
                        xhr.status
                    );
                }
            }
        };
        xhr.send();
    });
});