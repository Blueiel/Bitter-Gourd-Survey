<?php
$host = 'localhost';
$db = 'bitter_gourd_survey';
$user = 'root';
$pass = ''; // change if needed

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM responses ORDER BY submitted_at DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey Responses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background: #f9f9f9;
        }
        h2 {
            color: #2a7a2e;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.07);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px 10px;
            text-align: left;
        }
        th {
            background: #2a7a2e;
            color: #fff;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        .scrollable {
            overflow-x: auto;
        }
        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            background: #2a7a2e;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
        }
        .back-link:hover {
            background: #256626;
        }
    </style>
</head>
<body>
    <a href="index.html" class="back-link">&larr; Back to Survey</a>
    <h2>Survey Responses</h2>
    <div class="scrollable">
    <table>
        <tr>
            <th>#</th>
            <th>Age</th>
            <th>Occupation</th>
            <th>Income</th>
            <th>Enjoy</th>
            <th>Frequency</th>
            <th>Interested</th>
            <th>Product Type</th>
            <th>Buy Factors</th>
            <th>Price Powder</th>
            <th>Price Fresh</th>
            <th>Price Chips</th>
            <th>Price Pickles</th>
            <th>Price Tea</th>
            <th>Packaging</th>
            <th>Marketing</th>
            <th>Discover</th>
            <th>Buy Place</th>
            <th>Aware</th>
            <th>Health</th>
            <th>Submitted At</th>
        </tr>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php $i = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo htmlspecialchars($row['age']); ?></td>
                <td><?php echo htmlspecialchars($row['occupation']); ?></td>
                <td><?php echo htmlspecialchars($row['income']); ?></td>
                <td><?php echo htmlspecialchars($row['enjoy']); ?></td>
                <td><?php echo htmlspecialchars($row['frequency']); ?></td>
                <td><?php echo htmlspecialchars($row['interested']); ?></td>
                <td><?php echo htmlspecialchars($row['product_type']); ?></td>
                <td><?php echo htmlspecialchars($row['buy_factors']); ?></td>
                <td><?php echo htmlspecialchars($row['price_powder']); ?></td>
                <td><?php echo htmlspecialchars($row['price_fresh']); ?></td>
                <td><?php echo htmlspecialchars($row['price_chips']); ?></td>
                <td><?php echo htmlspecialchars($row['price_pickles']); ?></td>
                <td><?php echo htmlspecialchars($row['price_tea']); ?></td>
                <td><?php echo htmlspecialchars($row['packaging']); ?></td>
                <td><?php echo htmlspecialchars($row['marketing']); ?></td>
                <td><?php echo htmlspecialchars($row['discover']); ?></td>
                <td><?php echo htmlspecialchars($row['buy_place']); ?></td>
                <td><?php echo htmlspecialchars($row['aware']); ?></td>
                <td><?php echo htmlspecialchars($row['health']); ?></td>
                <td><?php echo htmlspecialchars($row['submitted_at']); ?></td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="21" style="text-align:center;">No responses yet.</td></tr>
        <?php endif; ?>
    </table>
    </div>
</body>
</html>
<?php
$conn->close();
?>