<h1>Список статей</h1>
<ol>
    <?php
    foreach ($posts as $post) {
        echo '<li>' . $post->title  .'</li>';
        echo '<p style="margin: 0 0 0 10px">' . $post->text . '</p>';
    }
    ?>
</ol>