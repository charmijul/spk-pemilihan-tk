<?php
  session_start();
  echo $_SESSION['php_value'];
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script>
    function getValue(obj){
    var value = obj.value;
    $.ajax({
        type:"POST",
        url: '/getMiles',
        data: "val="+ value,
        dataType: 'text',
        async: false,
        cache: false,
        success: function ( result )  {
            window.location.reload();
        }
    });
}

</script>

<select onchange="getValue(this)">
<option value="1" <?php if($_SESSION['php_value'] == 1) echo 'selected';?>>One</option>
<option value="2" <?php if($_SESSION['php_value'] == 2) echo 'selected';?>>Two</option>
<option value="3" <?php if($_SESSION['php_value'] == 3) echo 'selected';?>>Three</option>
<option value="4" <?php if($_SESSION['php_value'] == 4) echo 'selected';?>>four</option>

</select>