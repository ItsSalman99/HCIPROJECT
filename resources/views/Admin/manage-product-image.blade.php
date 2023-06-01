@extends('layouts.admin')
@section('content')

<div class="cover-all-content">
    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
        <h2 class="section-title">Manage <span class="primary-text">Product Image</span></h2>
        <div class="form-group m-0">
            <div class="custom-select select-icon" style="min-width:150px;background: #f2f2f2;border: 1px solid #7b7b7b4a;">
                <div class="icon">
                    <i class="bi bi-box-arrow-up"></i>
                </div>
                <select>
                    <option value="0">Export</option>
                    <option value="1">Export 1</option>
                    <option value="1">Export 2</option>
                    <option value="1">Export 3</option>
                </select>
            </div>
        </div>
    </div>
    <br>
    <br>
    <form action="">
        <div class="d-flex align-items-center gap-2">
            <div class="form-group m-0">
                <div class="custom-select" style="width:100%;">
                    <select>
                        <option value="0">Brand</option>
                        <option value="1">Standerd</option>
                        <option value="1">Pro</option>
                        <option value="1">Plus</option>
                    </select>
                </div>
            </div>
            <div class="form-group m-0">
                <input type="text" class="form-control" placeholder="Product Or SKU">
            </div>
            <button class="btn btn-primary" type="submit"><i class="material-icons">
                    search
                </i></button>
        </div>
    </form>
    <br>
    <br>
    <ul class="d-flex align-items-center flex-wrap justify-content-center justify-content-lg-start gap-3">
        <li>
            <div class="checktext">
                <input type="radio" name="skuimage" id="skuimage1" checked="">
                <label for="skuimage1">SKU image (649)</label>
            </div>
        </li>
        <li><span class="vr"></span></li>
        <li>
            <div class="checktext">
                <input type="radio" name="skuimage" id="skuimage2">
                <label for="skuimage2">SKU image (386)</label>
            </div>
        </li>
        <li><span class="vr"></span></li>
        <li>
            <div class="checktext">
                <input type="radio" name="skuimage" id="skuimage3">
                <label for="skuimage3">SKU image (649)</label>
            </div>
        </li>

    </ul>
    <br>
    <br>
    <div class="cover-inner-content">
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

        <br>
        <br>
        <br>
        <div class="d-flex align-items-center flex-wrap gap-3 justify-content-center justify-content-lg-between">
            <p class=" opacity-05 m-0">6 of 480</p>
            <div class="Cs-pagination">
                <ul>
                    <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">keyboard_double_arrow_left</i></a></li>
                    <li><a href="javascript:void(0);" class="pe-none user-select-none"><i class="material-icons">chevron_left</i></a></li>
                    <li><a href="javascript:void(0);" class="Cs-activepagination">1</a></li>
                    <li><a href="javascript:void(0);">2</a></li>
                    <li><a href="javascript:void(0);">3</a></li>
                    <li><a href="javascript:void(0);">4</a></li>
                    <li><a href="javascript:void(0);">5</a></li>

                    <li><a href="javascript:void(0);" class=" pe-none user-select-none">...</a></li>
                    <li><a href="javascript:void(0);">10</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">chevron_right</i></a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">keyboard_double_arrow_right</i></a></li>
                </ul>
            </div>
        </div>
    </div>

   @endsection
