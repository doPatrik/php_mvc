<?php ?>

<div class="users_container">
  <h2>Users</h2>

  <table>
    <tr>
      <th>#</th>
      <th>Name</th>
    </tr>
    <?php foreach($viewData as $users) { ?>
    <tr>
      <td><?php echo $users->id ?></td>
      <td><?php echo $users->name ?></td>
    </tr>
    <?php } ?>
  </table>
</div>
