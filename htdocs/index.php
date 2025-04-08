<!-- filepath: /workspaces/Performance-Task-3/htdocs/index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State Income Tax Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h1 {
            color: #333;
        }
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>State Income Tax Calculator</h1>
        <form method="POST">
            <label for="hourlyRate">Enter Hourly Rate ($):</label>
            <input type="number" id="hourlyRate" name="hourlyRate" step="0.01" required>
            <button type="submit">Calculate</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hourlyRate = $_POST['hourlyRate'];
            $workDays = 26;
            $hoursPerDay = 8;
            $grossIncome = $hourlyRate * $hoursPerDay * $workDays;

            $tax = 0;
            if ($grossIncome > 30000) {
                $tax = ($grossIncome - 30000) * 0.10 + (15000 * 0.05);
            } elseif ($grossIncome > 15000) {
                $tax = ($grossIncome - 15000) * 0.05;
            }

            $netIncome = $grossIncome - $tax;

            echo "<div class='result'>";
            echo "<p>Gross Income: $" . number_format($grossIncome, 2) . "</p>";
            echo "<p>Tax: $" . number_format($tax, 2) . "</p>";
            echo "<p><strong>Net Income: $" . number_format($netIncome, 2) . "</strong></p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>