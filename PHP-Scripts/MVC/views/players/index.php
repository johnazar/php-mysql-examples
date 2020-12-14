<h1>Player CRUD</h1>

<p>
    <a href="/players/create" type="button" class="btn btn-sm btn-success">Add Player</a>
</p>
<form action="" method="get">
    <div class="input-group mb-3">
      <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $keyword ?>">
      <div class="input-group-append">
        <button class="btn btn-success" type="submit">Search</button>
      </div>
    </div>
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Photo</th>
        <th scope="col">First name</th>
        <th scope="col">Last name</th>
        <th scope="col">Positon</th>
        <th scope="col">Number</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($players as $i => $player) { ?>
        <tr>
            <th scope="row"><?php echo $i + 1 ?></th>
            <td>
                <?php if ($player['img']): ?>
                    <img src="/<?php echo $player['img'] ?>" alt="<?php echo $player['firstname'] ?>" class="player-img">
                <?php endif; ?>
            </td>
            <td><?php echo $player['firstname'] ?></td>
            <td><?php echo $player['lastname'] ?></td>
            <td><?php echo $player['pos'] ?></td>
            <td><?php echo $player['num'] ?></td>
            <td>
                <a href="/players/update?id=<?php echo $player['id'] ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                <form method="post" action="/players/delete" style="display: inline-block">
                    <input  type="hidden" name="id" value="<?php echo $player['id'] ?>"/>
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>