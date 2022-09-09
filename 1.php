<?php

?>
<!doctype html>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<!-- <form action="stack.php" method="POST">
	Infix <input type="text" name="stack_input">
	<input type="submit" >
	</form> -->
	
	<div class="container">
      <div class="row">
          <div class="col">
              <form method="post" action="">
              <br><h2>STACKALCULATOR</h2><br>
             
              <div class="form-group">
                  <label for="kms"><h4>Enter Expression</h4></label>
                  <input type="text" min="0"  name="stack_input" class="form-control"  title="Please enter expression only">
                  <small  class="text-muted">Enter the infix notation expression and click <strong>execute</strong> to run</small>
              </div>
              <div class="form-group">
                  <button type="submit" name="convert" class="btn btn-danger">Execute</button>
              </div>
              <div class="form-group">
                  <h5>Result:<span id="res"> <?php 
//basic Stack attributes
    class StackAtts
    {
        public $element;
        public $next;
        public  function __construct($element, $next)
        {
            $this->element = $element;
            $this->next = $next;
        }
    }

    class Stack
    {
        public $top;
        public $size;

        function __construct()
        {
            $this->size = 0;
            $this->top = NULL;
        }

        public  function isEmpty()
        {
            if ($this->size > 0 && $this->top != NULL)
            {
                return false;
            }
            else
            {
                return true;
            }
        }

        //function to get Stack size
        public function sizeGet()
        {
            return $this->top+1;
        }

        //function to push element
        public function push($element)
        {
            $this->top = new StackAtts($element, $this->top);
            $this->size++;
        }

        //function to pop element from stack
        public  function pop()
        {
            if ($this->size > 0 && $this->top != NULL)
            {
                $temp = $this->top;
                $this->top = $temp->next;
                $this->size--;
            }
        }

        //function to scan top-most element
        public function topElement()
        {
            if ($this->top == NULL)
            {
                return ' ';
            }
            return $this->top->element;
        }
    }

    class converter
    {
        //Precedence declaration
        public function precedence ($operand)
        {
            if ($operand == '+' || $operand == '-')
            {
                return 1;
            }
            else if ($operand == '*' || $operand == '/')
            {
                return 2;
            }
            else if ($operand == '^')
            {
                return 3;
            }
            return -1;
        }

        //Operand checker
        public function is_operator($operand)
        {   if($operand == '+' || $operand == '-' || $operand == '*' || $operand == '/' || $operand == '^')
            {
                return true;
            }
            return false;
        }

        //Infix -> Postfix converter
        public function InfixToPostfix($infix)
        {
            $output = "";
            $size = strlen($infix);
            $stack = new Stack();
            $buffer = '';

    for ($i = 0; $i < $size; ++$i)
    {
            if ($infix[$i] == ' ') {
                $buffer .= ' ';
                continue;
            }
      if ( $infix[$i] >= 0 && $infix[$i] <= 9)
      {
        $output = $output.strval($infix[$i]);
                $buffer = $buffer.strval($infix[$i]);
      }
      else
      {
        if ($stack->isEmpty() || $infix[$i] == '(')
        {
                    //main case for (
          $stack->push($infix[$i]);

        }
        else if ($infix[$i] == ')')
        {
          while ($stack->isEmpty() == false && 
                           $stack->topElement() != '(')
          {
            // Peek top element
            $output .= $stack->topElement();
                        $buffer .= $stack->topElement();
            // Pop top element
            $stack->pop();
          }
          if ($stack->topElement() == '(')
          {
            // Pop this element
            $stack->pop();
          }
        }
        else
        {
                    //Precedence checker
          while ($stack->isEmpty() == false && 
                           $this->precedence($infix[$i]) <= 
                           $this->precedence($stack->topElement()))
          {
            // Get top element
            $output .= $stack->topElement();
                        $buffer .= $stack->topElement();
                        
            // Remove stack element
            $stack->pop();
          }
          // Add new operator
          $stack->push($infix[$i]);
                
        }
      }
    }
        //this causes differing output based on number of whitespace vvv
        $buffer .= ' ';

            while ($stack->isEmpty() == false)
            {
                $output .= $stack->topElement();
                $buffer .= $stack->topElement();
                $stack->pop();
            }
            printf("%s\n", "Infix: ".$infix);
            printf("%s\n", "Postfix: ".$output);
            $infix_arrange = array_values(array_filter(explode(" ",$buffer)));
            echo print_r($infix_arrange,true);
            //$this->global_array = $infix_arrange;
            
            $result = array();
            for ($i = 0; $i < sizeof($infix_arrange); $i++){
                switch ($infix_arrange[$i]){
                    case "+":
                        $x = (array_pop($result) + array_pop($result));
                        array_push($result, $x);
                        break;
                    case "-":
                        $x = (array_pop($result) - array_pop($result));
                        array_push($result, $x);
                        break;
                    case "*":
                        $x = (array_pop($result) * array_pop($result));
                        array_push($result, $x);
                        break;
                    case "/":
                        $x = (array_pop($result) / array_pop($result));
                        array_push($result, $x);
                        break;
                    case "^":
                        $x = (array_pop($result) ** array_pop($result));
                        array_push($result, $x);
                        break;
                    default:
                        array_push($result, $i);
                }
            }

            print_r($result);

        }

    }



    //Main driver code
    $NewStack = new Stack();
    $NewStack->push($_POST["stack_input"]);

    $task = new converter();
    $infix = $_POST["stack_input"];
    $task->InfixToPostfix($infix);
    
                     ?>  </span></h5>
              
              </div> 
              
              </form>
          </div>
      </div>
    </div>
</body>
</html>