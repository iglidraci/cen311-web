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