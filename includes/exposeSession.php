<script>
    let phpSession = JSON.parse('<?php echo json_encode($_SESSION); ?>');
    for (const key in phpSession) {
        if (Object.hasOwnProperty.call(phpSession, key)) {
            const value = phpSession[key];
            sessionStorage.setItem(key, value);
        }
    }
</script>