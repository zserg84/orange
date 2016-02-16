
<div class="carousel-start-page">
    <ul class="slides">
        <?foreach($mainImages as $mainGallery):?>
            <li>
                <div class="sp-item-slide" style=" background: url('<?=$mainGallery->image->getSrc()?>');">

                </div>
            </li>
        <?endforeach?>
    </ul>
</div>