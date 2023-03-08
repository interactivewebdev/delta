@extends('layouts.app');
@section('custom-css-tags')
    <link href="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/css/smart_wizard_all.min.css" rel="stylesheet"
        type="text/css" />
@endsection
@section('custom-script-tags')
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript">
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
        <form action="{{ url('/admin//product/store') }}" method="post" enctype="multipart/form-data" id="product-form">
            <div id="smartwizard">
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link" href="#step-1">Step 1<br /><small>Product Info</small></a></li>
                    <li class="nav-item"><a class="nav-link" href="#step-2">Step 2<br /><small>Marketing Data</small></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#step-3">Step 3<br /><small>Product Image</small></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#step-4">Step 4<br /><small>Description</small></a></li>
                    <li class="nav-item"><a class="nav-link" href="#step-5">Step 5<br /><small>Filters</small></a></li>
                    <li class="nav-item"><a class="nav-link" href="#step-6">Step 6<br /><small>Tab Sections</small></a></li>
                    <li class="nav-item"><a class="nav-link" href="#step-7">Step 7<br /><small>Product Attribute</small></a>
                    </li>
                </ul>
                <div class="tab-content my-4">
                    <div class="tab-pane" id="step-1" class="p-4">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mt-4">
                                    <label>Category<span class="text-danger">*</span></label>
                                    <select class="form-control" name="category" required
                                        onchange="changeCategory(this, 'subcategory1')">
                                        <option value="">-- Select --</option>
                                        @foreach ($categories as $c)
                                            <option value="{{ $c->category_id }}">{{ $c->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mt-4">
                                    <label>Sub-Category<span class="text-danger">*</span></label>
                                    <select class="form-control" name="subcategory1" id="subcategory1" required
                                        onchange="changeCategory(this, 'subcategory2')">
                                        <option value="">-- Select --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mt-4">
                                    <label>Sub Sub Category</label>
                                    <select class="form-control" name="subcategory2" id="subcategory2">
                                        <option value="">-- Select --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="form-group mt-4">
                                    <label>Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter title" value="">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group mt-4">
                                    <label for="price">Price<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control w-50" name="price" id="price"
                                        placeholder="Enter price" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="step-2" class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="metatitle">Meta Title<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="metatitle" id="metatitle"
                                        placeholder="Enter meta title" value="<?php echo isset($product) ? $product->metatitle : ''; ?>">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="metakeyword">Meta Keyword<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="metakeyword" id="metakeyword"
                                        placeholder="Enter meta keyword" value="<?php echo isset($product) ? $product->metakeyword : ''; ?>">
                                </div>
                                <div class="form-group mt-4">
                                    <label for="metadesc">Meta Description<span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="metadesc" name="metadesc" placeholder="Meta Description"><?php echo isset($product) ? $product->metadesc : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="step-3" class="p-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mt-4">
                                    <label for="image">Upload Image<span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image"
                                                name="image" accept="image/png, image/jpeg">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="text-warning"><i>[Image Dimension: 400x600]</i></div>
                                </div>
                                <?php if(isset($product) && $product->image != '') {?>
                                <div><img src="<?php echo $product->image; ?>" width="100"></div>
                                <?php }?>
                                <div class="form-group mt-4">
                                    <label for="image">Upload List Image<span class="text-danger">*</span></label>
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
                    <div class="tab-pane" id="step-4" class="p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <label for="short_desc">Short Description<span class="text-danger">*</span></label>
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
                    <div class="tab-pane" id="step-5" class="p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <label for="certification">Certification<span class="text-danger">*</span></label>
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
                    <div class="tab-pane" id="step-6" class="p-4">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group mt-4">
                                    <label for="adv_heading">Advantages Heading</label>
                                    <input type="text" class="form-control" name="adv_heading" id="adv_heading"
                                        placeholder="Enter heading" value="<?php echo isset($product) ? $product->adv_heading : ''; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label for="adv_title1">Advantage Title 1</label>
                                    <input type="text" class="form-control" name="adv_title1" id="adv_title1"
                                        placeholder="Enter advantage title 1" value="<?php echo isset($product) ? $product->adv_title1 : ''; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label for="adv_desc1">Advantage Short Description</label>
                                    <textarea class="form-control" id="adv_desc1" name="adv_desc1" placeholder="Short Description"><?php echo isset($product) ? $product->adv_desc1 : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <label for="adv_img1">Upload Advantage Image 1</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="adv_img1"
                                                name="adv_img1" accept="image/png, image/jpeg">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="text-warning"><i>[Image Dimension: 200x200]</i></div>
                                </div>
                                <?php if (isset($product) && $product->adv_img1 != '') {?>
                                <div><img src="<?php echo $product->adv_img1; ?>" width="100"></div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label for="adv_title2">Advantage Title 2</label>
                                    <input type="text" class="form-control" name="adv_title2" id="adv_title2"
                                        placeholder="Enter advantage title 2" value="<?php echo isset($product) ? $product->adv_title2 : ''; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label for="adv_desc2">Advantage Short Description</label>
                                    <textarea class="form-control" id="adv_desc2" name="adv_desc2" placeholder="Short Description"><?php echo isset($product) ? $product->adv_desc2 : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-4">
                                    <label for="adv_img2">Upload Advantage Image 2</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="adv_img2"
                                                name="adv_img2" accept="image/png, image/jpeg">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div class="text-warning"><i>[Image Dimension: 200x200]</i></div>
                                </div>
                                <?php if (isset($product) && $product->adv_img2 != '') {?>
                                <div><img src="<?php echo $product->adv_img2; ?>" width="100"></div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label for="adv_title3">Advantage Title 3</label>
                                    <input type="text" class="form-control" name="adv_title3" id="adv_title3"
                                        placeholder="Enter advantage title 3" value="<?php echo isset($product) ? $product->adv_title3 : ''; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label for="adv_desc3">Advantage Short Description</label>
                                    <textarea class="form-control" id="adv_desc3" name="adv_desc3" placeholder="Short Description"><?php echo isset($product) ? $product->adv_desc3 : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-4">
                                    <label for="adv_img3">Upload Advantage Image 3</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="adv_img3"
                                                name="adv_img3" accept="image/png, image/jpeg">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
                                        </div>
                                    </div>
                                    <div class="text-warning"><i>[Image Dimension: 200x200]</i></div>
                                </div>
                                <?php if (isset($product) && $product->adv_img3 != '') {?>
                                <div><img src="<?php echo $product->adv_img3; ?>" width="100"></div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label for="adv_title4">Advantage Title 4</label>
                                    <input type="text" class="form-control" name="adv_title4" id="adv_title4"
                                        placeholder="Enter advantage title 4" value="<?php echo isset($product) ? $product->adv_title4 : ''; ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mt-4">
                                    <label for="adv_desc4">Advantage Short Description</label>
                                    <textarea class="form-control" id="adv_desc4" name="adv_desc4" placeholder="Short Description"><?php echo isset($product) ? $product->adv_desc4 : ''; ?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mt-4">
                                    <label for="adv_img4">Upload Advantage Image 4</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="adv_img4"
                                                name="adv_img4" accept="image/png, image/jpeg">
                                            <label class="custom-file-label" for="exampleInputFile">Choose
                                                file</label>
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
                    <div class="tab-pane" id="step-7" class="p-4">
                        <div class="row">
                            @if (is_array($filters) && count($filters) > 0)
                                @foreach ($filters as $item)
                                    <div class="col-6">
                                        <div class="form-group mt-4">
                                            <label for="{{ $item['filter_id'] }}">{{ $item['title'] }}</label>
                                            <select name="attributes[]" class="form-control"
                                                id="{{ $item['filter_id'] }}">
                                                <option value="">-- Select --</option>
                                                @foreach ($item['attributes'] as $rec)
                                                    <option value="{{ $rec['category_filter_id'] }}">
                                                        {{ $rec['value'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                No attributes added with this category.
                            @endif
                        </div>
                    </div>
                </div>
                <!-- Include optional progressbar HTML -->
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('custom-css-styles')
    <style>
        .form-control:focus {
            color: #495057;
            background-color: #fff;
            border-color: #80bdff;
            outline: 0;
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

        .toolbar {
            display: block !important;
        }
    </style>
@endsection

@section('custom-js-script')
    <script>
        var currentStep = 0;

        $(document).ready(function() {
            $('#smartwizard').smartWizard({
                selected: 0,
                theme: 'arrows',
                autoAdjustHeight: true,
                transitionEffect: 'fade',
                showStepURLhash: false,
                getContent: provideContent,
                toolbar: {
                    position: 'bottom', // none|top|bottom|both
                    showNextButton: true, // show/hide a Next button
                    showPreviousButton: true, // show/hide a Previous button
                    extraHtml: `<button type="button" class="btn btn-success" onclick="onFinish()">Finish</button>
                <button type="button" class="btn btn-secondary" onclick="onCancel()">Cancel</button>`, // Extra html to show on toolbar
                },
            });

            $("#smartwizard").on("leaveStep", function(e, anchorObject, currentStepIndex, nextStepIndex,
                stepDirection) {
                var formStepComplete = true;
                const productForm = $('#product-form')[0];

                currentStep = currentStepIndex;
                console.log(currentStep);

                // Validation for step 1
                if (currentStepIndex == 0 && stepDirection == "forward") {
                    if (!productForm.category.value || !productForm.subcategory1.value || !productForm.title
                        .value || !productForm.price.value) {
                        formStepComplete = false;
                    }
                }

                // Validation for step 2
                if (currentStepIndex == 1 && stepDirection == "forward") {
                    if (!productForm.metatitle.value || !productForm.metakeyword.value || !productForm
                        .metadesc.value) {
                        formStepComplete = false;
                    }
                }

                // Validation for step 3
                if (currentStepIndex == 2 && stepDirection == "forward") {
                    if (!productForm.image.value || !productForm.list_image.value) {
                        formStepComplete = false;
                    }
                }

                // Validation for step 4
                if (currentStepIndex == 3 && stepDirection == "forward") {
                    if (!productForm.short_desc.value) {
                        formStepComplete = false;
                    }
                }

                // Validation for step 5
                if (currentStepIndex == 4 && stepDirection == "forward") {
                    if (!productForm.certification.value) {
                        formStepComplete = false;
                    }
                }

                // console.log('form-data', productForm.title.value);
                // console.log(e, anchorObject, currentStepIndex, nextStepIndex, stepDirection)
                // return confirm("Do you want to leave the step " + currentStepIndex + "?");

                if (!formStepComplete) {
                    alert("Please fill required fields data first...");
                    return false;
                } else
                    return true;
            });
        });

        function changeCategory(obj, eid) {
            $.ajax({
                type: "post",
                url: "{{ url('/admin/getCategories') }}",
                data: {
                    'category_id': obj.value
                },
                success: function(response) {
                    $('#' + eid).find('option').remove();
                    $('#' + eid)
                        .append($("<option></option>")
                            .attr("value", "")
                            .text("-- Select --"));
                    response.forEach(element => {
                        $('#' + eid)
                            .append($("<option></option>")
                                .attr("value", element.category_id)
                                .text(element.title));
                    });

                }
            });
        }

        function provideContent(idx, stepDirection, stepPosition, selStep, callback) {
            console.log(idx, stepDirection, stepPosition, selStep);
            callback();
        }

        function onFinish() {
            console.log(currentStep);
            if (currentStep == 5) {
                console.log(currentStep);
                console.log($('#product-form').serialize());

                $.ajax({
                    type: 'POST',
                    url: {{ url('/admin/product-form') }},
                    data: $('#product-form').serialize(),
                    success: function() {
                        alert("successful post");
                    }
                });
            } else {
                alert("Please complete all steps first, then finish it.");
            }
        }

        function onCancel() {
            $('#smartwizard').smartWizard("reset");
        }
    </script>
@endsection
