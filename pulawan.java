import java.util.*;
class Main {
  public static final Scanner sc = new Scanner(System.in);
    static Random randNum = new Random();
// PULAWAN PAWNSHOP

    // RANDOMIZER OF TRANSACTION CODE
    static Object Tcode(){
        int min = 10000; // GETTING 5 RANDOM DIGIT MINIMUM
        int max = 99999; // GETTING 5 RANDOM DIGIT MAXIMUM
        String characters = "ABCDEFGHIJKLMNOPQRSTUVWZYZ";
        String randomString = "";
        int length = 5;
        int random_int = (int)Math.floor(Math.random()*(max-min+1)+min); // FINAL 5 INTEGER RANDOM
        char [] text = new char[length]; // ARRAY OF TEXT CONSIST OF 5 CHAR
        for (int i = 0; i < length; i++){
            text[i] = characters.charAt(randNum.nextInt(characters.length())); // RANDOMIZE OF CHAR
        }
        for (int i = 0; i < text.length; i++){
            randomString += text[i]; // FILLING THE ARRAY THAT LENGTH OF 5 (CHARACTERS)
        }
        String code = randomString+"-"+random_int; // COMBINATION OF 5 CHAR AND 5 INT
        return code;// THIS WILL RETURN THE TRANSACTION CODE!
    }

    // HOMEPAGE OF PULAWAN
    static String home(){
        System.out.print("---WELCOME TO PULAWAN PAWNSHOP---\n[S]END      [L]IST OF TRANSACTIONS\n[R]ECEIVE   [E]XIT\n\nENTER YOUR CHOICE\n: ");
        String choice = sc.next();
        return choice; // RETURNING THE CHOICES FROM ABOVE
    }

    // SEND PROCESS
    static ArrayList add_transactions(){
        ArrayList <Object> record = new ArrayList<>(); // THIS WILL BE THE STORAGE OF ALL THE DETAILS OF THE SENDER (RECORD)
        record.add(Tcode()); // THIS IS THE TRANSACTION CODE FROM TCODE FUNCTION
        System.out.println("Enter Your Name : ");
        String sender_name = sc.next();
        record.add(sender_name); // RECORD SENDER NAME
        System.out.println("Enter Recipient Name : ");
        String recipient_name = sc.next();
        record.add(recipient_name); // RECORD RECIPIENT NAME

        System.out.println("Enter Amount to be Sent : ");
        int amount = sc.nextInt();
        while (true){
            if(amount > 0){record.add(amount); break;} // RECORD AMOUNT TRAP CATCH BELOW ZERO
            System.out.println("Below and zero is Invalid! Enter again : ");
            amount = sc.nextInt();
        }

        int fee = 0; // EXTRA FEES LINE 141 TO 216
        if (amount <= 100 && amount >= 1){
            fee = 2;
            System.out.println("Fee : " + 2);
        }
        else if (amount <= 300 && amount > 101){
            fee = 3;
            System.out.println("Fee : " + 3);
        }
        else if (amount <= 500 && amount > 301){
            fee = 9;
            System.out.println("Fee : " + 9);
        }
        else if (amount <= 700 && amount > 501){
            fee = 12;
            System.out.println("Fee : " + 12);
        }
        else if (amount <= 1000 && amount > 701){
            fee = 15;
            System.out.println("Fee : " + 15);
        }
        else if (amount <= 1500 && amount > 1001){
            fee = 20;
            System.out.println("Fee : " + 20);
        }
        else if (amount <= 2000 && amount > 1501){
            fee = 30;
            System.out.println("Fee : " + 30);
        }
        else if (amount <= 2500 && amount > 2001){
            fee = 40;
            System.out.println("Fee : " + 40);
        }
        else if (amount <= 3000 && amount > 2501){
            fee = 50;
            System.out.println("Fee : " + 50);
        }
        else if (amount <= 3500 && amount > 3001){
            fee = 60;
            System.out.println("Fee : " + 60);
        }
        else if (amount <= 4000 && amount > 3501){
            fee = 70;
            System.out.println("Fee : " + 70);
        }
        else if (amount <= 5000 && amount > 4001){
            fee = 90;
            System.out.println("Fee : " + 90);
        }
        else if (amount <= 6000 && amount > 5001){
            fee = 115;
            System.out.println("Fee : " + 115);
        }else if (amount <= 7000 && amount > 6001){
            fee = 120;
            System.out.println("Fee : " + 120);
        }
        else if (amount <= 9500 && amount > 7001){
            fee = 125;
            System.out.println("Fee : " + 125);
        }
        else if (amount <= 10000 && amount > 9501){
            fee = 140;
            System.out.println("Fee : " + 140);
        }
        else if (amount <= 14000 && amount > 10001){
            fee = 210;
            System.out.println("Fee : " + 210);
        }
        else if (amount <= 15000 && amount > 14001){
            fee = 220;
            System.out.println("Fee : " + 220);
        }
        else if (amount >= 15001){
            fee = 250;
            System.out.println("Fee : " + 250);
        }
        record.add(amount+fee); // RECORD SUMMATION OF AMOUNT AND THE FEE
        record.add(false); // RECORD THAT THIS WILL BE PENDING
        System.out.println("Total amount : " +record.get(4)); // TAPPING INDEX 4 IN RECORD OBJECT
        System.out.println("Enter your payment : ");
        int payment = sc.nextInt();
        int total = amount + fee;
        while (true){
            if(payment >= total){break;} // TRAPPING FOR PAYING BELOW THE AMOUNT
            System.out.println("Please finish your transaction : ");
            payment = payment + sc.nextInt();
        }
            System.out.println("");
            System.out.println("=== RECEIPT ===");
            System.out.println("TRANSACTION CODE : " + record.get(0) + "\n" + "Name of Sender : " + record.get(1) + "\nName of Recipient : " + record.get(2) + "\nAmount : " + record.get(3) + "\nFee : " + fee + "\nTotal amount Paid : " + payment);
            // THIS WILL DISPLAY THE RECORD OBJECT BY INDEX
            System.out.print("=== Thank You ===");
            System.out.println("");
        return record; // RETURN THE INDEXES OF RECORD OBJECT
    }
  
  public static void main(String[] args) {
    // ARRAYLIST OF RECORD FUNCTION
        ArrayList<ArrayList> transactions = new ArrayList<>();
        String answer; // ANSWER FOR DO WHILE YES OR NO

        do{
            String choice = home(); // THE HOMEPAGE
            switch (choice.toLowerCase()) {
                case "s" -> {
                    transactions.add(add_transactions()); // FUNCTION ADD_TRANSACTIONS
                }
                case "r" -> {
                    System.out.println("Enter Transaction Code : ");
                    String transaction_code = sc.next();
                    System.out.println("Enter Your Name : ");
                    String uname = sc.next();
                    System.out.println("Enter Sender Name : ");
                    String Sname = sc.next();
                    System.out.println("Enter Amount : ");
                    int receive_amount = sc.nextInt();
                    int flagging = 0;
                    int transaction_id_found = 0;
                    for (int q = 0; q < transactions.size(); q++){
                        String inp = (String) transactions.get(q).get(0);
                        String uuname = (String) transactions.get(q).get(1);
                        String ssname = (String) transactions.get(q).get(2);
                        if (transaction_code.toLowerCase().equals(inp.toLowerCase()) && uname.toLowerCase().equals(ssname.toLowerCase()) && Sname.toLowerCase().equals(uuname.toLowerCase())){
                            flagging = 1;
                            transaction_id_found = q;
                            break;
                        }
                    }
                    String status = ((Boolean)transactions.get(transaction_id_found).get(5)) ? "Pending" : "Claimed";
                    if(flagging==0){
                        System.out.println("Transaction does not Exist!");
                    }else{
                        if((Boolean)transactions.get(transaction_id_found).get(5)){
                            System.out.println("Already Claimed");
                        }else{
                            ArrayList myobj = transactions.get(transaction_id_found);
                            myobj.set(5,true);
                            transactions.set(transaction_id_found,myobj);
                            System.out.println("Transaction found : " + "["+transactions.get(transaction_id_found).get(0)+", "
                                    +transactions.get(transaction_id_found).get(1)+", "
                                    +transactions.get(transaction_id_found).get(2)+", "
                                    +transactions.get(transaction_id_found).get(3)+", "
                                    +transactions.get(transaction_id_found).get(4)+ ", "
                                    +status + "]"
                            );
                            System.out.println("\n\n=== RECEIPT ===\nTRANSACTION CODE : "
                                    +transactions.get(transaction_id_found).get(0)+
                                    "\nNAME OF SENDER : "+transactions.get(transaction_id_found).get(1)+
                            "\nNAME OF RECIPIENT : "+ transactions.get(transaction_id_found).get(2)+
                                    "\nAMOUNT TO BE CLAIMED: " +transactions.get(transaction_id_found).get(3)+
                                    "\n=== THANK YOU ==="
                                    );
                        }
                    }

                }
                case "l" -> {
                    System.out.println("---Pending Transactions---");
                    for (int z = 0; z < transactions.size(); z++){
                        if (!((boolean) transactions.get(z).get(5))){
                            System.out.println(transactions.get(z));
                        }
                    }
                    System.out.println("");
                    System.out.println("---Claimed Transaction---");
                    for (int z = 0; z < transactions.size(); z++){
                        if ((boolean) transactions.get(z).get(5)){
                            System.out.println(transactions.get(z));
                        }
                    }

                }// end of list

                case "e" -> {
                    System.out.print("Thanks");
                    System.exit(0);
                }
                default -> {
                    System.out.print("Invalid Input! ");
                }

            }
                    System.out.print("\nDo you have another transaction? Yes or No: ");
                    answer = sc.next();
        }while ("Yes".equalsIgnoreCase(answer));
                    System.out.println("THANKS COME AGAIN PO!");
  }
}