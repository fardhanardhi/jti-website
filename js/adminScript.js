// mahasiswa per tahun
var ctx = document.getElementById('mahasiswaPerTahun').getContext('2d')
var mahasiswaPerTahun = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["2013", "2014", "2015", "2016", "2017", "2018"],
    datasets: [{
      label: 'D4 - Teknik Informatika',
      data: [1400, 1000, 1600, 1300, 1400, 1400],
      backgroundColor: [
        '#40407A',
        '#40407A',
        '#40407A',
        '#40407A',
        '#40407A',
        '#40407A'
      ]
    }, 
    {
      label: 'D3 - Manajemen Informatika',
      data: [1200, 1200, 1400, 1200, 1200, 1200],
      backgroundColor: [
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7'
      ]
    }]
  },
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

// dosen per tahun
var ctx1 = document.getElementById('dosenPerTahun').getContext('2d')
var dosenPerTahun = new Chart(ctx1, {
  type: 'bar',
  data: {
    labels: ["2013", "2014", "2015", "2016", "2017", "2018"],
    datasets: [{
      label: 'Dosen',
      data: [350, 250, 400, 325, 350, 350],
      backgroundColor: [
        '#40407A',
        '#40407A',
        '#40407A',
        '#40407A',
        '#40407A',
        '#40407A'
      ]
    }]
  },
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

// berita per bulan
var ctx2 = document.getElementById('beritaPerBulan').getContext('2d')
var beritaPerBulan = new Chart(ctx2, {
  type: 'bar',
  data: {
    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    datasets: [{
      label: 'Berita',
      data: [8, 4, 11, 8, 16, 12, 15, 9, 10, 14, 2, 16],
      backgroundColor: [
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7'
      ]
    }]
  },
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

// kompen per tahun
var ctx3 = document.getElementById('kompenPerTahun').getContext('2d')
var kompenPerTahun = new Chart(ctx3, {
  type: 'bar',
  data: {
    labels: ["2013", "2014", "2015", "2016", "2017", "2018"],
    datasets: [{
      label: 'Semester Ganjil',
      data: [700, 500, 800, 650, 700, 700],
      backgroundColor: [
        '#40407A',
        '#40407A',
        '#40407A',
        '#40407A',
        '#40407A',
        '#40407A'
      ]
    }, 
    {
      label: 'Semester Genap',
      data: [600, 600, 700, 600, 600, 600],
      backgroundColor: [
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7',
        '#59ACE7'
      ]
    }]
  },
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