<?php 

/*class SalesComission {
  public $product_name;
  public $quantity;
  public $price;

  public $discount = 0;
  public $discounted_price;

  public $net_amount;

  function __construct($product_name, $quantity, $price) {
    $this->product_name = $product_name;
    $this->quantity = $quantity;
    $this->price = $price; 
  }

  public function calculateAmountDue() {
  	$this -> net_amount = $this-> quantity * $this-> price;
    return $this -> net_amount;
  }

  public function setDiscount($d) {
  	$this -> discount = $d;
    $this-> discounted_price = $this-> net_amount - $this-> discount;
  }

  public function displaySalesInfo() {
    echo "Product: " . $this->product_name . "<br>";
    echo "Qty: " . $this->quantity . "<br>";
    echo "Price: " . $this->price . "<br>";

    echo "-----------------" . "<br>";

    echo "Amount Due: {$this->calculateAmountDue()}" . "<br>";
    echo "Discount: {$this->discount}" . "<br>";
    echo "Net Due: {$this->discounted_price}";
    // echo $this->net_amount;
    // echo $this->discount;

  }
  
}

$sale_1 = new SalesComission("Sugar 25KG", 2, 1300);
$sale_1-> calculateAmountDue();
$sale_1 -> setDiscount(600);
$sale_1 -> displaySalesInfo();

echo "<br>" . "<br>" . "-----------------" . "<br>" . "<br>";;

$sale_2 = new SalesComission("Sugar 25KG", 2, 1300);
$sale_2 -> calculateAmountDue();
$sale_2 -> displaySalesInfo();*/

class store{
  public $in_qty;
  public $in_ucost;
  public $in_value;

  public $out_qty;
  public $out_ucost;
  public $out_value;

  public $f_qty;
  public $f_ucost;
  public $f_value;

  function __construct( 
                        $f_qty, $f_ucost, $f_value) {
    
    $this->f_qty = $f_qty;
    $this->f_ucost = $$f_ucost;
    $this->f_value = $f_value; 
  }

  public function sale(){
    $this -> f_qty = $this-> f_qty - $this-> out_qty;
    $this -> f_value = $this-> f_value - $this-> out_value;


    echo "final: quantity".f_qty. "u cost".f_ucost. " value".f_value;
    

  }
  public function purchase(){
    $this -> f_qty = $this-> f_qty + $this-> in_qty;
    $this -> f_ucost = $this-> f_value + $this-> in_value / $this-> f_qty;
    $this -> f_value = $this-> f_qty * $this-> f_ucost;


    echo "final: quantity".f_qty. "u cost".f_ucost. " value".f_value;
    

  }

  public function displaySalesInfo() {
    echo "Sale: {$this->sale()}" . "<br>";
    echo "Purchase: {$this->purchase()}" . "<br>";

  }

  $sale_1 = new store(1000, 5, 5000);
  $sale_1 -> displaySalesInfo();
}

?>
