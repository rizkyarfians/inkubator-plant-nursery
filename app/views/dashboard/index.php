<div class="main">
    <h1>Dashboard</h1>
    <?php Flasher::flash(); ?>
    <div class="container_main">
        <ul>
            <li class="card">
                <h3>Suhu Udara</h3>
                <h1 id="suhu_udara"><?= $data['sensor']['avgSuhu']; ?></h1>
            </li>
            <li class="card">
                <h3>Kelembaan Udara</h3>
                <h1 id="kelembapan_udara"><?= $data['sensor']['avgKelembapan']; ?></h1>
            </li>
            <li class="card">
                <h3>Level Air</h3>
                <h1 id="ketinggian_air"><?= $data['sensor']['avgLevel']; ?></h1>
            </li>
            <li class="card">
                <h3>Intensitas Cahaya</h3>
                <h1 id="intensitas_cahaya_label"><?= $data['sensor']['avgIntensitasCahaya']; ?></h1>
            </li>

            <li class="card control">
                <h3>Jenis Tanaman</h3>
                <h1 id="jenis_tanaman"><?= $data['form']['jenis_bibit'];  ?></h1>
                <h3>Tanggal Semai : </h3>
                <h3><strong><?= $data['form']['tanggal'];  ?></strong></h3>
                <h3>Estimasi Pindah Tanam : </h3>
                <h3><strong><?= $data['form']['estimate'];  ?></strong></h3>
                <button id="modalSeedButton" class="button-main">Tambah Data Baru</button>
            </li>


            <li class="card control">
                <div class="control">
                    <h3><strong>LED Growlight</strong></h3>
                    <section>
                        <h3>Status</h3>
                        <label class="switch">
                            <input type="checkbox" id="relay_led" <?php if($data['kontrol']['relayLed'] == 1) {
                                echo 'checked'; } ?>>
                            <span class=" slider round"></span>
                        </label>
                    </section>
                    <section class="range">
                        <h3>PWM LED</h3>
                        <h1 id="pwm_led_val"><?=$data['kontrol']['dutyLed'];?> %</h1>
                        <input type="range" value="<?=$data['kontrol']['dutyLed'];?>" id="led_pwm" min="0" max="100">
                        <button id="setLed">Set</button>
                    </section>
                </div>
            </li>
            <li class="card control">
                <div class="control">
                    <h3><strong>Kipas</strong></h3>
                    <section>
                        <h3>Status</h3>

                        <label class="switch">
                            <input type="checkbox" id="relay_fan" <?php if($data['kontrol']['relayFan'] == 1) {
                                echo 'checked'; } ?>>
                            <span class=" slider round"></span>
                        </label>
                    </section>
                    <section class="range">
                        <h3>PWM Kipas</h3>
                        <h1 id="pwm_fan_val"><?=$data['kontrol']['dutyFan'];?> %</h1>
                        <input type="range" value="<?=$data['kontrol']['dutyFan'];?>" id="fan_pwm" min="0" max="100">
                        <button id="setFan">Set</button>

                    </section>
                </div>
            </li>
            <li class="card control">
                <div class="control">
                    <h3><strong>Water Pump</strong></h3>
                    <section>
                        <h3>Status</h3>
                        <label class="switch">
                            <input type="checkbox" id="relay_pump">
                            <span class=" slider round"></span>
                        </label>
                    </section>

                </div>
            </li>
        </ul>

    </div>

</div>

<div class="modal new-seed">
    <h1>Input Data Pembibitan Baru</h1>
    <form action="" method="post">
        <label for="jenis">Jenis Tumbuhan</label><br>
        <select name="jenis" require>
            <option value="Pakcoy">Pakcoy</option>
            <option value="Selada">Selada</option>
        </select><br>
        <label for="tanggal">Tanggal</label><br>
        <input type="date" name="tanggal" required><br>
        <button type="submit">Submit</button>

    </form>

    <div class="button-wrapper">
        <button id="cancelButton">Batal</button>
    </div>
</div>