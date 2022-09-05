<?php  


class Calculator
{
	private $km, $ms, $operator, $output;

	public function setNumbers($km, $ms)
	{
		$this->km = $km;
		$this->ms = $ms;
	}

	public function setOperator($operator)
	{
		$this->operator = $operator;
	}

	public function calculate()
	{
		if ($this->operator == "*") {
			$this->output = $this->km * $this->ms;
		}
		
	}

	public function getOutput()
	{
		return $this->output;
	}
}


$km=$_POST['km'];
	
$ms = 0.62137119;
$operator = "*";

$calculator = new Calculator();
$calculator->setNumbers($km,$ms);
$calculator->setOperator($operator);
$calculator->calculate();
$calculator->getOutput();


?>

<!doctype html>
<html lang="en">
  <head>
    <title>PHP program to Convert Kilometers into Miles</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="container">
      <div class="row">
          <div class="col">
              <form method="post" action="">
              <br><h2>Convert Kilometers into Miles</h2><br>
             
              <div class="form-group">
                  <label for="kms"><h4>Enter Kms</h4></label>
                  <input type="text" min="0" value="<?=(isset($kms)) ? $km : '';?>" name="km" class="form-control" pattern="[0-9]*" title="Please enter only numbers">
                  <small id="helpId" class="text-muted">Enter the Kms in numbers and click the button to Convert it</small>
              </div>
              <div class="form-group">
                  <h5>Result:<span id="res"> <?php echo $km." ".$operator." ".$ms. " = ". $calculator->getOutput(); ?> </span></h5>
              </div> 
              <div class="form-group">
                  <button type="submit" name="convert" class="btn btn-primary">Convert to Miles</button>
              </div>
              </form>
          </div>
      </div>
    </div>
  </body>
</html>