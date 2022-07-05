<div class="main">
    <h1>Datalog</h1>
    <ul class="switch_logger">
        <li class="datalog_active">
            <a href="<?=BASEURL;?>/datalog/index/1">Tabel</a>
        </li>
        <li>
            <a href="<?=BASEURL;?>/datalog/intensitas">Grafik</a>
        </li>
    </ul>
    <?php Flasher::flash(); ?>
    <div class="table">
        <table cellpadding="15">
            <th>No.</th>
            <th>Device ID</th>
            <th>Rerata Suhu</th>
            <th>Rerata Kelembapan</th>
            <th>Rerata Intensitas Cahaya</th>
            <th>Waktu</th>

            <?php $i = 1; ?>
            <?php foreach($data['sensor'] as $value) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $value["device_id"]; ?></td>
                <td><?= $value["avgSuhu"]; ?> ° C</td>
                <td><?= $value["avgKelembapan"]; ?> %</td>
                <td><?= $value["avgIntensitasCahaya"]; ?> Lux</td>
                <td><?= $value["dd"]; ?> - <?= $value["hh"]; ?> : 00 WIB</td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>

    <ul class="page">
        <?php for($i = 1; $i<=2; $i++):?>
        <a href="<?=BASEURL;?>/datalog/index/<?=$i?>">
            <?php if($i == $data['halaman']):?>
            <li class="page_active"><?=$i?></li>
            <?php else: ?>
            <li><?=$i?></li>
            <?php endif; ?>
        </a>


        <?php endfor;?>

    </ul>

</div>