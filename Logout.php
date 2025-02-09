<?php
session_start();
session_unset();
session_destroy();
echo '<script>
            alert("Log out succussfully");
            window.location.href = "index.php?error=none";
          </script>';
exit();
