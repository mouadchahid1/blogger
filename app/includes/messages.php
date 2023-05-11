<?php if(isset($_SESSION['message'])): ?>
  <div class="msg <?php echo $_SESSION['type']; ?>">
    <li><?php echo $_SESSION['message']; ?></li>
    <?php
      unset($_SESSION['message']);
      unset($_SESSION['type']);
    ?>
  </div>
  <script>
    setTimeout(function(){
      document.querySelector('.msg').style.display = 'none';
    }, 10000); // 20 secondes
  </script>
<?php endif; ?>
