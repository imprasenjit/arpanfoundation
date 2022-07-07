<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

<div class="container-fluid">
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Add Projects</h6>

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="<?= base_url("projects/save") ?>" method="post">
                        <div class="form-group">
                            <label for="project_title">Project Title</label>
                            <input type="text" class="form-control" name="project_title" id="project_title">
                        </div>
                        <div class="form-group">
                            <label for="project_type">Project Type</label>
                            <select class="form-control" id="project_type" name="project_type">
                                <option value="Govt">Govt</option>
                                <option value="Central">Central</option>
                                <option value="CSR"></option>
                                <option value="Other"></option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="sponsored_body">Sponsored Body</label>
                                <select class="form-control" id="sponsored_body" name="sponsored_body">
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_state">Project State</label>
                                <select class="form-control" id="project_state" name="project_state">
                                    <option>1</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="project_district">Project District</label>
                                <select class="form-control" id="project_district" name="project_district">
                                    <option>1</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" name="location" id="location">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="session">Session</label>
                                <input type="text" class="form-control" name="session" id="session">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Not_started">Not Started</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="start_date">Start Date</label>
                                <div class='input-group date' id='start_date'>
                                    <input type='text' class="form-control" name="start_date" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>


                                <script>
                                    $('#start_date').datepicker({
                                        autoclose: true,
                                        todayHighlight: true,
                                    });
                                </script>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="end_date">End Date</label>
                                <div class='input-group date' id='end_date'>
                                    <input type='text' class="form-control" name="end_date" />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <script>
                                    $('#end_date').datepicker({
                                        autoclose: true,
                                        todayHighlight: true,
                                    });
                                </script>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="Ongoing">Ongoing</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Not_started">Not Started</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="project_value">Project value</label>
                                <input type="text" class="form-control" name="project_value" id="project_value">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="about_the_project">About the project</label>
                                <textarea class="form-control" id="about_the_project" name="about_the_project" rows="3"></textarea>
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