<h1>Customerss List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Customername</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($customerss as $customers): ?>
    <tr>
      <td><a href="<?php echo url_for('Customers/show?id='.$customers->getId()) ?>"><?php echo $customers->getId() ?></a></td>
      <td><?php echo $customers->getCustomername() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('Customers/new') ?>">New</a>
