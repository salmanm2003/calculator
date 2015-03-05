<?php 

//Calculator test
class Calculator
{

	public function calculateValue($cal_input = '')
	{

		echo "<form name='cal' method='post' action='' >
				<input type='text' name='cal_input' />
				<input type='submit' value='Calculate' />
			  </form> ";

		$cal_input = (isset($_POST['cal_input']))?$_POST['cal_input']:$cal_input;

		if($cal_input != '')
		{

			$input = preg_match('/^[0-9]*/', $cal_input, $matches);
			

		}
		else
		{

			echo 'Please Enter the operation above'

		}


	}

}

?>