<?php
session_start();
if (!isset($_SESSION['farmer'])) {
  echo "   <script>
            alert('Please Log in!')
            window.open('../index.php','_self')
            </script>
            ";
}
