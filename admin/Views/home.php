<h2>Gestion de contenu de pages</h2>
<section class="content">
    <div class="misenform">
        <?php if (!empty($contents)) : ?>
            <?php foreach ($contents as $index => $content) : ?>
                <form class="pages" action="" method="POST">
                    <a id="link_<?php echo $content->id; ?>"></a>

                    <h4><?php echo htmlspecialchars($titles[$index] ?? 'Titre non disponible'); ?></h4>

                    <?php if (isset($messages[$content->id])) : ?>
                        <p style="color: red;"><?php echo htmlspecialchars($messages[$content->id]); ?></p>
                    <?php endif; ?>

                    <textarea id="<?php echo $content->id; ?>" name="text_<?php echo $content->id; ?>" rows="5" cols="33"><?php echo htmlspecialchars($content->text_content ?? ''); ?></textarea>

                    <button type="submit" name="submit_<?php echo $content->id; ?>">Mettre à jour</button>
                </form>
                <?php echo $content->text_content; ?>
            <?php endforeach; ?>
        <?php else : ?>
            <p>Aucun contenu disponible à modifier.</p>
        <?php endif; ?>
    </div>
</section>

<?php if (isset($updatedId)) : ?>
    <script>
        document.getElementById("link_<?php echo $updatedId; ?>").scrollIntoView();
    </script>
<?php endif; ?>