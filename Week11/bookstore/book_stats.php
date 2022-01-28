<?php 
// $title = 'Book Stats';
// require_once 'common/header.php';
// require_once 'db/conn.php';

require_once('TCPDF-main/tcpdf.php');
require_once('db/conn.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);



// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 20);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'Total money generated for each book', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 8);


$sql_query = "select isbn, SUM(ordered_books.price_paid * ordered_books.quantity) as total_generated 
                from book inner join ordered_books on book.id = ordered_books.book_id 
                inner join customer_orders on ordered_books.customer_order_id = customer_orders.id 
                GROUP by book.id order by total_generated DESC;";


$rows = res_from_query($sql_query);

$tbl = '<table cellspacing="0" cellpadding="1" border="1">
            <tr>
                <td>Book ISBN</td>
                <td>Total money generated</td>
            </tr>';
foreach ($rows as $row) {
    $isbn = $row['isbn'];
    $total = $row['total_generated'];
    $tbl .= "<tr>
                <td>$isbn</td>
                <td>$total</td>
            </tr>";
}
$tbl .= '</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');



//Close and output PDF document
$pdf->Output('example_04822.pdf', 'I');



?>