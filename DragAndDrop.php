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
		<script>
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
		
            
                <?php 
                    include 'exerciseFunctions.php';
                    $_POST["eID"]=1;
                    $exercise=$_POST["eID"];
                    $dbConnected=  connectToDatabase();
                    $prompt=getPromptData($exercise,$dbConnected);
                    $images=  getDragAndDropOptions($exercise, $dbConnected); 
                
                
                
                ?>
                <!-- Title with Instructions -->
		<div class="instructions">
			<h1>
				Drag And Drop
			</h1>
		
			<h3>
				Place the items on the left into their correct categories by clicking on the item, and dragging
				it into a table.
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
				<img id="drag1" src="<?php echo $images["image1"];?>" draggable="true" ondragstart="drag(event)" width="100" height="69">
			</li>
			
			<li>
				<img id="drag2" src="<?php echo $images["image2"];?>" draggable="true" ondragstart="drag(event)" width="100" height="69">
			</li>
			
			<li>
				<img id="drag3" src="<?php echo $images["image3"];?>" draggable="true" ondragstart="drag(event)" width="100" height="69">
			</li>
			
			<li>
				<img id="drag4" src="<?php echo $images["image4"];?>" draggable="true" ondragstart="drag(event)" width="100" height="69">
			</li>
			
			<li>
				<img id="drag5" src="<?php echo $images["image5"];?>" draggable="true" ondragstart="drag(event)" width="100" height="69">
			</li>
		</ul>
		
		
		<!-- TABLES -->
		<div class="leftBox" ondrop="drop(event)" ondragover="allowDrop(event)">
			<h4>
				<!-- Access in CSS as  .leftBox h4  -->
				<?php echo $images["Title1"];?>
			</h4>
		</div>
		
		<div class="rightBox" ondrop="drop(event)" ondragover="allowDrop(event)">
			<h4>
				<!-- Access in CSS as  .rightBox h4  -->
				<?php echo $images["Title2"];?>
			</h4>
		</div>
		
		<!-- BUTTONS -->
		<input type="button" value="Submit" class="submitButton" onclick=""/>
		
		<input type="button" value="Previous Session" class="previousButton" onclick=""/>
		
		<input type="button" value="Next Session" class="nextButton" onclick=""/>
	</body>
</html>