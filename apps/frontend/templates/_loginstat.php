<table>
    <thead>
	<tr>
	    <th><a href="<?php echo url_for('Users/index');?>">Użytkownicy</a></th>
	    <th><a href="<?php echo url_for('Customers/index');?>">Klienci</a></th>
	    <th>
		<?php
		if($sf_user->getCredentials()!=null)
		    {
			echo "<a href=\"".url_for('Users/logout')."\">Wyloguj</a>";
		    }
		?>
	    </th>
	</tr>
    </thead>
</table>
