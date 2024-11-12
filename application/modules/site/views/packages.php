<!-- CONTENT AREA -->
<style>
    /* General Styles */
    .content-area {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        color: #333;
    }

    .card_p {
        background: linear-gradient(135deg, #ffffff, #f0f4f8);
        padding: 30px;
        min-height: 420px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        border-radius: 20px;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        margin-bottom: 30px;
        position: relative;
        overflow: hidden;
    }

    .card_p::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0) 70%, rgba(0, 106, 162, 0.15) 100%);
        transition: all 0.4s ease;
        z-index: 0;
    }

    .card_p:hover {
        transform: scale(1.03);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
    }

    .card_p:hover::before {
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    /* Card Header */
    .card-p-header {
        text-align: center;
        padding-bottom: 15px;
        border-bottom: 1px solid #e0e0e0;
        color: #006aa2;
        position: relative;
        z-index: 1;
    }

    .card-p-header h3 {
        font-size: 26px;
        margin-bottom: 8px;
        font-weight: bold;
    }

    .card-p-header p {
        font-size: 15px;
        color: #777;
    }

    /* Card Body */
    .card-p-body {
        padding: 20px 0;
        position: relative;
        z-index: 1;
    }

    .card-p-body ul {
        list-style: none;
        padding: 0;
    }

    .card-p-body ul li {
        font-size: 16px;
        padding: 8px 0;
        color: #555;
        display: flex;
        align-items: center;
    }

    .card-p-body ul li::before {
        content: "✔";
        color: #006aa2;
        margin-right: 12px;
        font-size: 18px;
        font-weight: bold;
    }

    /* Card Footer */
    .card-p-footer {
        text-align: center;
        padding-top: 15px;
        border-top: 1px solid #e0e0e0;
        position: relative;
        z-index: 1;
        font-family: sans-serif;
    }

    .card-p-footer h3 {
        font-size: 30px;
        color: #444;
        margin-bottom: 15px;
        font-weight: bold;
    }

    /* Button */
    .btn-primary {
        background: linear-gradient(135deg, #006aa2, #004f7c);
        color: #fff;
        padding: 12px 30px;
        border-radius: 10px;
        transition: background 0.3s ease, transform 0.3s ease;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        box-shadow: 0 4px 8px rgba(0, 106, 162, 0.2);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #004f7c, #006aa2);
        transform: translateY(-3px);
        color: #ffffff;
    }

    /* Breadcrumbs Styling */
   

    @media (max-width: 768px) {
        .col-md-3 {
            width: 100%;
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
            padding: 12px 0;
        }
    }
</style>






<div class="content-area">
    
    <section class="page-section with-sidebar">
        <div class="container">
            <div class="row">

            <?php
            $this->db->select('*');
            $this->db->from('packages');
            $this->db->where('status', '1');
            $query = $this->db->get();
            foreach ($query->result() as $row) { ?>
                <div class="col-md-3 card_p">
                    <div class="card-p-header">
                        <h3><?=$row->packages_name?></h3>
                        <p><?=$row->description?></p>
                    </div>
                    <div class="card-p-body">
                        <ul class="list-unstyled">
                            <?php
                            $item=json_decode($row->packages_item);
                            foreach ($item as $key => $value) {
                                echo '<li>'.$value.'</li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="card-p-footer">
                        <h3>৳ <?=$row->amount?></h3>
                        <a href="<?=base_url('site/purchase_create/'.$row->id)?>" class="btn btn-primary btn-block">Purchase Now</a>
                    </div>
                </div>
           <?php } ?>
            </div>
        </div>
    </section>
</div>



