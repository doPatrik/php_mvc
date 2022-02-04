<?php ?>

<div class="advertisements_container">
  <h2>Advertisements</h2>

  <table>
    <tr>
      <th>#</th>
      <th>Title</th>
      <th>User</th>
    </tr>
    <?php foreach($viewData as $advertisement) { ?>
    <tr>
      <td><?php echo $advertisement->id ?></td>
      <td><?php echo $advertisement->title ?></td>
      <td><?php echo $advertisement->users->name ?></td>
    </tr>
    <?php } ?>
  </table>
</div>
