
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Add new data center
        </h3>
    </div>
    <!--begin::Form-->
    <div class="card-body">


        <!--         ERROR   -->

        <div class="form-group form-group-last">
            <div class="alert alert-custom alert-default" role="alert">
                <div class="alert-icon"><i class="flaticon-warning text-primary"></i></div>
                <div class="alert-text" id="error-container">
                    Error messages
                </div>
            </div>
        </div>

        <!-- ========================================================================= block 2  -->

        <form class="form needs-validation" method="POST" action="/addProduct">
            @csrf
            <div id="block2">
                <div class="separator separator-dashed my-8"></div>

                <div class="row form-group">
                        <div class="col-4">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Product title" required>
                        </div>
                        <div class="col-4">
                            <input type="number" class="form-control" name="TVA" id="TVA" placeholder="TVA" required>
                        </div>
                </div>
                <div class="row form-group">
                    <div class="col-8">
                        <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div id="kt_repeater_1">
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label text-right">{{__('prices')}}:</label>
                            <div data-repeater-list="price" class="col-lg-10">
                                <div data-repeater-item="" class="form-group row align-items-end">
                                    <div class="col-md-3">
                                        <label>{{__('Data Center')}}</label>
                                        <input type="text" class="form-control" name="price[datacenter]" placeholder="{{__('Data Center')}}" />
                                        <div class="d-md-none mb-2"></div>
                                    </div>
                                    
                                    <div class="col-md-2">
                                    <label>{{__('price')}}</label>
                                        <input  type="number" step="0.01" class="form-control" name="price[price]" placeholder="{{__('Price')}}" />
                                        <div class="d-md-none mb-2"></div>
                                    </div>

                                    <div class="col-md-2">
                                        <label>{{__('Price Real')}}:</label>
                                        <input  type="number" step="0.01" class="form-control" name="price[price_real]" placeholder="{{__('Price Real')}}" />
                                        <div class="d-md-none mb-2"></div>
                                    </div>

                                    <div class="col-md-2">
                                        <label>{{__('Months')}}:</label>
                                        <input type="number" class="form-control" name="price[billing]" placeholder="{{__('Months')}}" />
                                        <div class="d-md-none mb-2"></div>
                                    </div>

                                    <div class="col-md-3">
                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-sm font-weight-bolder btn-light-danger">
                                        <i class="la la-trash-o"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-1 col-form-label text-right"></label>
                            <div class="col-lg-4">
                                <a href="javascript:;" data-repeater-create="" class="btn btn-sm font-weight-bolder btn-light-primary">
                                <i class="la la-plus"></i>Add</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <!-- ========================================================================= -->
                <div class="separator separator-dashed my-8"></div>
                <!-- ========================================================================= -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">{{__('app.btn_login')}}</button>
                <button type="reset" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
            <!--end::Form-->
    </div>
</div>

<script>

    description = document.querySelector('#description');
    name = document.querySelector('#dataname');

    function helperFunction(e){
        let tmp1 = document.querySelectorAll('#block4  input');
        let tmp2 = document.querySelectorAll('#block4');
        tmp1.forEach(el => {
            el.toggleAttribute('disabled');
        })
        tmp2.forEach(el => {
            el.toggleAttribute('hidden');
        })
    }

    //    validation
    // submitButton = document.querySelector('button[type="submit"]');
    // submitButton.addEventListener('click', (e) => {
    //     e.preventDefault();
    //     console.log(name);
    //     const form = document.querySelector('.needs-validation');
    //     form.classList.add('was-validated');
    //     if (form.checkValidity()) {
    //         console.log('Form valid');
    //         //check Admin :
    //             console.log('admin form');
    //             $.ajax({
    //                 url: window.location.origin + '/admin/newDataCenter',
    //                 method: "POST",
                    
    //                 data: {
    //                     name: name.trim(),
    //                     description: description.value.trim(),
    //                 },
    //                 dataType: "json",
    //             })
    //                 .done(function (data) {
    //                     document.getElementById('error-container').innerText = data.email ?? data;
    //                 });
    //     } else {
    //         console.log('form Invalid');
    //     }


    // });

    // Class definition
    var KTFormRepeater = function() {

    // Private functions
    var demo1 = function() {
        $('#kt_repeater_1').repeater({
            initEmpty: false,

            defaultValues: {
                'text-input': 'foo'
            },

            show: function () {
                $(this).slideDown();
            },

            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    }

    return {
        // public functions
        init: function() {
            demo1();
        }
    };
    }();

    jQuery(document).ready(function() {
    KTFormRepeater.init();
    });
</script>

