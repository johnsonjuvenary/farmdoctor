<?php
session_start();
if (!isset($_SESSION['doctor'])) {
  echo "   <script>
            alert('Please Log in!')
            window.open('../doctor.php','_self')
            </script>
            ";
}
