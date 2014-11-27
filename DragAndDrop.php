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
                    $exercise=$_POST["eID"];
                    $dbConnected=connectToDatabase();
                    //image file path data
                    $images= getDragAndDropOptions($exercise, $dbConnected);
                    //array of image ids 
                    $leftDiv=getDaDArray($images['left']);
                    //array of file paths of files that should be in right box
                    $rightDiv=getDaDArray($images['right']);
                    //exercise data
                    $prompt=getPromptData($exercise,$dbConnected);
                ?>
                <script>
			// array of object dropped in the leftDiv
                        var leftArray= new Array();
                        //array of objects dropped in the rightDiv
                        var rightArray= new Array();
                        
                        function allowDrop(ev) 
                        {
				ev.preventDefault();
                                
			}//end allowDrop

			function drag(ev) 
                        {
                              ev.dataTransfer.setData("text", ev.target.id);
			}//end drag

			function dropLeft(ev) 
                        {
				ev.preventDefault();
				var data = ev.dataTransfer.getData("text");
				//check to see if dropped object is being dropped in the same place
                                ev.target.appendChild(document.getElementById(data));
                                var len=leftArray.length;
                                if(leftArray.indexOf(data)== -1)
                                {
                                    leftArray.push(data);
                                    len++;                                    
                                }
                                
                                //check to see if dropped item is in the other array, 
                                //if it  in the other array is splice from  other array
                                if(rightArray.indexOf(data)>-1)
                                {
                                    var index=rightArray.indexOf(data);
                                    if (index>-1)
                                    {
                                        rightArray.splice(index,1);
                                    }
                                }
                                
			}//end drop
                        
                        function dropRight(ev) 
                        {
				ev.preventDefault();
				var data = ev.dataTransfer.getData("text");
				
                                //check if already droped here incase drag and drop twice
                                   
                                ev.target.appendChild(document.getElementById(data));
                                var len=rightArray.length;
                                if(rightArray.indexOf(data)== -1)
                                {
                                    rightArray.push(data);
                                    len++;
                                }
                                
                                //check to see if dropped item is in the other array, 
                                //if it  in the other array is splice from  other array
                                if(rightArray.indexOf(data)>-1)
                                {
                                    var index=leftArray.indexOf(data);
                                    if (index>-1)
                                    {
                                        leftArray.splice(index,1);
                                    }
                                }
                                
			}//end drop
                       function checkAnswer()
                       {
                           var lcount=0;
                           var rcount=0;
                           var lAnswers=<?php echo json_encode($leftDiv);?>;
                           var rAnswers=<?php echo json_encode($rightDiv);?>;
                           
                           for(i=0;i<leftArray.length;i++)
                           {
                               if(lAnswers.indexOf(leftArray[i])===-1)
                                   lcount++;
                           }
                           for(i=0;i<rightArray.length;i++)
                           {
                               if(rAnswers.indexOf(rightArray[i])===-1)
                                   rcount++;
                               
                           }
                            if(lcount>0||rcount>0)
                           { alert("Wrong");}
                           else(lcount===0&&rcount===0)
                           {alert("correct");}
                         }//end checkAnswer()
		</script>
                
    </head>
    <body>

                
                <!-- Title with Instructions -->
		<div class="instructions">
			<h1>
                            <?php echo("".$prompt['Topic'])?> Drag And Drop
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
                           <img  id="image1" src="<?php echo ($images["image1"]);?>"  width="100" height="69" draggable="true" ondragstart="drag(event)">
                        </li>
			
			<li>
                            <img id="image2" src="<?php echo ($images["image2"]);?>" width="100" height="69" draggable="true" ondragstart="drag(event)" >
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
		<div id="leftDrop1" class="leftBox1" ondrop="dropLeft(event)" ondragover="allowDrop(event)">
			<h4>
				<!-- Access in CSS as  .leftBox h4  -->
                                <?php echo($images["Title1"]);?>
			</h4>
		</div>
		
		<div id="rightDrop1" class="rightBox1" ondrop="dropRight(event)" ondragover="allowDrop(event)">
			<h4>
				<!-- Access in CSS as  .rightBox h4  -->
				<?php echo($images["Title2"]);?>
			</h4>
		</div>
		
		               
                <input type="button" value="Submit" class="submitButton"  onClick="checkAnswer()"/>
		
		<input type="button" value="Previous Session" class="previousButton" />
		
		<input type="button" value="Next Session" class="nextButton" />
	</body>
</html>