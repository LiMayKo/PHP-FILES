<?php 
 class StackAtts
 {
  public $element;
  public $next;
  public function __construct($element, $next)
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
  public function isEmpty()
  {
    if ($this-> size && $this->top != NULL) 
    {
      return false;# code...
    }
    else
    {
      return true;
    }
  }

  public function sizeGet()
  {
    return $this->top+1;
  }

  public function push($element)
  {
    $this->top = new StackAtts($element, $this->top);
    $this->size++;
  }

  public function pop()
  {
    if ($this->size > 0 && $this->top != NULL)
    {
       $temp = $this->top;
       $this->top = $temp->next;
       $this->size--; # code...
    }
    
  }

  public function topElement()
  {
    if ($this->top == NULL)
    {
      return '';# code...
    }
    return $this->top->element;
  }
 }

 class converter
 {

  public function precedence($operand)
  {
    if ($operand == '+' || $operand == '-') 
    {
      return 1;# code...
    }
    else if ($operand == '*' || $operand == '/') {
      # code...
      return 2;
    }
    else if ($operand == '^') {
      # code...
      return 3;
    }
    return -1;
  }

  public function is_operator($operand)
  {
    if ($operand == '+' || $operand == '-' || $operand == '*' || $operand == '/' || $operand == '^') 
    {
      return true;# code...
    }
    return false;
  }

  public function InfixtoPostfix($infix)
  {
    $output = "";
    $size = strlen($infix);
    $stack = new Stack();
    $temp = [];
    $buffer = '';

    for ($i=0; $i < $size; $i++) 
    { 
      if($infix[$i] == '')
      {
        $buffer .='';
        continue;
      }# code...
      if ($infix[$i] >= 0  && $infix[$i] <= 9) 
      {
        $output = $output. strval($infix[$i]);
        $buffer = $buffer. strval($infix[$i]);
        # code...
      }
      else
      {
        if ($stack->isEmpty() == false || $infix[$i] == '(') 
        {
          $stack->push($infix[$i]);# code...
        }
        else if ($infix[$i] == ')') 
        {
          while($stack->isEmpty() == false && $stack->topElement()!='(')
          {
            $output.=$stack->topElement();
            $buffer.=$stack->topElement();
            $stack->pop();
          }
          # code...
          if ($stack->topElement() == '(') 
          {
            # code...
            $stack->pop();
          }
        }
        else{
          while ($stack->isEmpty() == false && $this->precedence($infix[$i]) == $this->precedence($stack->topElement())) 
          {
            $output.=$stack->topElement();
            $buffer.=$stack->topElement();
            $stack->pop();
            # code...
          }
          $stack->push($infix[$i]);
        }
      }
    }

    $buffer.='';
    while ($stack->isEmpty() == false) 
    {
      $output.=$stack->topElement();
      $buffer.=$stack->topElement();
      $stack->pop();
      # code...
    }
    printf("%s\n","Infix: ".$infix);
    printf("%s\n","Postfix: ".$output);
    $infix_arrange = array_values(array_filter(explode("", $buffer)));
    echo print_r($infix_arrange,true);

  }




 }

$NewStack = new Stack();
$NewStack->push($_POST["stack_input"]);

$task = new converter();
$infix = $_POST["stack_input"];
$task->InfixtoPostfix($infix);

?>