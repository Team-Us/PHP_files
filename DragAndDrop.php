<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
                <title> Drag And Drop </title>
		<link rel="stylesheet" href="./dnd_css.css"/>
                <?php 
                    include 'exerciseFunctions.php';
                    $_POST["eID"]=8;
                    $exercise=$_POST["eID"];
                    $dbConnected=connectToDatabase();
                    //image file path data
                    $images= getDragAndDropOptions($exercise, $dbConnected);
                    //array of file paths of files that should be in left box
                    $leftDiv=getDaDArray($images['left']);
                    //array of file paths of files that should be in right box
                    $rightDiv=getDaDArray($images['right']);
                    //exercise data
                    $prompt=getPromptData($exercise,$dbConnected);
                    
                    
                ?>
                <script >
			function allowDrop(ev) 
                        {
				ev.preventDefault();
			}//end allowDrop

			function drag(ev) 
                        {
				ev.dataTransfer.setData("text", ev.target.id);
			}//end drag

			function drop(ev) 
                        {
				ev.preventDefault();
				var data = ev.dataTransfer.getData("text");
				ev.target.appendChild(document.getElementById(data));
			}//end drop
		</script>
                
    </head>
    <body>

                
                <!-- Title with Instructions -->
		<div class="instructions">
			<h1>
				Drag And Drop
			</h1>
		
			<h3>
                            <?php echo("".$prompt['Prompt']);?>
			</h3>
		</div>
		
		<!-- Navigation (Optional) -->
		<nav class="navBox">
			<h4>
				Navigation
			</h4>
		</nav>
		
		<!-- IMAGES -->
		<ul class="imageLocation">
			<h4> 
				Options
			</h4>
			
			<li>
                            <img id="image1" src="<?php echo ($images["image1"]);?>" draggable="true" ondragstart="drag(event)" width="100" height="69">    
                        </li>
			
			<li>
                            <img id="image2" src="<?php echo ($images["image2"]);?>" draggable="true" ondragstart="drag(event)" width="100" height="69">
                         </li>
			
			<li>
                            <img id="image3" src="<?php echo ($images["image3"]);?>" draggable="true" ondragstart="drag(event)" width="100" height="69">
                        </li>
			
			<li>
                            <img id="image4" src="<?php echo ($images["image4"]);?>" draggable="true" ondragstart="drag(event)" width="100" height="69">
                        </li>
			
			<li>
                            <img id="image5" src="<?php echo ($images["image5"]);?>" draggable="true" ondragstart="drag(event)" width="100" height="69">
			</li>
		</ul>
		
		
		<!-- TABLES -->
		<div id="leftDrop" class="leftBox" ondrop="drop(event)" ondragover="allowDrop(event)">
			<h4>
				<!-- Access in CSS as  .leftBox h4  -->
                                <?php echo($images["Title1"]);?>
			</h4>
		</div>
		
		<div id="rightDrop"class="rightBox" ondrop="drop(event)" ondragover="allowDrop(event)">
			<h4>
				<!-- Access in CSS as  .rightBox h4  -->
				<?php echo($images["Title2"]);?>
			</h4>
		</div>
		
		<!-- BUTTONS -->
		<input type="button" value="Submit" class="submitButton" onclick="checkDivContents()"/>
		
		<input type="button" value="Previous Session" class="previousButton" />
		
		<input type="button" value="Next Session" class="nextButton" />
	</body>
</html>