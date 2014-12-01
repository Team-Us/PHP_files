<p>
        <center>
          <strong>Team US Java Help</strong>
          <?php
			//get user name and display here
			if (isset($_GET['uID'])){
			  $Name = getUserName($_GET['uID']); 
			  echo '<br><H2>';
			  echo $Name;
			  echo '</H2>';
			  $ActiveDate = getActiveDate($_GET['uID']); 
			  echo '<H2>Active since ';
			  echo $ActiveDate;
			  echo '</H2>';
			  $Instructor = getInstructor($_GET['uID']); 
			  echo '<H2>Instructor : ';
			  echo $Instructor;
			  echo '</H2>';
			
			}
			
		  ?>
        </center>
      </p>
