
<div id="media_player">Loading the player ...</div>

<script type="text/javascript">
    jwplayer("media_player").setup({
        playlist: [
<?php foreach ($videos as $video) : ?>
                {
                    file: "<?php echo $video->link; ?>",
                    title: "<?php echo $video->name; ?>"
                },
<?php endforeach; ?>
        ],
        primary: "flash",
        height: 600,
        width: 800,
       
        listbar: {
            position: "right",
            size: 220}
    });
</script>





