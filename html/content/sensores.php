
<?php
while ($dat = mysqli_fetch_assoc($res)) {
    echo "{ x: " . $dat['tiempo'] . ", y: " . $dat['temperatura'] . " },";
}
?>,