<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"
    integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container">
    <div class="main">
        <h1>Datalog</h1>
        <ul class="switch_logger">
            <li>
                <a href="<?=BASEURL;?>/datalog/index/1">Tabel</a>
            </li>
            <li class="datalog_active">
                <a href="<?=BASEURL;?>/datalog/grafik">Grafik</a>
            </li>
        </ul>
        <div class="container_select">
            <div class="upper">
                <div class="select">
                    <h3>Parameter</h3>
                    <img src="<?= BASEURL;?>/img/segitiga.png" alt="">
                </div>
                <button id="select_button"></button>
                <ul class="selection">
                    <li>
                        <a href="<?= BASEURL;?>/datalog/intensitas">
                            <h3>Intensitas Cahaya</h3>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL;?>/datalog/suhu">
                            <h3>Suhu</h3>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL;?>/datalog/kelembapan">
                            <h3>Kelembapan</h3>
                        </a>
                    </li>
                    <li>
                        <a href="<?= BASEURL;?>/datalog/tinggi">
                            <h3>Tinggi</h3>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="flexbox">
            <div class="grafik-container">
                <?php
                $hour = [];
                $avg = [];
             ?>
                <?php foreach($data['sensor'] as $sensor): ?>
                <?php
                $hour[] = $sensor['hh'];
                $avg[] = $sensor['avgVal'];

                ?>
                <?php endforeach; ?>
                <canvas id="myChart"></canvas>
                <script>
                const ctx = document.getElementById('myChart').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($hour);?>,
                        datasets: [{
                            label: <?= json_encode($data['judul']);?>,
                            data: <?php echo json_encode($avg);?>,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        maintainAspectRatio: false,
                    }
                });
                </script>

            </div>
            <!-- <div class="detail-list">
                <h3>Rerata Intensitas Cahaya
                    <h2><strong> 2032.1</strong></h2>
                </h3>
                <h3>Input Terakhir : <br>
                    <strong>
                        <h3 id="labelDate"></h3>
                    </strong>
                </h3>

            </div> -->
        </div>
    </div>
</div>

<div class="tambahModal">
    <h2>Jumlah Sampel</h2>
    <input type="text" placeholder="Masukkan Jenis Ikan" id="jenis_ikan">
    <input type="text" placeholder="Masukkan Jumlah Ikan" id="jumlah_ikan">
    <input type="number" placeholder="Masukkan Jumlah Sampel Ikan" id="jumlah_sample">
    <div class="button-wrapper">
        <button id="submit_sample">Tambah</button>
        <button id="cancelButton">Batal</button>
    </div>
</div>