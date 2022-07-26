<link href="<?= base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

<script src="<?= base_url('/assets/sweetalert2/sweetalert2.min.css') ?>"></script>
<div id="content-wrapper">
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= base_url("dashboard"); ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Projects</li>
        </ol>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-list-alt"></i> Project list

            </div>
            <div class="card-body">
                <div class="row" style="margin-bottom: 10px">
                    <div class="col-md-8">

                    </div>
                    <div class="col-md-4 text-right"></div>
                </div>
                <div class="row">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dtbl" width="100%">
                            <thead>
                                <tr>
                                    <th>(#)</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Sponsored Body</th>
                                    <th>State</th>
                                    <th>Session</th>
                                    <th><i class="fab fa-accusoft"></i></th>
                                </tr>
                            </thead>
                        </table>
                        <script>
                            $(document).ready(function() {


                                var table = $("#dtbl").DataTable({
                                    responsive: true,
                                    columnDefs: [{
                                            responsivePriority: 1,
                                            targets: 0
                                        },
                                        {
                                            targets: 4,
                                            className: 'text-right'
                                        },
                                        {
                                            "orderable": false,
                                            targets: 4
                                        },
                                        {
                                            "orderable": false,
                                            targets: 3
                                        },
                                        {
                                            "orderable": false,
                                            targets: 2
                                        },
                                        {
                                            responsivePriority: 2,
                                            targets: 1
                                        },
                                    ],
                                    fixedHeader: true,
                                    "columns": [{
                                            "data": "project_id"
                                        },
                                        {
                                            "data": "name"
                                        },
                                        {
                                            "data": "type"
                                        },
                                        {
                                            "data": "sponsored_body"
                                        },
                                        {
                                            "data": "state"
                                        },
                                        {
                                            "data": "session"
                                        },
                                        {
                                            "data": "action"
                                        }
                                    ],
                                    "processing": true,
                                    "serverSide": true,
                                    "ajax": {
                                        "url": "<?= base_url('projects/get_records') ?>",
                                        "dataType": "json",
                                        "type": "POST",
                                    },
                                    language: {
                                        processing: '<div class="lds-ripple"><div></div><div></div></div>',
                                    },
                                    "order": [
                                        [0, 'DESC']
                                    ],
                                    "lengthMenu": [
                                        [10, 20, 30, 50, 100, 200],
                                        [10, 20, 30, 50, 100, 200]
                                    ]
                                });

                                $(document).on('click', '.delete', function() {
                                    Swal.fire({
                                        title: 'Please wait. Deletion in progress..',
                                        allowEscapeKey: false,
                                        showCloseButton: true,
                                        allowOutsideClick: () => !Swal.isLoading(),
                                        onOpen: () => {
                                            Swal.showLoading();
                                        }
                                    });
                                    var id = $(this).attr('data-id');
                                    var el = $(this);
                                    $.post("<?= base_url('projects/delete_project') ?>", {
                                            project_id: id,
                                        })
                                        .done(function(data) {
                                            const res = JSON.parse(data);
                                            if (res.status == true) {
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Deleted successfully',
                                                    showConfirmButton: false,
                                                    timer: 2500
                                                });
                                                table.ajax.reload();
                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: res.message,
                                                    timer: 2500
                                                })
                                            }
                                        });
                                });


                                $(document).on('click', '.unapprove', function() {
                                    Swal.fire({
                                        title: 'Please wait.',
                                        allowEscapeKey: false,
                                        showCloseButton: true,
                                        allowOutsideClick: () => !Swal.isLoading(),
                                        onOpen: () => {
                                            Swal.showLoading();
                                        }
                                    });
                                    var id = $(this).attr('data-id');
                                    var el = $(this);
                                    $.post("<?= base_url('users/diapprove_user') ?>", {
                                            user_id: id,
                                        })
                                        .done(function(data) {
                                            if (data.status == true) {
                                                el.empty().html('<span class="fa fa-check" aria-hidden="true"></span>&nbsp;Approve');
                                                el.removeClass('btn-danger').removeClass('unapprove');
                                                el.addClass('btn-primary').addClass('approve');

                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Disapproved successfully',
                                                    showConfirmButton: false,
                                                    timer: 2500
                                                })
                                            } else {
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: jsn.msg,
                                                    timer: 2500
                                                })
                                            }
                                        });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('/assets/sweetalert2/sweetalert2.all.min.js') ?>"></script>
    <script src="<?= base_url() ?>/assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/datatables/datatables.responsive.js"></script>