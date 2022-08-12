

<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<div class="container-fluid">
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $submit_button ?> Project</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div>
                        <?php if (isset($message)) {
                            echo $message;
                        } ?>
                    </div>
                    <div>
                        <?php if (isset($errors)) {
                            foreach ($errors as $values) {
                                echo '<h4>' . $values . '</h4>';
                            }
                        } ?>
                    </div>


                  <form action="<?= base_url($action) ?>" method="post">
                        <?php

                        if (isset($student_id)) {
                            echo '<input type="hidden" name="student_id" value="' . $student_id . '">';
                        }
                        ?>


                    <div class="row">    
                        <div class="form-group col-md-4">
                            <label for="session">Project Session</label>
                            <select class="form-control" id="session" name="session">
                                <option value="<?= $form_data->session ?>"><?= $form_data->session ?></option>
                                <option value="Govt">Govt</option>
                                <option value="Central">Central</option>
                                <option value="CSR"></option>
                                <option value="Other"></option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="project_title">Project Title</label>
                            <select class="form-control" id="project_title" name="project_title">
                                <option value="<?= $form_data->project_title ?>"><?= $form_data->project_title ?></option>
                                <option value="Govt">Govt</option>
                                <option value="Central">Central</option>
                                <option value="CSR"></option>
                                <option value="Other"></option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="center">Center</label>
                            <select class="form-control" id="center" name="center">
                                <option value="<?= $form_data->center ?>"><?= $form_data->center ?></option>
                                <option value="Govt">Govt</option>
                                <option value="Central">Central</option>
                                <option value="CSR"></option>
                                <option value="Other"></option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sector">Sector</label>
                            <select class="form-control" id="sector" name="sector">
                                <option value="<?= $form_data->sector ?>"><?= $form_data->sector ?></option>
                                <option value="Govt">Govt</option>
                                <option value="Central">Central</option>
                                <option value="CSR"></option>
                                <option value="Other"></option>
                            </select>
                        </div>
                        
                    </div> 
                    
                    <br><h3>Students Details</h3><br>

                        <div class="form-group">
                                <label for="student_name">Student Name</label>
                                <input type="text" class="form-control" name="student_name" id="student_name" value="<?= $form_data->student_name ?>">
                            </div>
                        <div class="row">
                            
                            <div class="form-group col-md-4">
                                <label for="village">Village</label>
                                <input type="text" class="form-control" name="village" id="village" value="<?= $form_data->village ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="landmark">Landmark</label>
                                <input type="text" class="form-control" name="landmark" id="landmark" value="<?= $form_data->landmark ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="district">District</label>
                                <input type="text" class="form-control" name="district" id="district" value="<?= $form_data->district ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="state">State</label>
                                <input type="text" class="form-control" name="state" id="state" value="<?= $form_data->state ?>">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="pincode">Pincode</label>
                                <input type="text" class="form-control" name="pincode" id="pincode" value="<?= $form_data->pincode ?>">
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="dob">Date of Birth</label>
                                <div class='input-group date' id='dob'>
                                    <input type='text' class="form-control" name="dob" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                                <script>
                                    $('#dob').datepicker({
                                        autoclose: true,
                                        todayHighlight: true,
                                    });
                                </script>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="project_type">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="<?= $form_data->gender ?>"><?= $form_data->gender ?></option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value=""></option>
                                    
                                </select>
                            </div>
                                <div class="form-group col-md-4">
                                    <label for="caste">Caste</label>
                                    <select class="form-control" id="caste" name="caste">
                                        <option value="<?= $form_data->caste ?>"><?= $form_data->caste ?></option>
                                        <option value="General">General</option>
                                        <option value="OBC">OBC</option>
                                        <option value="SC">SC</option>
                                        <option value="ST">ST</option>                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="religion">Religion</label>
                                    <select class="form-control" id="religion" name="religion">
                                        <option value="<?= $form_data->religion ?>"><?= $form_data->religion ?></option>
                                        <option value="General">Hindu</option>
                                        <option value="OBC">Muslim</option>
                                        <option value="SC">Christian</option>
                                        <option value="ST">Sikh</option>                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone_no">Phone no</label>
                                    <input type="text" class="form-control" name="phone_no" id="phone_no" value="<?= $form_data->lophone_nocation ?>">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="email">Email id</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $form_data->email ?>">
                                 </div>
                        </div>
                                <div class="form-group">
                                    <label for="father_name">Father Name</label>
                                    <input type="text" class="form-control" name="father_name" id="father_name" value="<?= $form_data->father_name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="mother_name">Mother Name</label>
                                    <input type="text" class="form-control" name="mother_name" id="mother_name" value="<?= $form_data->mother_name ?>">
                                </div>
                                <div class="form-group">
                                    <label for="guardian_name">Guardian/Spouse Name</label>
                                    <input type="text" class="form-control" name="guardian_name" id="guardian_name" value="<?= $form_data->guardian_name ?>">
                                </div>
                        <div class="row">        
                                <div class="form-group col-md-4">
                                    <label for="guardian_contact">Guardian Contact</label>
                                    <input type="text" class="form-control" name="guardian_contact" id="guardian_contact" value="<?= $form_data->guardian_contact ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="family_income">Family Income</label>
                                    <input type="text" class="form-control" name="family_income" id="family_income" value="<?= $form_data->family_income ?>">
                                </div>                                
                        </div>

                       <br> <h3>Qualification Details</h3><br>

                        <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="hslc_board">HSLC Board</label>
                                    <input type="text" class="form-control" name="hslc_board" id="hslc_board" value="<?= $form_data->hslc_board ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hslc_div">Div</label>
                                    <select class="form-control" id="hslc_div" name="hslc_div">
                                        <option value="<?= $form_data->hslc_div ?>"><?= $form_data->hslc_div ?></option>
                                        <option value="General">1ST</option>
                                        <option value="OBC">2ND</option>
                                        <option value="SC">3RD</option>
                                                                               
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hslc_yop">Year of Passing</label>
                                    <select class="form-control" id="hslc_yop" name="hslc_yop">
                                        <option value="<?= $form_data->hslc_yop ?>"><?= $form_data->hslc_yop ?></option>
                                        <option value="General">1</option>
                                        <option value="OBC">2</option>
                                        <option value="SC">3</option>
                                        <option value="ST">4</option>                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hslc_marksheet">Marksheet Upload</label>
                                    <input type="text" class="form-control" name="hslc_marksheet" id="hslc_marksheet" value="<?= $form_data->hslc_marksheet ?>">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="hslc_certificate">Certificate upload</label>
                                    <input type="text" class="form-control" name="hslc_certificate" id="hslc_certificate" value="<?= $form_data->hslc_certificate ?>">
                                 </div>
                        </div>

                        <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="hs_board">HS Board</label>
                                    <input type="text" class="form-control" name="hs_board" id="hs_board" value="<?= $form_data->hs_board ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hs_div">Div</label>
                                    <select class="form-control" id="hs_div" name="hs_div">
                                        <option value="<?= $form_data->hs_div ?>"><?= $form_data->hs_div ?></option>
                                        <option value="General">1ST</option>
                                        <option value="OBC">2ND</option>
                                        <option value="SC">3RD</option>
                                                                               
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hs_yop">Year of Passing</label>
                                    <select class="form-control" id="hs_yop" name="hs_yop">
                                        <option value="<?= $form_data->hs_yop ?>"><?= $form_data->hs_yop ?></option>
                                        <option value="General">1</option>
                                        <option value="OBC">2</option>
                                        <option value="SC">3</option>
                                        <option value="ST">4</option>                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="hs_marksheet">Marksheet Upload</label>
                                    <input type="text" class="form-control" name="hs_marksheet" id="hs_marksheet" value="<?= $form_data->hs_marksheet ?>">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="hs_certificate">Certificate upload</label>
                                    <input type="text" class="form-control" name="hs_certificate" id="hs_certificate" value="<?= $form_data->hs_certificate ?>">
                                 </div>
                        </div>

                        <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="grad_uni">Graduation University</label>
                                    <input type="text" class="form-control" name="grad_uni" id="grad_uni" value="<?= $form_data->grad_uni ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="grad_div">Div</label>
                                    <select class="form-control" id="grad_div" name="grad_div">
                                        <option value="<?= $form_data->grad_div ?>"><?= $form_data->grad_div ?></option>
                                        <option value="General">1ST</option>
                                        <option value="OBC">2ND</option>
                                        <option value="SC">3RD</option>
                                                                               
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="grad_yop">Year of Passing</label>
                                    <select class="form-control" id="grad_yop" name="grad_yop">
                                        <option value="<?= $form_data->grad_yop ?>"><?= $form_data->grad_yop ?></option>
                                        <option value="General">1</option>
                                        <option value="OBC">2</option>
                                        <option value="SC">3</option>
                                        <option value="ST">4</option>                                        
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="grad_marksheet">Marksheet Upload</label>
                                    <input type="text" class="form-control" name="grad_marksheet" id="grad_marksheet" value="<?= $form_data->grad_marksheet ?>">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="grad_certificate">Certificate upload</label>
                                    <input type="text" class="form-control" name="grad_certificate" id="grad_certificate" value="<?= $form_data->grad_certificate ?>">
                                 </div>
                        </div>
                        <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="photo">Photo upload</label>
                                    <input type="text" class="form-control" name="photo" id="photo" value="<?= $form_data->photo ?>">
                                </div>                               
                                
                                <div class="form-group col-md-4">
                                    <label for="signature">Signature Upload</label>
                                    <input type="text" class="form-control" name="signature" id="signature" value="<?= $form_data->signature ?>">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="other_doc">Other Documents</label>
                                    <input type="text" class="form-control" name="other_doc" id="other_doc" value="<?= $form_data->other_doc ?>">
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label for="pan_no">Pan Number</label>
                                    <input type="text" class="form-control" name="pan_no" id="pan_no" value="<?= $form_data->pan_no ?>">
                                 </div>
                                 
                        </div>


                        <div class="row">
                            <button class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>