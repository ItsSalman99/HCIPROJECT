<div class="cover-product-image">
    <div class="product-image-grid">
        <!-- header -->
        <div class="box">
            <p class=" opacity-07 font-weight-500">Product</p>
        </div>
        <div class="box">
            <p class=" opacity-07 font-weight-500">SKU</p>
        </div>
        <div class="box">
            <p class=" opacity-07 font-weight-500">All Images</p>
        </div>
        <!-- rows 1 -->
        <div class="box">
            <p>Black D*lta Boots (DMS)</p>
        </div>
        <div class="box">
            <p>5000</p>
        </div>
        <div class="box">
            <div class="d-flex align-items-center gap-2">
                <?php for ($a = 1; $a <= 8; $a++) { ?>
                    <div class="upload-image-box-v1">
                        <label for="pImageRow1.<?php echo $a ?>">
                            <i class="material-icons">
                                add
                            </i>
                            <p>200 x 200</p>
                            <img id="pImage1.<?php echo $a ?>" alt="">
                            <input type="file" id="pImageRow1.<?php echo $a ?>" hidden onchange="document.getElementById('pImage1.<?php echo $a ?>').src = window.URL.createObjectURL(this.files[0])">
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- rows 2 -->
        <div class="box">
            <p>Black D*lta Boots (DMS)</p>
        </div>
        <div class="box">
            <p>5000</p>
        </div>
        <div class="box">
            <div class="d-flex align-items-center gap-2">
                <?php for ($a = 1; $a <= 8; $a++) { ?>
                    <div class="upload-image-box-v1">
                        <label for="pImageRow2.<?php echo $a ?>">
                            <i class="material-icons">
                                add
                            </i>
                            <p>200 x 200</p>
                            <img id="pImage2.<?php echo $a ?>" alt="">
                            <input type="file" id="pImageRow2.<?php echo $a ?>" hidden onchange="document.getElementById('pImage2.<?php echo $a ?>').src = window.URL.createObjectURL(this.files[0])">
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- rows 3 -->
        <div class="box">
            <p>Black D*lta Boots (DMS)</p>
        </div>
        <div class="box">
            <p>5000</p>
        </div>
        <div class="box">
            <div class="d-flex align-items-center gap-2">
                <?php for ($a = 1; $a <= 8; $a++) { ?>
                    <div class="upload-image-box-v1">
                        <label for="pImageRow3.<?php echo $a ?>">
                            <i class="material-icons">
                                add
                            </i>
                            <p>200 x 200</p>
                            <img id="pImage3.<?php echo $a ?>" alt="">
                            <input type="file" id="pImageRow3.<?php echo $a ?>" hidden onchange="document.getElementById('pImage3.<?php echo $a ?>').src = window.URL.createObjectURL(this.files[0])">
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- rows 4 -->
        <!-- rows 5 -->
    </div>
</div>