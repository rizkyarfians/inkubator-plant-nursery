<div class="main">
    <div class="container_main">
        <div class="subhead">
            <h2 class="subhead_text">Kontrol Perangkat</h2>
            <img src="<?= BASEURL;?>/img/kontrol.svg" alt="">
        </div>
        <ul class="wrapper_card_control">
            <li class="card control">
                <div class="control">
                    <h3><strong>LED Growlight</strong></h3>
                    <section>
                        <h3>Status</h3>
                        <label class="switch">
                            <input type="checkbox">
                            <span class=" slider round"></span>
                        </label>
                    </section>
                    <section>
                        <h3>Intensitas</h3>
                        <input type="range" value="0" id="intensitas_cahaya" min="0" max="255">
                        <button id="setLight">Set</button>
                    </section>
                </div>
            </li>
            <li class="card control">
                <div class="control">
                    <h3><strong>Kipas</strong></h3>
                    <section>
                        <h3>Status</h3>
                        <label class="switch">
                            <input type="checkbox">
                            <span class=" slider round"></span>
                        </label>
                    </section>
                    <section>
                        <h3>Kecepatan</h3>
                        <input type="range" value="0" id="fan_speed" min="0" max="255">
                        <button id="setSpeed">Set</button>
                    </section>
                </div>
            </li>
            <li class="card control">
                <div class="control">
                    <h3><strong>Mist Maker</strong></h3>
                    <section>
                        <h3>Status</h3>
                        <label class="switch">
                            <input type="checkbox">
                            <span class=" slider round"></span>
                        </label>
                    </section>
                    <section>
                        <h3>Counter</h3>
                        <input type="range" value="0" id="fan_speed" min="0" max="255">
                        <button id="setSpeed">Set</button>
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