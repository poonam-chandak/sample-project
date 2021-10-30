<html>
    <head>
        <title> registration </title>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.css">
        <style>
            .red { color:red}
            .custom-button{ color:white;
                            background-color:#007bff;
                            display:inline;
                            width:42%;
                            margin-top:8px;
                }

        </style>
</head>
<body>
    <div class="containter">
         <?php $msg= $this->session->flashdata('msg');
            if($msg!=""){
                echo '<div>'. $msg.'<div>';
            }
        ?>
    
    <div class="col-md-6">
    <div class="card">
  <div class="card-header">
    Register Here
  </div>
  <div class="card-body">
    <h5 class="card-title">Add details</h5>
    <form action="<?php echo base_url().'index.php/Auth/register';?>" name="register_form" method="post">
    <div class="form-group">
        <div>
        <label for="name"> Name<span class="red">*</span></label>
        <input type="text" placeholder="Name" id="name" name="name"  value="<?php if(array_key_exists('name',$_POST ) && $_POST['name']) {echo set_value('name');}?>" class="form-control">
        <div class="red"><?php if(form_error("name")) {echo form_error("name");}?></div>
        </div>
        <div>
        <label for="email"> Email<span class="red">*</span></label>
        <input type="email" placeholder="Email" id="email" name="email"  value="<?php if(array_key_exists('email',$_POST ) && $_POST['email']){echo set_value('email');}?>" class="form-control">
        <div class="red"><?php if(form_error("email")) {echo form_error("email");}?></div>
        </div>
        <div>
        <label for="password">Password<span class="red">*</span></label>
        <input type="password" placeholder="Password" id="password" name="password"  value="" class="form-control">
        <div class="red"><?php if(form_error("password")) {echo form_error("password");}?></div>
        </div>
        <div >
        <label for="phone"> Phone No.<span class="red">*</span></label>
        <input type="text" placeholder="Phone No" id="phone" name="phone" value="<?php if(array_key_exists('phone',$_POST ) && $_POST['phone']) {  echo set_value('phone');}?>" class="form-control">
        <div class="red"><?php if(form_error("phone")) {echo form_error("phone");}?></div>
        </div>
        <div class="form-group"  >
            <button class="btn custom-button btn-block btn-primery " > Register Now</button>
            <button type="reset" class="btn custom-button  btn-primery " id="reset" > Reset</button>
        </div>

    </div>
    </form>
  </div>
</div>

    </div>
    </div>

</body>
</html>