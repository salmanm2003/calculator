<?php 

//Calculator test
class Calculator
{

	public function calculate($cal_input = '12+3')
	{

		echo "<form name='cal' method='post' action='' >
				<input type='text' name='cal_input' />
				<input type='submit' value='Calculate' />
			  </form> ";

		$cal_input = (isset($_POST['cal_input']))?$_POST['cal_input']:$cal_input;

		if($cal_input != '')
		{

			preg_match('/^[0-9]*/', $cal_input, $matches);
			echo $rest  = preg_replace('/^[0-9]*/','',$cal_input);
			print_r($matches);
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