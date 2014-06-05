<form action="<?php echo url_for('Customers/login') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" value="Zaloguj"/>
      </td>
    </tr>
  </table>
</form>