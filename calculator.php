<?php 

//Calculator test
class Calculator
{

	public function calculate($cal_input = '')
	{
		
		if($cal_input != '')
		{

			if(!is_numeric($cal_input))
			{	
				preg_match('/^[0-9\.]*/', $cal_input, $matches);
				$cal_rest  = preg_replace('/^[0-9\.]*/','',$cal_input);
				$first_num = $matches[0];
				
				$op_arr  = ['*','/'];
				$op_arr1 = ['+','-'];
 				
				if(in_array($cal_rest[0],$op_arr))
				{
				
					if($cal_rest[0] == '*')
					{
						
						$cal_rest = substr($cal_rest,1);
						
						preg_match('/^[0-9\.]*/', $cal_rest, $matches_rest);
						
						$sec_num = $matches_rest[0];
						$cal_rest = preg_replace('/^[0-9\.]*/','',$cal_rest);
						$cal_sub  = floatval($first_num) * floatval($sec_num);
						
					}
					elseif($cal_rest[0] == '/')
					{
						
						$cal_rest = substr($cal_rest,1);
						
						preg_match('/^[0-9\.]*/', $cal_rest, $matches_rest);
						
						$sec_num = $matches_rest[0];
						$cal_rest = preg_replace('/^[0-9\.]*/','',$cal_rest);
						$cal_sub  = floatval($first_num) / floatval($sec_num);
						
					}
					   
					$cal_rest  = $cal_sub.$cal_rest;
				
					$cal_input = $this->calculate($cal_rest);
				
				}
				elseif(in_array($cal_rest[0],$op_arr1))
				{
				
					if($cal_rest[0] == '+')
					{
						
						$cal_rest = substr($cal_rest,1);
						
						$cal_input  = floatval($first_num) + floatval($this->calculate($cal_rest));
						
					}
					elseif($cal_rest[0] == '-')
					{
						
						$cal_rest = substr($cal_rest,1);
						
						$cal_input  = floatval($first_num) - floatval($this->calculate($cal_rest));
						
					}
				
				}
				
			}
			
			
			return $cal_input;
				
			
		}
		else
		{

			echo 'Please Enter the operation above';

		}

	}

}

$cal_input = (isset($_POST['cal_input']))?(string)$_POST['cal_input']:'';

echo "<form name='cal' method='post' action='' >
		<input type='text' name='cal_input' />
		<input type='submit' value='Calculate' />
	  </form> ";

$cal = new Calculator();
echo $cal->calculate($cal_input);