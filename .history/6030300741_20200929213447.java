import java.util.Scanner;  // Import the Scanner class
class 6030300741 {
  public static void main(final String[] args) {

        /*
       Scanner sc = new Scanner(System.in);
        System.out.print("Insert Name : ");
        String s = sc.nextLine();
        System.out.println("Yourname " + s );
        */

        Scanner sc = new Scanner(System.in);
        Scanner sc1 = new Scanner(System.in);         

        // Prompt the user to enter taxable income
        System.out.print("Enter salary: ");
        int salary = sc.nextInt(); // เงินเดือน
        System.out.print("Enter Year cost: ");
        int a = sc.nextInt(); //รายได้ต่่อปี
        System.out.print("Enter Tax deduction: ");
        int b = sc.nextInt(); //
        System.out.print("You have other income?" );
        String asn = sc1.nextLine();        
        //int income=0;
        if (asn.equals("Y")){
          System.out.print("Input other income: ");
          int income=0;
          income = sc.nextInt();
          int TotalTax=((salary*12)-a-b+income);
          
          System.out.print("Income : " +"( "+salary +" * 12) - "+a+" - "+b+" + "+income+ " = "+ TotalTax );
          if (0<=TotalTax&&TotalTax<=150000 ){

            System.out.println("\nTAX is 0 %  \n Your tax = FREE TAX");

          }
          else if (150000<TotalTax&&TotalTax<=300000 ){ // 5
            System.out.println("\nTAX is 5 % ");
           // System.out.println("\n Step 2");
            int Caltax =(TotalTax-150000);
            int Percen = Caltax*5/100;
            System.out.println("Cal TAX " + TotalTax +" - "+" 150000 ="+Caltax+" * 5% = " +Percen );
            System.out.println("Your Tax = "+Percen+ " BTH");
          }
          else if (300000<TotalTax&&TotalTax<=500000 ){ // 10
            System.out.println("\nTAX is 10 % ");
            System.out.println("\nStep 2");
            int Caltax1 =(TotalTax-150000);
            int Caltax2 =(Caltax1-150000);
            int Percen5 = 150000*5/100;
            int Percen10 = Caltax2*10/100;
            System.out.println("Cal TAX "+TotalTax +" - "+"150000 =" +Caltax1 + "- 150000 ="+Caltax2 + " * 10 % =" + Percen10 );
            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5)+ " BTH");
          }

          else if (500000<TotalTax&&TotalTax<=750000 ){ // 15
            System.out.println("\nTAX is 15 % ");
            System.out.println("\nStep 3");
            int Caltax1 =(TotalTax-300000);
            int Caltax2 =(Caltax1-200000);
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = Caltax2*15/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"300000 =" +Caltax1 + "- 200000 ="+Caltax2 + " * 15 % =" + Percen15 );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15)+ " BTH");
          }
          else if (750000<TotalTax&&TotalTax<=1000000 ){ // 20
            System.out.println("\nTAX is 20 % ");
            System.out.println("\nStep 4");
            int Caltax1 =(TotalTax-500000);/*** */
            int Caltax2 =(Caltax1-250000);//*** */
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = 250000*15/100;
            int Percen20 = Caltax2*20/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"500000 = " +Caltax1 + "- 250000 = "+Caltax2 + " * 20 % = " + Percen20 );/** */
            System.out.println("\nStep 3");
            System.out.println("Cal TAX 250000 * 15% = 37500" );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15+Percen20)+ " BTH");//** */
          }
          else if (1000000<TotalTax&&TotalTax<=2000000 ){ // 25
            System.out.println("\nTAX is 25 % ");
            System.out.println("\nStep 5");
            int Caltax1 =(TotalTax-750000);/*** */
            int Caltax2 =(Caltax1-250000);//*** */
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = 250000*15/100;
            int Percen20 = 250000*20/100;
            int Percen25 = Caltax2*25/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"750000 = " +Caltax1 + "- 250000 = "+Caltax2 + " * 25 % = " + Percen25 );/** */
            
            System.out.println("\nStep 4");
            System.out.println("Cal TAX 250000 * 20% = 50000" );

            System.out.println("\nStep 3");
            System.out.println("Cal TAX 250000 * 15% = 37500" );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15+Percen20+Percen25)+ " BTH");//** */
          }
          else if (2000000<TotalTax&&TotalTax<=5000000 ){ // 30
            System.out.println("\nTAX is 30 % ");
            System.out.println("\nStep 6");
            int Caltax1 =(TotalTax-1000000);/*** */
            int Caltax2 =(Caltax1-1000000);//*** */
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = 250000*15/100;
            int Percen20 = 250000*20/100;
            int Percen25 = 1000000*25/100;
            int Percen30 = Caltax2*30/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"1000000 = " +Caltax1 + "- 1000000 = "+Caltax2 + " * 30 % = " + Percen30 );/** */
            System.out.println("\nStep 5");
            System.out.println("Cal TAX 250000 * 25% = 250000" );
            System.out.println("\nStep 4");
            System.out.println("Cal TAX 250000 * 20% = 50000" );

            System.out.println("\nStep 3");
            System.out.println("Cal TAX 250000 * 15% = 37500" );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15+Percen20+Percen25+Percen30)+ " BTH");//** */
          }
          else{ //35
            System.out.println("\nTAX is 35 % ");
            System.out.println("\nStep 7");
            int Caltax1 =(TotalTax-2000000);/*** */
            int Caltax2 =(Caltax1-3000000);//*** */
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = 250000*15/100;
            int Percen20 = 250000*20/100;
            int Percen25 = 1000000*25/100;
            int Percen30 = 3000000*30/100;
            int Percen35 = Caltax2*35/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"2000000 = " +Caltax1 + "- 3000000 = "+Caltax2 + " * 35 % = " + Percen35 );/** */
            System.out.println("\nStep 6");
            System.out.println("Cal TAX 3000000 * 30% = 900000" );
            System.out.println("\nStep 5");
            System.out.println("Cal TAX 250000 * 25% = 250000" );
            System.out.println("\nStep 4");
            System.out.println("Cal TAX 250000 * 20% = 50000" );

            System.out.println("\nStep 3");
            System.out.println("Cal TAX 250000 * 15% = 37500" );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15+Percen20+Percen25+Percen30+Percen35)+ " BTH");//** */
          }
        
          



        }

        if (asn.equals("N")){
          
          ;
          int TotalTax=((salary*12)-a-b);
          
          System.out.print("Income : " +"( "+salary +" * 12) - "+a+" - "+b+ " = "+ TotalTax );
          if (0<=TotalTax&&TotalTax<=150000 ){

            System.out.println("\nTAX is 0 %  \n Your tax = FREE TAX");

          }
          else if (150000<TotalTax&&TotalTax<=300000 ){ // 5
            System.out.println("\nTAX is 5 % ");
           // System.out.println("\n Step 2");
            int Caltax =(TotalTax-150000);
            int Percen = Caltax*5/100;
            System.out.println("Cal TAX " + TotalTax +" - "+" 150000 ="+Caltax+" * 5% = " +Percen );
            System.out.println("Your Tax = "+Percen+ " BTH");
          }
          else if (300000<TotalTax&&TotalTax<=500000 ){ // 10
            System.out.println("\nTAX is 10 % ");
            System.out.println("\nStep 2");
            int Caltax1 =(TotalTax-150000);
            int Caltax2 =(Caltax1-150000);
            int Percen5 = 150000*5/100;
            int Percen10 = Caltax2*10/100;
            System.out.println("Cal TAX "+TotalTax +" - "+"150000 =" +Caltax1 + "- 150000 ="+Caltax2 + " * 10 % =" + Percen10 );
            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5)+ " BTH");
          }

          else if (500000<TotalTax&&TotalTax<=750000 ){ // 15
            System.out.println("\nTAX is 15 % ");
            System.out.println("\nStep 3");
            int Caltax1 =(TotalTax-300000);
            int Caltax2 =(Caltax1-200000);
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = Caltax2*15/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"300000 =" +Caltax1 + "- 200000 ="+Caltax2 + " * 15 % =" + Percen15 );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15)+ " BTH");
          }
          else if (750000<TotalTax&&TotalTax<=1000000 ){ // 20
            System.out.println("\nTAX is 20 % ");
            System.out.println("\nStep 4");
            int Caltax1 =(TotalTax-500000);/*** */
            int Caltax2 =(Caltax1-250000);//*** */
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = 250000*15/100;
            int Percen20 = Caltax2*20/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"500000 = " +Caltax1 + "- 250000 = "+Caltax2 + " * 20 % = " + Percen20 );/** */
            System.out.println("\nStep 3");
            System.out.println("Cal TAX 250000 * 15% = 37500" );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15+Percen20)+ " BTH");//** */
          }
          else if (1000000<TotalTax&&TotalTax<=2000000 ){ // 25
            System.out.println("\nTAX is 25 % ");
            System.out.println("\nStep 5");
            int Caltax1 =(TotalTax-750000);/*** */
            int Caltax2 =(Caltax1-250000);//*** */
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = 250000*15/100;
            int Percen20 = 250000*20/100;
            int Percen25 = Caltax2*25/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"750000 = " +Caltax1 + "- 250000 = "+Caltax2 + " * 25 % = " + Percen25 );/** */
            
            System.out.println("\nStep 4");
            System.out.println("Cal TAX 250000 * 20% = 50000" );

            System.out.println("\nStep 3");
            System.out.println("Cal TAX 250000 * 15% = 37500" );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15+Percen20+Percen25)+ " BTH");//** */
          }
          else if (2000000<TotalTax&&TotalTax<=5000000 ){ // 30
            System.out.println("\nTAX is 30 % ");
            System.out.println("\nStep 6");
            int Caltax1 =(TotalTax-1000000);/*** */
            int Caltax2 =(Caltax1-1000000);//*** */
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = 250000*15/100;
            int Percen20 = 250000*20/100;
            int Percen25 = 1000000*25/100;
            int Percen30 = Caltax2*30/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"1000000 = " +Caltax1 + "- 1000000 = "+Caltax2 + " * 30 % = " + Percen30 );/** */
            System.out.println("\nStep 5");
            System.out.println("Cal TAX 250000 * 25% = 250000" );
            System.out.println("\nStep 4");
            System.out.println("Cal TAX 250000 * 20% = 50000" );

            System.out.println("\nStep 3");
            System.out.println("Cal TAX 250000 * 15% = 37500" );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15+Percen20+Percen25+Percen30)+ " BTH");//** */
          }
          else{ //35
            System.out.println("\nTAX is 35 % ");
            System.out.println("\nStep 7");
            int Caltax1 =(TotalTax-2000000);/*** */
            int Caltax2 =(Caltax1-3000000);//*** */
            int Percen5 = 150000*5/100;
            int Percen10 = 200000*10/100;
            int Percen15 = 250000*15/100;
            int Percen20 = 250000*20/100;
            int Percen25 = 1000000*25/100;
            int Percen30 = 3000000*30/100;
            int Percen35 = Caltax2*35/100;

            System.out.println("Cal TAX "+TotalTax +" - "+"2000000 = " +Caltax1 + "- 3000000 = "+Caltax2 + " * 35 % = " + Percen35 );/** */
            System.out.println("\nStep 6");
            System.out.println("Cal TAX 3000000 * 30% = 900000" );
            System.out.println("\nStep 5");
            System.out.println("Cal TAX 250000 * 25% = 250000" );
            System.out.println("\nStep 4");
            System.out.println("Cal TAX 250000 * 20% = 50000" );

            System.out.println("\nStep 3");
            System.out.println("Cal TAX 250000 * 15% = 37500" );

            System.out.println("Step 2");
            System.out.println("Cal TAX 200000 * 10% = 20000" );

            System.out.println("Step 1");
            System.out.println("Cal TAX 150000 * 5% = 7500" );
            System.out.println("Your Tax = "+(Percen10+Percen5+Percen15+Percen20+Percen25+Percen30+Percen35)+ " BTH");//** */
          }


        }

        





  }



        

        
}
