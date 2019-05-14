var date = new Date()
var year = date.getFullYear()
// mahasiswa per tahun
$.ajax({
  url: "../process/admin_dataMahasiswa.php",
  method: "GET",
  success: function (data) {
    var jumlahTI = [0, 0, 0, 0, 0, 0]
    var jumlahMI = [0, 0, 0, 0, 0, 0]
    var label = [year - 5, year - 4, year - 3, year - 2, year - 1, year]

    for (var i in data) {
      if (data[i].prodi == 3) {
        if (data[i].tahun == year) {
          jumlahTI.splice(jumlahTI.length - 1, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 1) {
          jumlahTI.splice(jumlahTI.length - 2, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 2) {
          jumlahTI.splice(jumlahTI.length - 3, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 3) {
          jumlahTI.splice(jumlahTI.length - 4, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 4) {
          jumlahTI.splice(jumlahTI.length - 5, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 5) {
          jumlahTI.splice(jumlahTI.length - 6, 1, data[i].jumlah)
        }
      } else {
        if (data[i].tahun == year) {
          jumlahMI.splice(jumlahMI.length - 1, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 1) {
          jumlahMI.splice(jumlahMI.length - 2, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 2) {
          jumlahMI.splice(jumlahMI.length - 3, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 3) {
          jumlahMI.splice(jumlahMI.length - 4, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 4) {
          jumlahMI.splice(jumlahMI.length - 5, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 5) {
          jumlahMI.splice(jumlahMI.length - 6, 1, data[i].jumlah)
        }
      }
    }

    var chartdata = {
      labels: label,
      datasets: [
        {
          label: 'TI',
          backgroundColor: '#40407A',
          data: jumlahTI
        },
        {
          label: 'MI',
          backgroundColor: '#59ACE7',
          data: jumlahMI
        }
      ]
    };

    var ctx = $("#mahasiswaPerTahun")

    var mahasiswaPerTahun = new Chart(ctx, {
      type: 'bar',
      data: chartdata,
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }],
          xAxes: [{
            barThickness: 40
          }]
        },
        legend: {
          position: 'bottom'
        }
      }
    });
  },
  error: function (data) {
    console.log(data);
  }
})

// dosen per tahun
$.ajax({
  url: "../process/admin_dataDosen.php",
  method: "GET",
  success: function (data) {
    var jumlahDosen = [0, 0, 0, 0, 0, 0]
    var label = [year - 5, year - 4, year - 3, year - 2, year - 1, year]

    for (var i in data) {
      if (data[i].tahun == year) {
        jumlahDosen.splice(jumlahDosen.length - 1, 1, data[i].jumlah)
      } else if (data[i].tahun == year - 1) {
        jumlahDosen.splice(jumlahDosen.length - 2, 1, data[i].jumlah)
      } else if (data[i].tahun == year - 2) {
        jumlahDosen.splice(jumlahDosen.length - 3, 1, data[i].jumlah)
      } else if (data[i].tahun == year - 3) {
        jumlahDosen.splice(jumlahDosen.length - 4, 1, data[i].jumlah)
      } else if (data[i].tahun == year - 4) {
        jumlahDosen.splice(jumlahDosen.length - 5, 1, data[i].jumlah)
      } else if (data[i].tahun == year - 5) {
        jumlahDosen.splice(jumlahDosen.length - 6, 1, data[i].jumlah)
      }
    }

    var chartdata = {
      labels: label,
      datasets: [
        {
          label: 'Dosen',
          backgroundColor: '#40407A',
          data: jumlahDosen
        }
      ]
    };

    var ctx1 = $("#dosenPerTahun")

    var dosenPerTahun = new Chart(ctx1, {
      type: 'bar',
      data: chartdata,
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }],
          xAxes: [{
            barThickness: 40
          }]
        },
        legend: {
          display: false
        }
      }
    });
  },
  error: function (data) {
    console.log(data);
  }
})

// berita per bulan
$.ajax({
  url: "../process/admin_dataUploadBerita.php",
  method: "GET",
  success: function (data) {
    var jumlah = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
    var label = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"]

    for (var i in data) {
      jumlah.splice(data[i].bulan - 1, 1, data[i].jumlah)
    }

    var chartdata = {
      labels: label,
      datasets: [
        {
          label: 'Berita',
          backgroundColor: '#59ACE7',
          data: jumlah
        }
      ]
    };

    var ctx2 = $("#beritaPerBulan")

    var beritaPerBulan = new Chart(ctx2, {
      type: 'bar',
      data: chartdata,
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }],
          xAxes: [{
            barThickness: 40
          }]
        },
        legend: {
          display: false
        }
      }
    });
  },
  error: function (data) {
    console.log(data);
  }
})

// kompen per tahun
$.ajax({
  url: "../process/admin_dataKompen.php",
  method: "GET",
  success: function (data) {
    var jumlahTI = [0, 0, 0, 0, 0, 0]
    var jumlahMI = [0, 0, 0, 0, 0, 0]
    var label = [year - 5, year - 4, year - 3, year - 2, year - 1, year]

    for (var i in data) {
      if (data[i].prodi == 3) {
        if (data[i].tahun == year) {
          jumlahTI.splice(jumlahTI.length - 1, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 1) {
          jumlahTI.splice(jumlahTI.length - 2, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 2) {
          jumlahTI.splice(jumlahTI.length - 3, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 3) {
          jumlahTI.splice(jumlahTI.length - 4, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 4) {
          jumlahTI.splice(jumlahTI.length - 5, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 5) {
          jumlahTI.splice(jumlahTI.length - 6, 1, data[i].jumlah)
        }
      } else {
        if (data[i].tahun == year) {
          jumlahMI.splice(jumlahMI.length - 1, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 1) {
          jumlahMI.splice(jumlahMI.length - 2, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 2) {
          jumlahMI.splice(jumlahMI.length - 3, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 3) {
          jumlahMI.splice(jumlahMI.length - 4, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 4) {
          jumlahMI.splice(jumlahMI.length - 5, 1, data[i].jumlah)
        } else if (data[i].tahun == year - 5) {
          jumlahMI.splice(jumlahMI.length - 6, 1, data[i].jumlah)
        }
      }
    }

    var chartdata = {
      labels: label,
      datasets: [
        {
          label: 'TI',
          backgroundColor: '#40407A',
          data: jumlahTI
        },
        {
          label: 'MI',
          backgroundColor: '#59ACE7',
          data: jumlahMI
        }
      ]
    };

    var ctx3 = $("#kompenPerTahun")

    var kompenPerTahun = new Chart(ctx3, {
      type: 'bar',
      data: chartdata,
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }],
          xAxes: [{
            barThickness: 40
          }]
        },
        legend: {
          position: 'bottom'
        }
      }
    });
  },
  error: function (data) {
    console.log(data);
  }
})