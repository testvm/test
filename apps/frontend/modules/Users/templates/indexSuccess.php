<h1>Userss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Password</th>
      <th>Username</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($userss as $users): ?>
    <tr>
      <td><a href="<?php echo url_for('Users/show?id='.$users->getId()) ?>"><?php echo $users->getId() ?></a></td>
      <td><?php echo $users->getPassword() ?></td>
      <td><?php echo $users->getUsername() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('Users/new') ?>">New</a>
