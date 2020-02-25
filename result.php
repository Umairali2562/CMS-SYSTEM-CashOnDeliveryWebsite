<?php
    
//real codes

   if(isset($_GET['submit'])){
     
  //initialization:
    $A=array($_GET['0'],$_GET['1'],$_GET['2'],$_GET['3']);   
    $mid=$_GET['mid'];
    $attendance=$_GET['noofclass'];   
       
       
       
    $initialgrade=($A[0]+$A[1]+$A[2]+$mid)*100/35;    
       
     $A4percentage=$A[3]*100/5;
	if($initialgrade >= 90 && $A4percentage>=70 ) 
	{
		$grade = 'A';
	}
     	else 
	if($initialgrade< 90 && $initialgrade >= 80 && $A4percentage >= 70) 
	{	
		$grade = 'B';
	}	
	else if($initialgrade< 80 && $initialgrade>= 70 && $A4percentage >= 70)	
	{
		$grade = 'C';				
	}
	else if($initialgrade < 70 && $initialgrade >= 60 && $A4percentage >= 70) 
	{		
	}
	else if($initialgrade < 60 && $A4percentage < 75)          
	{
		$grade = 'F';		
	}  
       
       
       
    
    
 $attendance = $attendance*100/45;
    $tmp =$attendance;
  echo "<br>Grade was : $grade<br>";  
  echo "Attendance : $tmp<br><br>";  
  echo "after the attendance:<br>";  
    
    
    
	if($grade == 'A' && $attendance >=93)	
	{
echo "<br>Final course grade is $grade";
                             
	}
	else if($grade=='A' && $attendance<93)
	{
		echo "<br>Final course grade is B<br>";		
                            		
	}
	
	
	
	if($grade == 'B' &&$attendance >= 93)	
	{
		echo "<br>Final course grade is $grade";
                             
	}
	else if($grade=='B' && $attendance < 93)
	{
		echo "<br>Final course grade is C<br>";			
                             
	}
	
	
	
	
	
	if($grade == 'C' && $attendance >= 93)            	
	{
	echo "<br>Final course grade is $grade";	
                            
	}
	else if($grade == 'C' && $attendance < 93)  
	{
		echo "<br>Final course grade is D<br>";				
                             
							 }
							 
							 
							 
	if($grade == 'D' && $attendance >= 93)	
	{
		echo "<br>Final course grade is $grade";		
                             
	}
	else if($grade == 'D' && $attendance < 93)  
	{
			echo "<br>Final course grade is F<br>";		 
                         	}
	
	
	
	
	
	if($grade == 'F' && $attendance >= 93)     
	{
		echo "<br>Final course grade is $grade";	
	}                      
    
    
    }
    ?>