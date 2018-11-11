</div>
<?php require('../App/views/inc/player.php');?>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
<?php if (file_exists('./js/'.$script)){ ?>
<script src=<?php  echo URLROOT.'public/js/'.$script; ?>></script>
<?php } ?>
<script src=<?php  echo URLROOT.'public/js/main.js'; ?>></script>
<script src = <?php  echo URLROOT.'public/js/playbar.js'; ?>></script>
</body>
</html>