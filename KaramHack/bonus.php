<!DOCTYPE html>
<html>
<body style='text-align:center;'>

    <?php
    if(array_key_exists('button', $_POST)) {
        button();
    }

    function button(){
        // Check if the 'text' field is set and not empty
        if(isset($_POST['text']) && !empty($_POST['text'])) {
            // Display the submitted text
            echo "You entered: " . htmlspecialchars($_POST['text']) . "<br>";
        }
    }
    ?>

<form method="post">
    <input type="submit" name="button" class="button" value="Button"/>
    <input type='text' name='text' class='textbox' value=''/>
    <button type="submit" formaction="KaramHack.php">GO</button>
</form>


</body> 
</html>
