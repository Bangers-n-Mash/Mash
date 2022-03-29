<script>
    let phpSession = '<?php echo json_encode($_SESSION); ?>';
    sessionStorage.setItem('phpSession', phpSession);
</script>