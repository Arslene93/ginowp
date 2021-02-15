
<div class="card card-custom">
    <div class="card-header">
        <h3 class="card-title">
            Add new user
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

            <!--      ADMIN     -->
            <div class="form-group row">
                <label class="col-3 col-form-label">Admin : </label>
                <div class="col-3">
                   <span class="switch switch-icon">
                    <label>
                        <?= form_checkbox(['id'=>'admin','name'=>'admin'])?>
                     <span></span>
                    </label>
                   </span>
                </div>
            </div>

<!-- ========================================================================= block 1  -->

            <!--      USERTYPE : name : usertype -->
            <div id='block1' class="form-group">
                <div class="radio-inline" >
                    <label class="radio">
                        <?= form_radio(['id'=>'company','name'=>'usertype'])?>
                        <span></span>
                        Company
                    </label>
                    <label class="radio">
                        <?= form_radio(['id'=>'individual','name'=>'usertype'],'',true)?>
                        <span></span>
                        Individual
                    </label>
                </div>
            </div>
<!-- ========================================================================= block 2  -->

            <?= form_open('','class="form needs-validation"')?>

            <div id="block2">
                <div class="separator separator-dashed my-8"></div>

                <div id="block4" class="row form-group" hidden>
                        <div class="col-8">
                            <?= form_input(['class'=>'form-control','name'=>'companyname','id'=>'companyname','disabled'=>'true','placeholder'=>'Company name','required'=>'true'])?>
                        </div>
                        <div class="col-4">
                            <?= form_input(['class'=>'form-control','name'=>'piva','id'=>'piva','placeholder'=>'PIVA','required'=>'true','disabled'=>'true'])?>
                        </div>
                </div>
                <div class="row form-group">
                    <div class="col-4">
                        <?= form_input([ 'class'=>'form-control','name'=>'name','id'=>'name','placeholder'=>'Name','required'=>'true'])?>
                    </div>

                    <!--    Family name , name : familyname -->
                    <div class="col-4">
                        <?= form_input([ 'class'=>'form-control','name'=>'familyname','id'=>'familyname','placeholder'=>'Family name','required'=>'true'])?>
                    </div>

                    <div class="col-4">
                        <?= form_input([ 'class'=>'form-control','name'=>'cf','id'=>'cf','placeholder'=>'CF'])?>
                    </div>
                </div>
            </div>


            <!-- ========================================================================= -->
            <div class="separator separator-dashed my-8"></div>

            <!--    email , name : email -->

            <div class="form-group">
                <?= form_input([ 'type'=>'email', 'class'=>'form-control','name'=>'email','id'=>'email','placeholder'=>'Enter email','required'=>'true'])?>
            </div>

            <!--    password , name : password -->
            <div class="row form-group">
                <div class="col-6">
                    <?=form_password(['class'=>'form-control','name'=>'password','id'=>'password','placeholder'=>'Password','required'=>'true'])?>
                </div>

                <!--    confirm password , name : passwordconfirm -->
                <div class="col-6">
                    <?=form_password(['class'=>'form-control','name'=>'confirmpassword','id'=>'confirmpassword','placeholder'=>'Confirm Password','required'=>'true'])?>
                </div>
            </div>

            <!-- ========================================================================= block 3 -->

            <div id="block3">
                <div class="separator separator-dashed my-8"></div>
                <div class="form-group row">

                    <!--    country , name : country -->
                    <div class="col-4">
                        <label> Country : </label>
                        <select class="form-control" name="country" id="country">
                            <?php
                            $countries = esc($countries);
                            foreach($countries as $item) :?>
                                <option value="<?=$item?>"> <?=$item?></option>
                            <?php endforeach; ?>
                        </select>

                    </div>
                    <div class="col-4">
                        <label> Province : </label>
                        <div id="provincy-container">
                            <?= form_input([ 'class'=>'form-control','name'=>'province','id'=>'province','placeholder'=>'Province','required'=>'true'])?>
                        </div>
                    </div>
                    <!--                    region          -->
                    <div class="col-4">
                        <label> Communi : </label>
                        <div id="communi-container">
                            <?= form_input([ 'class'=>'form-control','name'=>'region','id'=>'region','placeholder'=>'Communi','required'=>'true'])?>
                        </div>

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-4">
                        <label> Street : </label>
                        <?= form_input([ 'class'=>'form-control','name'=>'street','id'=>'street','placeholder'=>'Street','required'=>'true'])?>
                    </div>

                    <div class="col-4">
                        <label> Civico : </label>
                        <?= form_input([ 'type'=>'number', 'class'=>'form-control','name'=>'civico','id'=>'civico','placeholder'=>'Civico','required'=>'true'])?>
                    </div>

                    <div class="col-4">
                        <label> Postal : </label>
                        <?= form_input([ 'type'=>'number', 'class'=>'form-control','name'=>'Postal','id'=>'Postal','placeholder'=>'Postal','required'=>'true'])?>
                    </div>
                </div>

                <div class="separator separator-dashed my-8"></div>

            </div>
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
        admin = document.querySelector('#admin');
        userCompany = document.querySelector('#company');
        userIndividual = document.querySelector('#individual');
        companyname = document.querySelector("#companyname");
        user_name = document.querySelector("#name");
        user_familyname = document.querySelector("#familyname");
        email = document.querySelector("#email");
        password = document.querySelector("#password");
        confirmpassword = document.querySelector("#confirmpassword");
        province = document.querySelector("#province");
        country = document.querySelector("#country");
        street = document.querySelector("#street");
        region = document.querySelector("#region"); // communi
        postal = document.querySelector("#postal");
        communi = document.querySelector("#communi");
        civico = document.querySelector("#civico");
        piva = document.querySelector("#piva");
        cf = document.querySelector("#cf");


        admin.addEventListener('click', () =>{
            let tmp1 = document.querySelectorAll('#block1  input, #block2  input ,#block3  input');
            let tmp2 = document.querySelectorAll('#block1 , #block2  ,#block3');
            tmp1.forEach(el => {
                el.toggleAttribute('disabled');
            })
            tmp2.forEach(el => {
                el.toggleAttribute('hidden');
            })

        })

        userCompany.addEventListener('change', helperFunction)
        userIndividual.addEventListener('change', helperFunction)

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

        country.addEventListener('change', () => {
            $.ajax({
                method: "POST",
                url: '<?=base_url('logs/ajaxProvince')?>',
                data: { country: country.value },
                dataType: "html",
            })
                .done(function( data ) {
                        document.getElementById("provincy-container").innerHTML = data;
                        province = document.querySelector("#province");
                        province.addEventListener('change', () => {
                            $.ajax({
                                method: "POST",
                                url: '<?=base_url('logs/ajaxCommuni')?>',
                                data: { province: province.value },
                                dataType: "html",
                            })
                                .done(function( data ) {
                                    if (country.value === 'Italy'){
                                        document.getElementById("communi-container").innerHTML = data;
                                        region = document.querySelector("#region");
                                    }
                                });
                        })
                });
            if (country.value !== 'Italy') {
                document.getElementById("communi-container").innerHTML = '<input type="text" class="form-control" name="region" id="region" placeholder="Communi" required/>';
            }
        })





        function checkPassword() {
            if (password.value !== confirmpassword.value) {
                confirmpassword.setCustomValidity('Password isn\'t matching');
            } else {
                confirmpassword.setCustomValidity('');
            }
        }

        password.addEventListener('keyup', checkPassword);
        confirmpassword.addEventListener('keyup', checkPassword);




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
                        url: window.location.origin + '/logs/register',
                        method: "POST",
                        data: {
                            admin: '1',
                            email: email.value.trim(),
                            password: password.value,
                        },
                        dataType: "json",
                    })
                        .done(function (data) {
                            document.getElementById('error-container').innerText = data.email ?? data;
                        });
                } else if (userCompany.checked) {
                    console.log('company form');
                    $.ajax({
                        url: window.location.origin + '/logs/register',
                        method: "POST",
                        data: {
                            company: '1',
                            companyname: companyname.value,
                            piva: piva.value,
                            name: user_name.value,
                            familyname: user_familyname.value,
                            email: email.value,
                            password: password.value,
                            country: country.value,
                            province: province.value,
                            region: region.value,
                            street: street.value,
                            civico: civico.value,
                            postal: postal.value,
                        },
                        dataType: "json",
                    })
                        .done(function (data) {
                            console.log(data);
                            document.getElementById('error-container').innerText = data.email ?? data;
                        });
                }else if (userIndividual.checked) {
                    console.log('Individual form');
                    $.ajax({
                        url: window.location.origin + '/logs/register',
                        method: "POST",
                        data: {
                            individual: '1',
                            name: user_name.value,
                            familyname: user_familyname.value,
                            email: email.value,
                            password: password.value,
                            country: country.value,
                            cf: cf.value,
                            province: province.value,
                            region: region.value,
                            street: street.value,
                            civico: civico.value,
                            postal: postal.value,
                        },
                        dataType: "json",
                    })
                        .done(function (data) {
                            console.log(data);
                            document.getElementById('error-container').innerText = data.email ?? data;
                        });
                }
            } else {
                console.log('form Invalid');
            }


        });


    </script>

