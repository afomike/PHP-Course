<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }

            .income {
                color: green;
            }

            .expense {
                color: red;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction): ?>
                    <?php $amountClass = $transaction['amount'] >= 0 ? 'income' : 'expense'; ?>
                    <tr>
                        <td><?= formatDate($transaction['date']) ?></td>
                        <td><?= htmlspecialchars((string) $transaction['check_number']) ?></td>
                        <td><?= htmlspecialchars($transaction['description']) ?></td>
                        <td class="<?= $amountClass ?>"><?= formatCurrency($transaction['amount']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <td class="income"><?= formatCurrency($totalIncome) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <td class="expense"><?= formatCurrency($totalExpense) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <td class="<?= $netTotal >= 0 ? 'income' : 'expense' ?>"><?= formatCurrency($netTotal) ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
