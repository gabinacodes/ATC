<?php
$html = file_get_contents("invoicePDFTemplate.html");

//$variables = ['${InvoiceID}', ' ${invoiceDate}', '${invoiceTime}', '${payer}', '${address}', '${tableRows}', '${GrandTotal}','${upfrontPayment}','${unclearedBalance}','${dueDate}'];
$invoiceDIR = "../invoices/";
//use payer's email to fetch values from database for this array after saving it there to avoid errors
// calculate grandTotal from the foreach array above
//$invoiceID = "STM000${invoiceID}"; // make it show
//$amount = "#".$amount;
$upfrontpayment = " Upfront payment:<span style='text-align: right;'> #20,000 :00 </span> ";
$unclearedBalance = "Amount to be balanced:<span> #5,000 :00 </span>";
$dueDate = "Due date: <span> dd/mm/year </span>";
//$values = [$invoiceID, $date, $time, $payer, $address, $tableRowsHTML, $amount,$upfrontpayment,$unclearedBalance,$dueDate];

//$fileCode = base64_encode("${payerEmail}${paymentDate}${payer}"); //payer's email and payment Date
$filename = "${invoiceDIR}fileCode.pdf"; //payer's email and payment Date


//use payer's email to fetch values from database for this array after saving it there to avoid errors
// calculate grandTotal from the foreach array above
//$values = ['1233', '12/22/2322', '09:23am', 'Adewale bayo', '12 adewale street', $tableRowsHTML, '#115,000'];

//$html = str_ireplace($variables, $values, $html);

require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'c',
]);

$mpdf->WriteHTML($html);
$mpdf->Output($filename);
