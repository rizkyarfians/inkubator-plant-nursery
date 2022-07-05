<div class="main">

    <h1>User List</h1>

    <?php Flasher::flash(); ?>
    <div class="table">
        <table cellpadding="15">
            <th>No.</th>
            <th>Username</th>
            <th>Role</th>
            <th>Device ID</th>
            <th>Edit</th>


            <?php $i = 1; ?>
            <?php foreach($data['user'] as $user) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $user["username"]; ?></td>
                <td><?= $user["role"]; ?></td>
                <td>aqua-111</td>
                <td>
                    <a class="modalEditButton" data-id=<?= $user['id']; ?>
                        href="<?= BASEURL;?>/user/profil/<?= $user['id'];?>">Edit</a>
                </td>

            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>