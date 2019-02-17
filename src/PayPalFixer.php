<?php
/**
 * Created by Ahmed Maher Halima.
 * Email: phpcodertop@gmail.com
 * github: https://github.com/phpcodertop
 * Date: 18/02/2019
 * Time: 12:26 ص
 */

namespace phpcodertop\FixPayPal;


/**
 * Class FixPayPal
 * @package phpcodertop\FixPayPal
 */
class PayPalFixer {

    /**
     * @param array $data
     * @return mixed
     */
    public function process($data = [])
    {
        $newData = [];
        $sortedData = [];
        foreach ($data as $key => $row) {
            if ($row['status'] == 'denied' || $row['status'] == 'Denied' || $row['status'] == 'Pending' )
            {
                continue;
            }

            // update title
            $name = $row['name'];
            $subject = $row['subject'];
            $item_title = $row['item_title'];
            $description = '';
            if ($name != null && $name != '')
            {
                if ($name != 'PayPal'){
                    $description .= $name;
                }
            }
            if ($subject != null && $subject != '')
            {
                if ($description != '') {
                    $description .= ' - ' . $subject;
                } else {
                    $description .= $subject;
                }

            }
            if ($item_title != null && $item_title != '')
            {
                if ($description != '') {
                    $description .= ' - ' . $item_title;
                } else {
                    $description .= $item_title;
                }

            }
            switch ($row['type'])
            {
                case 'Debit Card Cash Back Bonus':
                    $description = 'Debit Card Cash Back Bonus';
                    break;
                case 'Buyer Credit Payment Withdrawal - Transfer To BML':
                    $description = 'Payment toward loan from Bill Me Later';
                    break;
                case 'Bank Deposit to PP Account (Obselete)':
                    $description = 'Loan from PayPals Bill Me Later';
                    break;
                case 'BML Credit - Transfer from BML':
                    $description = 'Loan from PayPals Bill Me Later';
                    break;
                case 'Payment Reversal':
                    $description = 'PayPal Payment Reversal';
                    break;
                case 'Reversal of ACH Deposit':
                    $description = 'Reversal of ACH Deposit';
                    break;
                case 'Reversal of General Account Hold':
                    $description = 'Reversal of General Account Hold';
                    break;
                case 'General Payment':
                    $description = 'Payment to '. $description;
                    break;
                case 'Other':
                    $description = 'Unknown';
                    break;
            }


            $row['description'] = $description;
            $row['transaction_date'] = $row['date'];
            $row['cleared_date'] = $row['date'];
            unset($row['time']);
            if ($row['reference_txn_id'] == null || $row['reference_txn_id'] == '')
            {
                $newData[] = $row;
            } else {
                // search for this id on previous array and update it
                $newData[] = $row;
                foreach ($newData as $key => $oldRow) {
                    if ($oldRow['transaction_id'] == $row['reference_txn_id']) {
                        $newData[$key]['status'] = $row['status'];
                        $newData[$key]['date'] = $row['date'];
                        //$newData[$key]['type'] = $row['type'];
                        $newData[$key]['cleared_date'] = $row['date'];
                    }
                }

            }

            foreach ($newData as $key => $data)
            {
                $sortedData[$key]['status'] = $data['status'];
                $sortedData[$key]['transaction_date'] = $data['transaction_date'];
                $sortedData[$key]['cleared_date'] = $data['cleared_date'];
                $sortedData[$key]['description'] = $data['description'];
                $sortedData[$key]['gross'] = $data['gross'];
            }

        }

        return $sortedData;
    }

}