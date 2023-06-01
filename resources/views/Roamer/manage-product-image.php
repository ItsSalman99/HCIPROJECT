@extends('layouts.roamer')
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
        <div class="product-image-table">
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>SKU</th>
                            <th>All Images</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Black D*Lta Boots (DMS)</td>
                            <td>5000</td>
                            <td>
                                <div>
                                    <div class="upload-boxs d-flex align-items-center gap-2">
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
                            </td>
                        </tr>
                        <tr>
                            <td>Black D*Lta Boots (DMS)</td>
                            <td>5000</td>
                            <td>
                                <div class="upload-boxs d-flex align-items-center gap-2">
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
                            </td>
                        </tr>
                        <tr>
                            <td>Black D*Lta Boots (DMS)</td>
                            <td>5000</td>
                            <td>
                                <div class="upload-boxs d-flex align-items-center gap-2">
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
                            </td>
                        </tr>
                        <tr>
                            <td>Black D*Lta Boots (DMS)</td>
                            <td>5000</td>
                            <td>
                                <div class="upload-boxs d-flex align-items-center gap-2">
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
                            </td>
                        </tr>
                    </tbody>
                </table>
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
