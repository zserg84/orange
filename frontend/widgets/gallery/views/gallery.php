<div class="photo-gallery-container" id="gallery-container">
    <div class="gallery-display">
        <ul class="slides">
            <?foreach($images as $image):?>
            <li>
                <div class="item-gallery" data-index="0">
                    <div class="item-cell" data-background="<?=$image->getSrc()?>" style="background: url('<?=$image->getSrc()?>');">
                        <div class="item-inner-background transit-300">
                            <img src="style/images/i_gallery/item-hover.png" alt="" class="transit-300">
                        </div>
                    </div>
                </div>
            </li>
            <?endforeach?>
        </ul>
    </div>
</div>