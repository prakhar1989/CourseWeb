<?php
$this->load->view('include/header');
$errormsg = $this->session->flashdata('error');
$prev_username = $this->session->flashdata('prev_uname');
?>
<div class="container">
  <div class="row">
    <div id="loginform" class="span8 offset4">
    <h4>Login</h4>
    <form action="<?php echo base_url();?>/login/validate_login" method="post" accept-charset="utf-8">
        <fieldset>
          <div class="clearfix">
            <label for="username">Username</label>
            <div class="input">
            <input class="large" id="username" name="username" size="30" type="text" value="<?php echo $prev_username; ?>"/>
            </div>
          </div><!-- /clearfix -->
          <div class="clearfix <?php if ($errormsg) { echo "error";} ?>">
            <label for="password">Password</label>
            <div class="input rel">
              <input  class="large <?php if ($errormsg) { echo "error";} ?>" id="password" name="password" size="30" type="password" />
              <p class="msgerror<?php if ($errormsg){ echo " fadein";} ?>">Wrong Username and password combination</p>
            </div>
            <input type="hidden" name="redirectTo" value="<?php echo $redirectTo ?>" />
          </div><!-- /clearfix -->
          <div class="actions">
            <p><input type="submit" class="btn primary" value="Login &rarr;"/></p>
          </div>
        </fieldset>
        </form>
      </div>
    </div>
</div> <!-- /container -->
<?php
$this->load->view('include/footer');
?>
