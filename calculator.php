<?php 

//Calculator test
class Calculator
{

	//Function to calculate the input
	public function calculate($cal_input = '')
	{
		
		//Nothing has been sent yet!
		if($cal_input != '')
		{

			//If its just one number (integer/float) 
			if(!is_numeric($cal_input))
			{	
				
				//Get the first number from input.
				preg_match('/^[0-9\.]*/', $cal_input, $matches);
				$first_num = $matches[0];
				//Remove first number from input.
				$cal_rest  = preg_replace('/^[0-9\.]*/','',$cal_input);
				
				//Operator priorities.
				$op_arr  = ['*','/'];
				$op_arr1 = ['+','-'];
 				
 				//If it's strong operator ( * , / )
				if(in_array($cal_rest[0],$op_arr))
				{
				
					//If it's multiplication or division 
					if($cal_rest[0] == '*')
					{
						
						//Remove the operator from input
						$cal_rest = substr($cal_rest,1);
						
						//Get the second number from input
						preg_match('/^[0-9\.]*/', $cal_rest, $matches_rest);
						$sec_num = $matches_rest[0];

						//Remove the second number from input
						$cal_rest = preg_replace('/^[0-9\.]*/','',$cal_rest);

						//Get the result of first number multiple second one
						$cal_sub  = floatval($first_num) * floatval($sec_num);
						
					}
					elseif($cal_rest[0] == '/')
					{
						
						//Do the same as multiplication
						$cal_rest = substr($cal_rest,1);
						
						preg_match('/^[0-9\.]*/', $cal_rest, $matches_rest);
						
						$sec_num = $matches_rest[0];
						$cal_rest = preg_replace('/^[0-9\.]*/','',$cal_rest);
						$cal_sub  = floatval($first_num) / floatval($sec_num);
						
					}
					   
					//Merge the multiplication/division with the rest of input
					$cal_rest  = $cal_sub.$cal_rest;

					//Call the function again for the new input
					$cal_input = $this->calculate($cal_rest);
				
				}
				//The operator is weak (+ , -)
				elseif(in_array($cal_rest[0],$op_arr1))
				{
					
					//If it is '+'
					if($cal_rest[0] == '+')
					{
						
						//Remove the operator
						$cal_rest = substr($cal_rest,1);
						
						//Call the function passing the input rest as input and add it to the first number
						$cal_input  = floatval($first_num) + floatval($this->calculate($cal_rest));
						
					}
					elseif($cal_rest[0] == '-')
					{
						
						//The same as '+'
						$cal_rest = substr($cal_rest,1);
						
						$cal_input  = floatval($first_num) - floatval($this->calculate($cal_rest));
						
					}
				
				}
				
			}
			
			//Return the result.
			return $cal_input;
				
		}
		else
		{

			//Input is empty
			echo 'Please Enter the operation above';

		}

	}

}

//Get the form input 
$cal_input = (isset($_POST['cal_input']))?(string)$_POST['cal_input']:'';

//Show the input field
echo "<form name='cal' method='post' action='' >
		<input type='text' name='cal_input' value='$cal_input' />
		<input type='submit' value='Calculate' />
	  </form> ";


$cal = new Calculator();
//Call the calculator function and Print the result
echo $cal->calculate($cal_input);