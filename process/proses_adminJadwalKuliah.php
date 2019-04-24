<?php
include "../config/connection.php";

function jadwalKuliah($con)
{
    $jadwalKuliah = "select tp.kode,tk.tingkat,tk.kode_kelas,tp.nama,ts.semester,count(tj.id_matkul) as jumlah_matkul,sum(tm.sks) as jumlah_sks from tabel_jadwal tj,tabel_kelas tk,tabel_prodi tp,tabel_semester ts,tabel_matkul tm
    where tj.id_kelas = tk.id_kelas
    and tj.id_prodi = tp.id_prodi
    and tj.id_semester = ts.id_semester
    and tj.id_matkul = tm.id_matkul
    group by tj.id_kelas";

    $resultJadwalKuliah = mysqli_query($con,$jadwalKuliah);
    return $resultJadwalKuliah;
}
?>