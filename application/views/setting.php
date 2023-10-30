
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">

            <div class="card mb-4">
                <h5 class="card-header">Change Login Info</h5>
                <!-- Account -->
                <div class="card-body">
                    <form id="formAccountSettings" method="POST">
                        <div class="alert alert-dismissible d-none" role="alert" id="alert">
                            <p class="mb-0" id="alert_message"></p>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">New User Name</label>
                                <input
                                    class="form-control"
                                    type="text"
                                    id="email"
                                    name="email"
                                    placeholder="User Name"
                                    autofocus
                                    required
                                />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">New Password</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required />
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </form>
                </div>
                <!-- /Account -->
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirm_modal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" id="form_account">

            <div class="modal-header">
                <h5 class="modal-title">Please enter the current credentials!</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>

            <div class="modal-body">
                <div class="alert alert-dismissible d-none" role="alert" id="m_alert">
                    <p class="mb-0" id="m_alert_message"></p>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label for="current_email" class="form-label">Current User Name</label>
                        <input
                            type="text"
                            id="current_email"
                            class="form-control"
                            placeholder="Enter the current User Name"
                            required
                        />
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-0">
                        <label for="emailBackdrop" class="form-label">Current Password</label>
                        <input
                            type="password"
                            id="current_password"
                            class="form-control"
                            placeholder="Enter the current User Password"
                            required
                        />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" id="m_update_btn" class="btn btn-primary">Update<i class="fas fa-spinner fa-spin ms-1 d-none"></i></button>
            </div>
        </form>
    </div>
</div>

<script src="<?=base_url()?>assets/js/pages/setting.js"></script>