
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

            <?= form_open('','class="form needs-validation"')?>

            <div id="block2">
                <div class="separator separator-dashed my-8"></div>

                <div id="block4" class="row form-group">
                        <div class="col-8">
                            <?= form_input(['class'=>'form-control','name'=>'name','id'=>'name','placeholder'=>'data center name','required'=>'true'])?>
                        </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <?= form_textarea([ 'class'=>'form-control','name'=>'description','id'=>'description','placeholder'=>'Description'])?>
                    </div>
                </div>
            </div>


            <!-- ========================================================================= -->
            <div class="separator separator-dashed my-8"></div>
            <!-- ========================================================================= -->
        </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2"><?= lang('app.btn_login', array(),'it')?></button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </div>
    <?= form_close()?>
            <!--end::Form-->
</div>

    <script>
        name = document.querySelector('#name');
        description = document.querySelector('#description');
        

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
        submitButton = document.querySelector('button[type="submit"]');
        submitButton.addEventListener('click', (e) => {
            e.preventDefault();
            const form = document.querySelector('.needs-validation');
            form.classList.add('was-validated');
            if (form.checkValidity()) {
                console.log('Form valid');
                //check Admin :
                if (admin.checked) {
                    console.log('admin form');
                    $.ajax({
                        url: window.location.origin + '/admin/newDataCenter',
                        method: "POST",
                        data: {
                            name: name.value.trim(),
                            description: description.value.trim(),
                        },
                        dataType: "json",
                    })
                        .done(function (data) {
                            document.getElementById('error-container').innerText = data.email ?? data;
                        });
                }
            } else {
                console.log('form Invalid');
            }


        });


    </script>

