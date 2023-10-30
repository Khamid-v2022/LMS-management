<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle text-muted">Enter email address below. If you have multiple emails, separate by comma</h6>
                    <div class="mt-4">
                        <div class="alert alert-danger alert-dismissible d-none" role="alert">
                            <p class="mb-0" id="alert_message"></p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <textarea class="form-control" id="emails" rows="10" placeholder="Enter email address below. If you have multiple emails, separate by comma"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" id="generate_password">Generage Password</button>
                </div>
            </div>

            <!-- Responsive Table -->
            <div class="card mt-3 generate-password-table d-none">
                <h5 class="card-header">Generated Password</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>#</th>
                                <th>email</th>
                                <th>password</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody id="generated_password_tbody">

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <button class="btn btn-danger" id="replace_password">
                        Replace Password
                        <i class="fas fa-spinner fa-spin ms-1 d-none"></i>
                    </button>
                </div>
            </div>
            <!--/ Responsive Table -->
        </div>
    </div>
</div>

<script src="<?=base_url()?>assets/js/pages/replace_password.js"></script>