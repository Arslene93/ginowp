
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

            <form class="form needs-validation">
                @csrf
            <div id="block2">
                <div class="separator separator-dashed my-8"></div>

                <div class="row form-group">
                        <div class="col-8">
                            <input type="text" class="form-control" name="dataname" id="dataname" placeholder="data center name">
                        </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
                    </div>
                </div>
            </div>


            <!-- ========================================================================= -->
            <div class="separator separator-dashed my-8"></div>
            <!-- ========================================================================= -->
        </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary mr-2">{{__('app.btn_login')}}</button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </div>
</form>
            <!--end::Form-->
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
        submitButton = document.querySelector('button[type="submit"]');
        submitButton.addEventListener('click', (e) => {
            e.preventDefault();
            console.log(description.value.trim());
            const form = document.querySelector('.needs-validation');
            form.classList.add('was-validated');
            if (form.checkValidity()) {
                console.log('Form valid');
                //check Admin :
                    console.log('admin form');
                    $.ajax({
                        url: window.location.origin + '/datacenter/create',
                        method: "POST",
                        
                        data: {
                            _token: '{{ csrf_token() }}',
                            name: document.querySelector('#dataname').value.trim(),
                            description: description.value.trim(),
                        },
                        dataType: "json",
                        success:
                            window.location.href = window.location.origin + '/datacenter',
                        
                    })
                        .done(function (data) {
                            document.getElementById('error-container').innerText = data.email ?? data;
                        });
            } else {
                console.log('form Invalid');
            }


        });


    </script>

