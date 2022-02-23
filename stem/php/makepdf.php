<?php
$html = file_get_contents("invoiceTemplate.html");

$variables = ['${InvoiceID}', ' ${invoiceDate}', '${invoiceTime}', '${payer}', '${address}', '${tableRows}', '${GrandTotal}'];
$invoiceDIR = "../invoices/";
//use payer's email to fetch values from database for this array after saving it there to avoid errors
// calculate grandTotal from the foreach array above
$invoiceID = "STM000${invoiceID}"; // make it show
$amount = "#".$amount;
$values = [$invoiceID, $date, $time, $payer, $address, $tableRowsHTML, $amount];

$fileCode = base64_encode("${payerEmail}${paymentDate}${payer}"); //payer's email and payment Date
$filename = "${invoiceDIR}${fileCode}.pdf"; //payer's email and payment Date



//use payer's email to fetch values from database for this array after saving it there to avoid errors
// calculate grandTotal from the foreach array above
//$values = ['1233', '12/22/2322', '09:23am', 'Adewale bayo', '12 adewale street', $tableRowsHTML, '#115,000'];

$html = str_ireplace($variables, $values, $html);

require_once __DIR__ . '/../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'c',
]);

$mpdf->WriteHTML($html);
$mpdf->Output($filename);
