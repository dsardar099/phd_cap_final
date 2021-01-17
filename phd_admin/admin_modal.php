
<!-- admin profile update Modal start -->
        <div class="modal fade" id="editadmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editadminmodalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editadminmodalLabel">Admin Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form class="row g-3 needs-validation" action="updateadmin.php" method="POST" novalidate>
                                <input type="hidden" class="form-control" id="aid" name="aid" value="<?php echo $admindetails['id']; ?>" required>

                                <div class="col-12 col-md-6">
                                    <label for="aname" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="aname" name="aname" value="<?php echo $admindetails['name']; ?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Something wrong!
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="aemail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="aemail" name="aemail" value="<?php echo $admindetails['email']; ?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Something wrong!
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="aphone" class="form-label">Phone</label>
                                    <input type="number" class="form-control" id="aphone" name="aphone" value="<?php echo $admindetails['phone']; ?>" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Something wrong!
                                    </div>
                                </div>

                                <div class="col-12 text-center">
                                    <button class="btn btn-primary" type="submit" name="adupdate">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- admin profile update Modal end -->


<!-- admin profile view Modal start -->
        <div class="modal fade" id="showadmin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showadminmodalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="showadminmodalLabel">Admin Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6 col-md-3 fw-bold">ID :</div>
                                <div class="col-6 col-md-3" id="id2"><?php echo $admindetails['id']; ?></div>
                                <div class="col-6 col-md-3 ps-md-3 fw-bold">NAME :</div>
                                <div class="col-6 col-md-3" id="name2"><?php echo $admindetails['name']; ?></div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-md-3 fw-bold">EMAIL :</div>
                                <div class="col-6 col-md-3" id="email2"><?php echo $admindetails['email']; ?></div>
                                <div class="col-6 col-md-3 ps-md-3 fw-bold">PHONE NO :</div>
                                <div class="col-6 col-md-3" id="phone2"><?php echo $admindetails['phone']; ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- admin profile view Modal end -->


        


        <!-- admin password update Modal start -->
        <div class="modal fade" id="updateadminpass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateadminmodalLabel" aria-hidden="true">
            <div class="modal-dialog  modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateadminmodalLabel">Update Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <form class="row g-3 needs-validation" action="updateadminpass.php" method="POST" novalidate>
                                <input type="hidden" class="form-control" id="aid1" name="aid1" value="<?php echo $admindetails['id']; ?>" required>

                                <div class="col-12 col-md-6">
                                    <label for="apass" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="apass" name="apass" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Something wrong!
                                    </div>
                                </div>


                                <div class="col-12 text-center">
                                    <button class="btn btn-primary" type="submit" name="adupdate">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- admin password update Modal end -->