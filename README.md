#What is this?
If you have tried to import PayPal transaction history into traditional accounting platforms such as Mint or QuickBooks you probably discovered it didn't work. This is because PayPal does a lot of unusual things that make their exports incompatible.

This application was built specifically to solve that problem. Just upload your script and click download, in seconds you'll have a properly formatted CSV or Excel file ready to be imported into any traditional accounting software.

This Package was written by Ahmed Maher Halima
For spencer hill Principal
                 At The Portland Company - A Digital Marketing Agency
                 theportlandcompany.com
#Exactly What This App Does
- Where Transaction Type is "Debit Card Cash Back Bonus" set Description to "Debit Card Cash Back Bonus"
- Where Transaction Type is "Buyer Credit Payment Withdrawal - Transfer To BML" set Description to "Payment toward loan from Bill Me Later"
- Where Transaction Type is "Bank Deposit to PP Account (Obselete)" set Description to "Loan from PayPals Bill Me Later"
- Where Transaction Type is "BML Credit - Transfer from BML" set Description to "Loan from PayPals Bill Me Later"
- Where Transaction Type is "Payment Reversal" set Description to "PayPal Payment Reversal"
- Where Transaction Type is "Reversal of ACH Deposit" set Description to "Reversal of ACH Deposit"
- Where Transaction Type is "Reversal of General Account Hold" set Description to "Reversal of General Account Hold"
- Where Transaction Type is "General Payment" set Description to "Payment to $description"
- Where Transaction Type is "Other" set Description to "Unknown"
- Exclude any Transaction with a Type of "Pending" and “Denied”
- Merge "Subject", "Name" and "Item Title" into one column to be imported into the "Description" column during import into Firefly
- Remove All fields and keep only four fields “Status, Transaction Date, Cleared Date, Description, Gross”

# Installation
<code>
composer require phpcodertop/fixpaypal
</code>

# Usage 
<code>
$processedData = FixPayPal::process($data);
</code>
