<?php
    $x1 = $y1 = $x2 = $y2 = $x3 = $y3 = 0;
    $output = '';
    if (!empty($_POST)) {
        $x1 = $_POST['x1'];
        $y1 = $_POST['y1'];
        $x2 = $_POST['x2'];
        $y2 = $_POST['y2'];
        $x3 = $_POST['x3'];
        $y3 = $_POST['y3'];
        $same = areSame($x1, $y1, $x2, $y2, $x3, $y3);
        if ($same) {
            $output = 'Given points are not different.';
        }else{
            $output = isTriangle($x1, $y1, $x2, $y2, $x3, $y3);
        }
    }
    /* function to check if points form triangle or not using slope*/
    function isTriangle($x1, $y1, $x2, $y2, $x3, $y3)
    {
        if (($y3 - $y2) * ($x2 - $x1) == ($y2 - $y1) * ($x3 - $x2)) {
            return ("Points doesn't form triangle.");
        } else {
            return ("Given points form a triangle.");
        }
    }
    // Checks if any given points are the same 
    function areSame($x1, $y1, $x2, $y2, $x3, $y3)
    {
        if ($x1 == $x2 && $y1 == $y2) {
            return true;
        }
        if ($x1 == $x3 && $y1 == $y3) {
            return true;
        }
        if($x2 == $x3 && $y2 == $y3){
            return true;
        }
        return false;
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Triangle PHP</title>
    <style>
        * {
            padding: 0px;
            margin: 0px;
            box-sizing: border-box;
        }
        body {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h2{
            background: #dddddd;
            padding: 2px 5px;
        }
        form{
            display: flex;
            width: 100%;
            flex-direction: column;
            max-width: 500px;
        }
        form label{
            font-weight: bold;
            margin-top: 10px;
            text-align: center;
            background: #000;
            color: #fff;
            width: 50px;
            border-radius: 5px 5px 0px 0px;
        }
        form[method="get"] label{
            width: 150px;
        }
        form input{
            font-size: 1.25rem;
            padding: 8px 5px;
            border: 3px solid #000;
            border-radius: 0px 5px 5px 5px;
            outline: none;
        }
        form button{
            float: right;
            padding: 8px 15px;
            border-radius: 3px;
            background-color: #c20037;
            color: #fff;
            font-weight: bolder;
            margin: 10px 5px;
        }
        form button[type='submit']{
            background: #3caea3;
        }
    </style>
    <script>
        function resetValues() {
            let fields = document.querySelectorAll('input');
            fields.forEach(f =>{
                f.value = ''
            })
        }
    </script>
</head>
<body>
    <h1>Triangle Checker PHP</h1>
    <h2>Input Fields</h2>
    <form action="/" method="post">
        <label for="x1">X<sub>1</sub></label>
        <input required type="number" value="<?php echo $x1 ? $x1 : '';?>" name="x1" id="x1">
        <label for="y1">Y<sub>1</sub></label>
        <input required type="number" value="<?php echo $y1 ? $y1 : '';?>" name="y1" id="y1">

        <label for="x2">X<sub>2</sub></label>
        <input required type="number" value="<?php echo $x2 ? $x2 : '';?>" name="x2" id="x2">
        <label for="y2">Y<sub>2</sub></label>
        <input required type="number" value="<?php echo $y2 ? $y2 : '';?>" name="y2" id="y2">
        <label for="x3">X<sub>3</sub></label>
        <input required type="number" value="<?php echo $x3 ? $x3 : '';?>" name="x3" id="x3">
        <label for="y3">Y<sub>3</sub></label>
        <input required type="number" value="<?php echo $y3 ? $y3 : '';?>" name="y3" id="y3">
        <div>
            <button type="submit" value="Submit">Check if triangle</button>
            <button onclick="resetValues()">Reset Points</button>
        </div>
    </form>
    <br><br>
    <h2>Output Field</h2>
    <form method="get">
        <label for="output">Is it a triangle ?</label>
        <input type="text" name="output" placeholder="Output here" value="<?php echo $output;?>" id="output" disabled>
    </form>
</body>