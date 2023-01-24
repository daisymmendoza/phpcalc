<h1>Amortization Calculator</h1>

<div class="container">
    <form>
        <fieldset>
            <label>Loan Amount:</label>
            <input type="text" name="amount"><br>
            <label>Loan Term:</label>
            <input type="text" name="term"><br>
            <label>Interest Rate:</label>
            <input type="text" name="rate"><br>
            <button type="submit" name="submit" class="btn" value="submit">Calculate</button>
            <button type="reset" name="reset" class="btn" onclick="window.location.href='index.php'">Clear</button>
        </fieldset>
    </form>
</div>

<style><?php include '/applications/xampp/htdocs/calc/style.css'; ?></style>

<?php
    if (isset($_GET['submit'])) {
        // Initial values
        $P = $_GET['amount'];
        $t = $_GET['term'];
        $r = $_GET['rate'];
        $n = 12;

        // Main equations
        $p = ($r * $P)/($n * (1 - (1 + $r / $n)**-($n*$t)));
        $p = round($p, 2);
        $I = $n * $p * $t - $P;
        $I = round($I, 2);

        // Payment equations
        $payments = 12 * $t;
        $total = $payments * $p;
        $total = round($total, 2);

        // Results
        if ($p && $I && $total) {
            $output = "
                <div class='results'>
                    <p id='resultHead'>Results</p>
                    <p class='resultTxt'>Monthly payment: $$p</p>
                    <p class='resultTxt'>Total interest paid: $$I</p>
                    <p class='resultTxt'>Total cost of loan: $$total</p>
                </div>
            ";
        }
        echo $output;
    }
?>