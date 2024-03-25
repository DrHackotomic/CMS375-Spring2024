<!DOCTYPE html>
<html>

<head>
    <title>
        Test HTML?
    </title>
</head>

<body style="text-align:center;">
    <h1 style="color:green;">
        Test the Code 
    </h1>
    <?php
    if(array_key_exists('button',$_POST))
        button();
    
        function button(){
            echo 'Hello!';
        }
        echo 'Hello!';
    ?>

    <form method="post">
        <input type="submit" name="button"
            class="button" value="button" />
    </form>

    <form method="post">
        <input type="submit" name="name"
            class="button" value="Go" />
    </form>

</body>
</html>