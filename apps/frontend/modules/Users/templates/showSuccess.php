<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $users->getId() ?></td>
    </tr>
    <tr>
      <th>Uid:</th>
      <td><?php echo $users->getUid() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $users->getPassword() ?></td>
    </tr>
    <tr>
      <th>Username:</th>
      <td><?php echo $users->getUsername() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('Users/edit?id='.$users->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('Users/index') ?>">List</a>
