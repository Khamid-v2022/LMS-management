<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12">
          
            <!-- Responsive Table -->
            <div class="card mt-3">
                <h5 class="card-header">Updated Users</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr class="text-nowrap">
                                <th>ID</th>
                                <th>email</th>
                                <th>password</th>
                                <th>Screen Name</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user) {?>
                                <tr>   
                                    <td><?=$user['user_id']?></td>
                                    <td><?=$user['email']?></td>
                                    <td><?=$user['password']?></td>
                                    <td><?=$user['screen_name']?></td>
                                    <td><?=$user['first_name'] . " " . $user['last_name']?></td>
                                    <td><?=$user['sex']==0?'Male':'Female'?></td>
                                    <td><?=$user['updated_at']?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--/ Responsive Table -->
        </div>
    </div>
</div>