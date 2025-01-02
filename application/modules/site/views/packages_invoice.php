<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .invoice-container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }

        .header .site-logo {
            display: flex;
            align-items: center;
        }

        .header .site-logo img {
            width: 50px;
            margin-right: 10px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .invoice-details {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .invoice-details div {
            line-height: 1.5;
        }

        .items-table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .items-table th {
            background-color: #f4f4f4;
        }

        .total-section {
            margin-top: 20px;
            text-align: right;
        }

        .payment-method {
            margin-top: 20px;
            line-height: 1.5;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #777;
        }

        .footer .contact-info {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding: 10px;
            background-color: #f4f4f4;
        }

        .footer .contact-info div {
            text-align: center;
        }

        .invoice-container {
            page-break-inside: avoid;
            page-break-before: auto;
            page-break-after: auto;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
        }

        .items-table th,
        .items-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .total-section {
            margin-top: 20px;
            page-break-inside: avoid;
            /* Avoid breaking inside this section */
        }

        .payment-method {
            margin-top: 20px;
            page-break-inside: avoid;
        }
    </style>
</head>

<body>
    <div class="invoice-container" id="printableArea">
        <div class="header" style="box-shadow: none;">
            <div class="site-logo">
                <a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>setting_img/logo.png" alt="Rokomari IT Ltd" style="width: 60px;"></a>
            </div>
            <div>
                <h1>INVOICE</h1>
            </div>
        </div>

        <div class="invoice-details">
            <div>
                <strong>Invoice to:</strong><br>
                <?php echo $payment_info->cus_name; ?><br>
                <?php echo $payment_info->cus_add2; ?>,<br>
                <?php echo $payment_info->cus_city; ?>
            </div>
            <div>
                <strong>Invoice#</strong>: <?php echo substr($payment_info->mer_txnid, -6); ?><br>
                <strong>Date</strong>: <?php echo date('d-M-Y', strtotime($payment_info->date)); ?>
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Market Price</th>
                    <th>Regular Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $packages_item = json_decode($package_info->packages_item);
                $total_market_price = 0; // Initialize
                $total_regular_price = 0; // Initialize
                ?>
                <?php foreach ($packages_item as $key => $item): ?>
                    <?php
                    $market_price = (float) $item->market_price;
                    $regular_price = (float) $item->regular_price;

                    // Add to totals
                    $total_market_price += $market_price;
                    $total_regular_price += $regular_price;
                    ?>
                    <tr>
                        <td><?php echo $item->name; ?></td>
                        <td><?php echo $item->market_price; ?></td>
                        <td><?php echo $item->regular_price; ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <div class="total-section">
            <strong>Subtotal:</strong> <span><?php echo $total_regular_price; ?></span><br>
            <strong>Discount:</strong> <span><?php echo $package_info->amount; ?> %</span><br>
            <?php
            // Calculate discounted price using percentage
            // if ($package_info->amount > 0) {
            //     $discount_percentage = $package_info->amount; // Assume $row->amount is the discount percentage
            //     $discounted_price = $total_regular_price - ($total_regular_price * $discount_percentage / 100);
            // } else {
            //     $discounted_price = $total_regular_price;
            // }
            // 

            $due_amount = ($total_regular_price - $payment_info->amount)

            ?>
            <strong>Pay For Package:</strong> <span style="font-size: 20px;"><?php echo $package_info->user_payment; ?>%</span><br>
            <strong>User Total Pay:</strong> <span style="font-size: 20px;"><?php echo $payment_info->amount; ?></span><br>
            <strong>User Due Pay:</strong> <span style="font-size: 20px; color:red"><?php echo $due_amount; ?></span>
        </div>

        <div class="payment-method">
            <strong>PAYMENT METHOD</strong><br>
            <?php echo $payment_info->payment_type; ?><br>
            Package Name: <?php echo $package_info->packages_name; ?><br>
            Transaction No.: <?php echo $payment_info->mer_txnid; ?><br>
            Pay by: <?php echo date('d-M-Y', strtotime($payment_info->date)); ?>
        </div>

        <div class="footer">
            Thank you for your business!
        </div>
    </div>
    <div style="display: flex; justify-content: center; margin-top: 20px;">
        <button class="btn btn-primary" onclick="printDiv('printableArea')" id="download-pdf">Print Invoice</button>
    </div>



    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;

            var printWindow = window.open('', '_blank', 'width=800,height=600');
            printWindow.document.write(`
                <html>
                <head>
                <title>Print Invoice</title>
                <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                }

                .invoice-container {
                    max-width: 800px;
                    margin: 20px auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                .header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    border-bottom: 2px solid #ccc;
                    padding-bottom: 10px;
                }

                .header .logo {
                    display: flex;
                    align-items: center;
                }

                .header .logo img {
                    width: 50px;
                    margin-right: 10px;
                }

                .header h1 {
                    font-size: 24px;
                    margin: 0;
                }

                .invoice-details {
                    margin-top: 20px;
                    display: flex;
                    justify-content: space-between;
                }

                .invoice-details div {
                    line-height: 1.5;
                }

                .items-table {
                    width: 100%;
                    margin-top: 20px;
                    border-collapse: collapse;
                }

                .items-table th,
                .items-table td {
                    border: 1px solid #ccc;
                    padding: 10px;
                    text-align: left;
                }

                .items-table th {
                    background-color: #f4f4f4;
                }

                .total-section {
                    margin-top: 20px;
                    text-align: right;
                }

                .payment-method {
                    margin-top: 20px;
                    line-height: 1.5;
                }

                .footer {
                    margin-top: 40px;
                    text-align: center;
                    font-size: 14px;
                    color: #777;
                }

                .footer .contact-info {
                    display: flex;
                    justify-content: space-between;
                    margin-top: 20px;
                    padding: 10px;
                    background-color: #f4f4f4;
                }

                .footer .contact-info div {
                    text-align: center;
                }

                .invoice-container {
                    page-break-inside: avoid;
                    page-break-before: auto;
                    page-break-after: auto;
                }

                .items-table {
                    width: 100%;
                    border-collapse: collapse;
                }

                .items-table th,
                .items-table td {
                    border: 1px solid #ccc;
                    padding: 10px;
                    text-align: left;
                }

                .total-section {
                    margin-top: 20px;
                    page-break-inside: avoid;
                    /* Avoid breaking inside this section */
                }

                .payment-method {
                    margin-top: 20px;
                    page-break-inside: avoid;
                }
                    </style>
                </head>
                <body>
                    ${printContents}
                </body>
                </html>
            `);
            printWindow.document.close();
            printWindow.print();
        }
    </script>



</body>

</html>