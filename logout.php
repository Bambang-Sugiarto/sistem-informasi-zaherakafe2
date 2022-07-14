<?php

session_start();
unset($_SESSION['email']);
unset($_SESSION['pass']);

session_destroy();
echo "<script>alert('Anda telah berhasil logout');document.location='index.php'</script>";
