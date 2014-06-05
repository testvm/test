<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $customers->getId() ?></td>
    </tr>
    <tr>
      <th>Cid:</th>
      <td><?php echo $customers->getCID() ?></td>
    </tr>
    <tr>
      <th>Customername:</th>
      <td><?php echo $customers->getCustomername() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('Customers/edit?id='.$customers->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('Customers/index') ?>">List</a>
