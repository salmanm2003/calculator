<?php 

//Calculator test
class Calculator
{

	public function calculateValue($input = '')
	{

		echo "<form name='cal' method='post' action='' >
				<input type='text' name='input' />
				<input type='submit' value='Calculate' />
			  </form> ";
			  
		$input = (isset$_POST['input'])?$_POST['input']:$input;

		if($input != '')
		{

			

		}
		else
		{

			echo 'Please Enter the operation above'

		}


	}

}

?>