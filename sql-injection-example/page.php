<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQL Injection - Vulnerable Site</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
</head>
<body>

    <form class="form" action="./index.php" method="get">
        <input class="form-username" type="text" name="username" placeholder="username">
        <input class="form-password" type="text" name="password" placeholder="password">
        <input class="button-submit" type="submit" value="Search">
    </form>

    <?php if(isset($result)): ?>
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <?php
                        // Get the field names (column names) from the result set
                        $field_names = $result->fetch_fields();
                        
                        // Output table headers based on field names
                        foreach ($field_names as $field) {
                            echo "<th>" . $field->name . "</th>";
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are rows returned from the query
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            // Output table data based on field names
                            foreach ($field_names as $field) {
                                echo "<td>" . $row[$field->name] . "</td>";
                            }
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='" . count($field_names) . "'>No data found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <details>
            <summary>View SQL</summary>
            <pre><?php echo $sql; ?></pre>
        </details>
    <?php endif; ?>

    <script src="./script.js"></script>
</body>
</html>
