<?php //this file is used to only store functions. This page is entirely unaccessable to users. No HTML here!
       // this function establishes a connection to the database, it displays messages if connection fails or if the database is unusable.
       function connectToDatabase()
       {
            
            $dbConnection=mysql_connect('localhost','root','letM31n');
            if(!$dbConnection)
            {
                die('<!--Unable to connect to database [' . mysql_error() . ']-->');
            }
            else
            {
                echo "<!--You have Connected to the DB Server.-->";
                
            }
             $db_selected= mysql_select_db('CSIS2450',$dbConnection);
            if(!$db_selected)
            {
                die('<!--Can\'t use CSIS2450 at :'.mysql_error().'-->');
            }
            else
            {
                echo "<br><!-- You connected to the CSIS2450-->";
                return $dbConnection;
            }
       }   
   
        //this functions accesss the database CSIS2450 and table Exercises to get the data for display and answer comparison.
       function getPromptData($eid)
       {
           $dbConnection=connectToDatabase();
           //build query
           $query="select * from Exercises where ExerciseId =".$eid;
           //run the query
           $selected=  mysql_query($query,$dbConnection);
           //return the database array to use later for answer checking and displaying the prompt
           $rows=mysql_fetch_array($selected);
           mysql_close($dbConnection);
           return $rows; 
       } 
       // this function compares the userEntry with the database options
       function checkResponse($dbAnswer, $userEntry)
       {
           if(isset($_POST['userEntry']))
           {
            
               if($userEntry==$dbAnswer)
               {
                    echo ("<br>Correct! The answer is ".$dbAnswer.".");
               }
               else if($userEntry!=$dbAnswer ) 
               {
                    echo("<br> Wrong, ".$_POST['userEntry']." is incorrect!");
               }
           }
       }
       

       // this function gets options  a-d for multiple choice questions.
       function getMultipleChoiceOptions($eId,$dbConnection)
       {
              $query="select * from multipleChoice where Eid=".$eId;
              $selected2=mysql_query($query,$dbConnection);
              $rows=mysql_fetch_array($selected2);
              return $rows;
       }
      //this function gets the filepaths of the images to be used in a drag and drop question
       function getDragAndDropOptions($eId,$dbConnection)
       {
              $query="select * from dragAndDrop where Eid=".$eId;
              $selected2=mysql_query($query,$dbConnection);
              $rows=mysql_fetch_array($selected2);
              return $rows;
       }
       //this function is used in drag and drop to make an array of the filepaths of the images involved for comparison
       function getDaDArray($string)
       {
           $array=explode(" ", $string);
           return $array;
       }
       //this function is used in the MultipleChoice.php to see if a specific choice has been made when the submit button is clicked. It will then echo the checked="true" attribute of a radio button.
       function checkSet($option)
        {
            if(isset($_POST['userEntry']) && $_POST['userEntry']==$option)
            {
                echo ' checked="true"';
            }
        }

?>