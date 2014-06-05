[
{
  "Status": <?php if(count($sf_user->getCredentials())>0){echo json_encode("Logged in");}else{echo json_encode("Not logged");} ?>
}
]