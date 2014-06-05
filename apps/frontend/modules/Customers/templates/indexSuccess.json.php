[
<?php $nb = count($customerss); $i = 0; foreach ($customerss as $url => $customer): ++$i ?>
{
  "url": "<?php echo $url ?>",
<?php $nb1 = count($customer); $j = 0; foreach ($customer as $key => $value): ++$j ?>
  "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>
 
<?php endforeach ?>
}<?php echo $nb == $i ? '' : ',' ?>
 
<?php endforeach ?>
]