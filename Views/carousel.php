<section class="slider-wrapper">
    <button class="slide-arrow" id="slide-arrow-prev">&#8249;</button>
    <button class="slide-arrow" id="slide-arrow-next">&#8250;</button>
    <ul class="slides-container" id="slides-container">
        <!-- Les images seront chargées ici par JavaScript -->
    </ul>
</section>
<img src="/admin/assets/imagesgalerie/172804066966ffcedd95a86.jpg" alt="Image Test" style="width: 200px; height: auto;">

<?php
$dir    = '/admin/assets/imagesgalerie/';
$files1 = scandir($dir);
$files2 = scandir($dir, SCANDIR_SORT_DESCENDING);

print_r($files1);
print_r($files2);
?>