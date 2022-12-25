@extends('layouts.app');
@section('custom-css-tags')
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/smart_wizard_theme_arrows.min.css" rel="stylesheet"
        type="text/css" />
@endsection
@section('custom-script-tags')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/jquery.smartWizard.min.js">
    </script>
@endsection

@section('breadcrumb')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3>Add New Product</h3>
                </div>
                <div class="col-12 col-sm-6">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"> <a class="home-item" href="{{ url('/') }}"><i
                                    data-feather="home"></i></a></li>
                        <li class="breadcrumb-item"> Dashboard</li>
                        <li class="breadcrumb-item active"> Add New Product</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Step 1<br /><small>Product Info</small></a></li>
                <li><a href="#step-2">Step 2<br /><small>Marketing Data</small></a></li>
                <li><a href="#step-3">Step 3<br /><small>Product Image</small></a></li>
                <li><a href="#step-4">Step 4<br /><small>Description</small></a></li>
                <li><a href="#step-5">Step 5<br /><small>Filters</small></a></li>
                <li><a href="#step-6">Step 6<br /><small>Tab Sections</small></a></li>
                <li><a href="#step-7">Step 7<br /><small>Product Attribute</small></a></li>
            </ul>
            <div class="mt-4">
                <div id="step-1" class="p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label>Category</label>
                                <select class="form-control" name="category" required>
                                    <option value="">-- Select --</option>
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <label>Sub-Category</label>
                                <select class="form-control" name="subcategory1" id="subcategory1" required>
                                    <option value="">-- Select --</option>
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <label>Sub Sub Category</label>
                                <select class="form-control" name="subcategory2" id="subcategory2" required>
                                    <option value="">-- Select --</option>
                                </select>
                            </div>
                            <div class="form-group mt-4">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Enter title" value="">
                            </div>
                            <div class="form-group mt-4">
                                <label for="price">Price</label>
                                <input type="text" class="form-control w-25" name="price" id="price"
                                    placeholder="Enter price" value="">
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step-2" class="p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="metatitle">Meta Title</label>
                                <input type="text" class="form-control" name="metatitle" id="metatitle"
                                    placeholder="Enter meta title" value="<?php echo isset($product) ? $product->metatitle : ''; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label for="metakeyword">Meta Keyword</label>
                                <input type="text" class="form-control" name="metakeyword" id="metakeyword"
                                    placeholder="Enter meta keyword" value="<?php echo isset($product) ? $product->metakeyword : ''; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label for="metadesc">Meta Description</label>
                                <textarea class="form-control" id="metadesc" name="metadesc" placeholder="Meta Description"><?php echo isset($product) ? $product->metadesc : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step-3" class="p-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mt-4">
                                <label for="image">Upload Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image"
                                            accept="image/png, image/jpeg">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="text-warning"><i>[Image Dimension: 400x600]</i></div>
                            </div>
                            <?php if(isset($product) && $product->image != '') {?>
                            <div><img src="<?php echo $product->image; ?>" width="100"></div>
                            <?php }?>
                            <div class="form-group mt-4">
                                <label for="image">Upload List Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="list_image"
                                            name="list_image" accept="image/png, image/jpeg">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="text-warning"><i>[Image Dimension: 200x500]</i></div>
                            </div>
                            <?php if(isset($product) && $product->list_image != '') {?>
                            <div><img src="<?php echo $product->list_image; ?>" width="100"></div>
                            <?php }?>
                            <div class="form-group mt-4">
                                <label for="banner_image">Upload Banner Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="banner_image"
                                            name="banner_image" accept="image/png, image/jpeg">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="text-warning"><i>[Image Dimension: 1600x400]</i></div>
                            </div>
                            <?php if(isset($product) && $product->banner_image != '') {?>
                            <div><img src="<?php echo $product->banner_image; ?>" width="100"></div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div id="step-4" class="p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <label for="short_desc">Short Description</label>
                                <textarea class="form-control" id="short_desc" name="short_desc" placeholder="Short Description"><?php echo isset($product) ? $product->short_desc : ''; ?></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <label for="desc">Above Description</label>
                                <textarea class="form-control" id="desc" name="description" placeholder="Description"><?php echo isset($product) ? $product->description : ''; ?></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <label for="desc">Below Description</label>
                                <textarea class="form-control" id="desc1" name="description1" placeholder="Description"><?php echo isset($product) ? $product->description1 : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step-5" class="p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <label for="certification">Certification</label>
                                <select name="certification" class="form-control" id="certification">
                                    <option value="">-- Select --</option>
                                    <option value="organic" <?php if (isset($product) && $product->certification == 'organic') {
                                        echo 'selected';
                                    } ?>>Organic</option>
                                    <option value="halal" <?php if (isset($product) && $product->certification == 'halal') {
                                        echo 'selected';
                                    } ?>>Halal</option>
                                    <option value="kosher" <?php if (isset($product) && $product->certification == 'kosher') {
                                        echo 'selected';
                                    } ?>>Kosher</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="step-6" class="p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <label for="adv_heading">Advantages Heading</label>
                                <input type="text" class="form-control" name="adv_heading" id="adv_heading"
                                    placeholder="Enter heading" value="<?php echo isset($product) ? $product->adv_heading : ''; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label for="adv_title1">Advantage Title 1</label>
                                <input type="text" class="form-control" name="adv_title1" id="adv_title1"
                                    placeholder="Enter advantage title 1" value="<?php echo isset($product) ? $product->adv_title1 : ''; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label for="adv_desc1">Advantage Short Description</label>
                                <textarea class="form-control" id="adv_desc1" name="adv_desc1" placeholder="Short Description"><?php echo isset($product) ? $product->adv_desc1 : ''; ?></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <label for="adv_img1">Upload Advantage Image 1</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="adv_img1" name="adv_img1"
                                            accept="image/png, image/jpeg">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="text-warning"><i>[Image Dimension: 200x200]</i></div>
                            </div>
                            <?php if (isset($product) && $product->adv_img1 != '') {?>
                            <div><img src="<?php echo $product->adv_img1; ?>" width="100"></div>
                            <?php }?>
                            <div class="form-group mt-4">
                                <label for="adv_title2">Advantage Title 2</label>
                                <input type="text" class="form-control" name="adv_title2" id="adv_title2"
                                    placeholder="Enter advantage title 2" value="<?php echo isset($product) ? $product->adv_title2 : ''; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label for="adv_desc2">Advantage Short Description</label>
                                <textarea class="form-control" id="adv_desc2" name="adv_desc2" placeholder="Short Description"><?php echo isset($product) ? $product->adv_desc2 : ''; ?></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <label for="adv_img2">Upload Advantage Image 2</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="adv_img2" name="adv_img2"
                                            accept="image/png, image/jpeg">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="text-warning"><i>[Image Dimension: 200x200]</i></div>
                            </div>
                            <?php if (isset($product) && $product->adv_img2 != '') {?>
                            <div><img src="<?php echo $product->adv_img2; ?>" width="100"></div>
                            <?php }?>
                            <div class="form-group mt-4">
                                <label for="adv_title3">Advantage Title 3</label>
                                <input type="text" class="form-control" name="adv_title3" id="adv_title3"
                                    placeholder="Enter advantage title 3" value="<?php echo isset($product) ? $product->adv_title3 : ''; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label for="adv_desc3">Advantage Short Description</label>
                                <textarea class="form-control" id="adv_desc3" name="adv_desc3" placeholder="Short Description"><?php echo isset($product) ? $product->adv_desc3 : ''; ?></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <label for="adv_img3">Upload Advantage Image 3</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="adv_img3" name="adv_img3"
                                            accept="image/png, image/jpeg">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="text-warning"><i>[Image Dimension: 200x200]</i></div>
                            </div>
                            <?php if (isset($product) && $product->adv_img3 != '') {?>
                            <div><img src="<?php echo $product->adv_img3; ?>" width="100"></div>
                            <?php }?>
                            <div class="form-group mt-4">
                                <label for="adv_title4">Advantage Title 4</label>
                                <input type="text" class="form-control" name="adv_title4" id="adv_title4"
                                    placeholder="Enter advantage title 4" value="<?php echo isset($product) ? $product->adv_title4 : ''; ?>">
                            </div>
                            <div class="form-group mt-4">
                                <label for="adv_desc4">Advantage Short Description</label>
                                <textarea class="form-control" id="adv_desc4" name="adv_desc4" placeholder="Short Description"><?php echo isset($product) ? $product->adv_desc4 : ''; ?></textarea>
                            </div>
                            <div class="form-group mt-4">
                                <label for="adv_img4">Upload Advantage Image 4</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="adv_img4" name="adv_img4"
                                            accept="image/png, image/jpeg">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <div class="text-warning"><i>[Image Dimension: 200x200]</i></div>
                            </div>
                            <?php if (isset($product) && $product->adv_img4 != '') {?>
                            <div><img src="<?php echo $product->adv_img4; ?>" width="100"></div>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div id="step-7" class="p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group" id="product_attribute">
                                @if (is_array($filters) && count($filters) > 0)
                                    <label>Product Attribute</label>
                                    @foreach ($filters as $item)
                                        <div class="form-group mt-4">
                                            <label for="{{ $item['filter_id'] }}">{{ $item['title'] }}</label>
                                            <select name="attributes[]" class="form-control"
                                                id="{{ $item['filter_id'] }}">
                                                <option value="">-- Select --</option>
                                                @foreach ($item['attributes'] as $rec)
                                                    <option value="{{ $rec['category_filter_id'] }}">{{ $rec['value'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endforeach
                                @else
                                    No attributes added with this category.
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-css-styles')
    <style>
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline:
                0;
            box-shadow: 0 0 0 0rem rgba(0, 123, 255, .25)
        }

        .btn-secondary:focus {
            box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
        }

        .close:focus {
            box-shadow: 0 0 0 0rem rgba(108, 117, 125, .5)
        }

        .mt-200 {
            margin-top: 200px
        }
    </style>
@endsection

@section('custom-js-script')
    <script>
        $(document).ready(function() {
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                autoAdjustHeight: true,
                transitionEffect: 'fade',
                showStepURLhash: false,
            });
        });
    </script>
@endsection
