<?php
$html = file_get_contents("invoicePDFTemplate.html");

$variables = ['${InvoiceID}', ' ${invoiceDate}', '${invoiceTime}', '${payer}', '${address}', '${tableRowsHTML}','${upfrontPayment}','${unclearedBalance}','${dueDate}'];
$invoiceDIR = "../invoices/";
$values = [$invoiceID, $paymentDate, $paymentTime, $payer, $address, $tableRowsHTML, $upfrontPayment,$unclearedBalance,$dueDate];
$fileCode = base64_encode("${email}${timeOfCreation}${payer}"); //payer's email and payment Date
$filename = "${invoiceDIR}${fileCode}.pdf"; //payer's email and payment Date

$html = str_ireplace($variables, $values, $html);

require_once __DIR__ . '/../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
    'mode' => 'c',
]);

$mpdf->WriteHTML($html);
$mpdf->Output($filename);
