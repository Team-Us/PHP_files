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
                <link rel="stylesheet" href="./4691.css"/>
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
                    $next=$prompt['NextPrompt'];
                    $nextPage=getPageInfo($next);
                    $previous=$prompt['PreviousPrompt'];
                    $previousPage=getPageInfo($previous); 
                ?>
                <script>
			// array of object dropped in the leftDiv
                        var leftArray= new Array();
                        //array of objects dropped in the rightDiv
                        var rightArray= new Array();
                        var moveCount=0;
                        var attemptCount=0;
                        function allowDrop(ev) 
                        {
				ev.preventDefault();
                                
			}//end allowDrop

			function drag(ev) 
                        {
                              ev.dataTransfer.setData("text", ev.target.id);
                              moveCount++;
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
                           attemptCount++;
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
                           else if(lcount===0&&rcount===0&&moveCount!==0&&attemptCount<=3)
                           {alert("correct");}
                           else if(attemptCount>3)
                           {
                               alert("Come back to this question after studying more about this topic.");
                           }
                         }//end checkAnswer()
</script>
</head>
<body>
<!--Kevin modification here  -->
<div id="wrapper">
          <div id="navigationwrap">
    <div id="navigation">
              <div id="navigation">
        <?php include "Header.php" ?>
      </div>
            </div>
  </div>
          <div id="leftcolumnwrap">
    <div id="leftcolumn">
              <?php include "topics.php"; ?>
            </div>
  </div>
         <div id="contentwrap">
        <div id="content">
           
		   <div class="table">
                <div class="row">
                    <div class="promptCell">		                
                            <?php echo("".$prompt['Topic'])?> Drag And Drop: 
                            <?php echo("".$prompt['Prompt']);?>
		</div>
               <div class="row">
               <div class="promptCell"> 
               <div class="leftBox1">
		<ul class="imageLocation">

			<li>
                           <img  id="image1" src="<?php echo ($images["image1"]);?>"  width="60" height="46" draggable="true" ondragstart="drag(event)">
                        </li>
			
			<li>
                            <img id="image2" src="<?php echo ($images["image2"]);?>" width="60" height="46" draggable="true" ondragstart="drag(event)" >
                        </li>
			
			<li>
                            <img id="image3" src="<?php echo ($images["image3"]);?>" draggable="true" ondragstart="drag(event)" width="60" height="46">
                        </li>
			
			<li>
                            <img id="image4" src="<?php echo ($images["image4"]);?>" draggable="true" ondragstart="drag(event)" width="60" height="46">
                        </li>
			
			<li>
                            <img id="image5" src="<?php echo ($images["image5"]);?>" draggable="true" ondragstart="drag(event)" width="60" height="46">
			</li>
                        
		</ul>
                </div>
		
		<!-- TABLES -->
		<div id="leftDrop1" class="leftBox1" ondrop="dropLeft(event)" ondragover="allowDrop(event)">
			<h4>
				<!-- Access in CSS as  .leftBox h4  -->
                                <?php echo($images["Title1"]);?>
			</h4>
		</div>
		
		<div id="rightDrop1" class="leftBox1" ondrop="dropRight(event)" ondragover="allowDrop(event)">
			<h4>
				<!-- Access in CSS as  .rightBox h4  -->
				<?php echo($images["Title2"]);?>
			</h4>
		</div>
					</div>
				</div>
                    </div>
                </div>
                            <div class="row">
					<div class="promptCell">
                                            <input  type="button" value="Submit"  onClick="checkAnswer()"/>
					</div>
				</div>
				<div class="row">
					<div class="buttonCell">
					<form method="post" action="<?php echo $previousPage,'?uID=',$_GET['uID']  ?>">
                                            <button type="submit"  name="eID" value="<?php echo $previous?>" >Previous</button>
                                        </form>
					</div>
                                    
                                    <div class="buttonCell">
					    <form method="post" action="<?php echo $nextPage,'?uID=',$_GET['uID']  ?>">
                                                <button type="submit"  name="eID" value="<?php echo $next?>" >Next</button>
                                            </form>
                                    </div>
					</div>
				</div>
			</div>
        </div>
        </div>
          <div id="footerwrap">
    <div id="footer">
              <?php
            include "footer.php";
          ?>
            </div>
  </div>
        

<!-- to here -->
</body>
</html>