[
<?php $nb = count($userss); $i = 0; foreach ($userss as $url => $user): ++$i ?>
{
  "url": "<?php echo $url ?>",
<?php $nb1 = count($user); $j = 0; foreach ($user as $key => $value): ++$j ?>
  "<?php echo $key ?>": <?php echo json_encode($value).($nb1 == $j ? '' : ',') ?>
 
<?php endforeach ?>
}<?php echo $nb == $i ? '' : ',' ?>
 
<?php endforeach ?>
]