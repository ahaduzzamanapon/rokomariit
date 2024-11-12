<style>
/* Custom Font */
/* body {
        font-family: 'Poppins', sans-serif;
    } */

/* Container Box */
.c_box {
    margin: 5% auto;
    padding: 3%;
    background: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.form-label {
    margin-right: auto;
}

/* Heading */
.packages_info h3 {
    font-size: 1.8rem;
    color: #4e73df;
    margin-bottom: 1.5rem;
    font-weight: 600;
}

/* Package Item Styling */
.packages_item::before {
    content: "✔";
    color: #28a745;
    margin-right: 10px;
}

.packages_item {
    font-size: 1.5rem;
    color: #555;
    line-height: 1.5;
    margin-bottom: 10px;
}

/* Form Styling */
.form-control {
    border-radius: 10px;
    border: 1px solid #ddd;
    padding: 12px;
    font-size: 1.5rem;
    transition: border-color 0.3s ease;
}

.form-control:focus {
    border-color: #4e73df;
    box-shadow: 0 0 8px rgba(78, 115, 223, 0.6);
}

/* Button Styling */
.btn-primary {
    background-color: #4e73df;
    border-color: #4e73df;
    padding: 12px 25px;
    font-size: 1.5rem;
    border-radius: 30px;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #2e59d9;
    border-color: #2e59d9;
}

/* Section Layout */
.packages_purchase {
    background-color: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

/* Add space between columns */
.row.g-4 {
    margin-top: 20px;
}

/* Column Styling */
.col-md-6 {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}

/* Responsive Layout */
@media (max-width: 767px) {
    .col-md-6 {
        margin-bottom: 20px;
    }
}
</style>

<div class="content-area">
    <div class="c_box">

        <section class="page-section with-sidebar">
        <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('success');?>
                </div>
            <?php endif; ?>
        <?php if($this->session->flashdata('error')):?>
                <div class="alert alert-danger">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('error');?>
                </div>
            <?php endif; ?>
        <?php if($this->session->flashdata('credentials')):?>
                <div class="alert alert-success">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <?php echo $this->session->flashdata('credentials');?>
                </div>
            <?php endif; ?>
            <div class="packages_purchase p-4 shadow-sm rounded bg-light">
                <div class="row g-4">
                    <!-- Package Information -->
                    <div class="col-md-6 packages_info text-left" style="border-right: 3px solid black;">
                        <h1>Package Information</h1>
                        <h2 class="text-primary mb-3"><?= $package_info->packages_name ?></h2>
                        <p class="text-muted"><?= $package_info->description ?></p>
                        <ul class="list-unstyled">
                            <?php 
                                $item = json_decode($package_info->packages_item);
                                foreach ($item as $value) {
                                    echo '<li class="d-flex align-items-center mb-2 packages_item">
                                            <i class="bi bi-check-circle text-success me-2"></i> ' . $value . '
                                        </li>';
                                }
                            ?>
                        </ul>
                    </div>
                    <!-- Purchase Form -->
                    <div class="col-md-6 packages_form">
                        <?php echo form_open('site/payment_process', 'class="form-horizontal bg-white p-4 rounded shadow"'); ?>
                        <?php if ($user_info!=null) { ?>
                        <input type="hidden" name="user_id" value="<?= $user_info->id ?>">
                       <?php } ?>
                        <input type="hidden" name="package_id" value="<?= $package_info->id ?>">
                        <div class="col-md-12">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="firstName" value="<?= $user_info!=null ? $user_info->first_name:"" ?>"
                                    placeholder="Enter your first name" required aria-label="Domain Name">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="lastName"
                                    placeholder="Enter your last name" required aria-label="Domain Name" value="<?= $user_info!=null ? $user_info->last_name:"" ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="<?= $user_info!=null ? $user_info->email:"" ?>"
                                    placeholder="Enter your email" required aria-label="Email">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="number" class="form-label">Number</label>
                                <input type="text" class="form-control" name="number" id="number" value ="<?= $user_info!=null ?  $user_info->phone:"" ?>" >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Enter your email" required aria-label="Email">
                            </div> -->
                            <div class="mb-3 col-md-6">
                                <label for="amount" class="form-label">Price</label>
                                <input type="text" class="form-control" name="amount" id="amount"
                                    value="<?= $package_info->amount ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-primary">Purchase</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>