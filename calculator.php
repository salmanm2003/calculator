<?php 

//Calculator test
class Calculator
{

	public function calculate($cal_input = '3*4')
	{

		echo "<form name='cal' method='post' action='' >
				<input type='text' name='cal_input' />
				<input type='submit' value='Calculate' />
			  </form> ";

		$cal_input = (isset($_POST['cal_input']))?$_POST['cal_input']:$cal_input;

		if($cal_input != '')
		{

			preg_match('/^[0-9\.]*/', $cal_input, $matches);
			$cal_rest  = preg_replace('/^[0-9\.]*/','',$cal_input);
			echo 'first:';
			echo $first_num = $matches[0];
			
			$op_arr = ['*','/'];
			
			if(in_array($cal_rest[0],$op_arr))
			{
			
				if($cal_rest[0] == '*')
				{
					
					echo 'op=';echo $cal_rest[0];
					echo $cal_rest = substr($cal_rest,1);
					
					preg_match('/^[0-9\.]*/', $cal_rest, $matches_rest);
					
					echo 'sec';
					echo $sec_num = $matches_rest[0];
					echo '<br/>';
					echo $cal_rest = preg_replace('/^[0-9\.]*/','',$cal_rest);
					echo 'result';
					echo $cal_sub  = floatval($first_num) * floatval($sec_num);
					
				}
				elseif($cal_rest[0] == '/')
				{
					
					echo $cal_rest = substr($cal_rest,1);
					
					preg_match('/^[0-9\.]*/', $cal_rest, $matches_rest);
					
					$cal_rest = preg_replace('/^[0-9\.]*/','',$cal_rest);
					$cal_sub  = floatval($matches) / floatval($matches_rest);
					
				}
				   
				echo $cal_rest = $cal_sub.$cal_rest;
				
			
			}
			   
			
		}
		else
		{

			echo 'Please Enter the operation above';

		}
		echo 'hello world';


	}

}

$cal = new Calculator();
$cal->calculate();