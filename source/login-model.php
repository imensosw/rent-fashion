  <!-- Modal login-->

  <div class="modal login_model fade" id="login_model" role="dialog">

    <div class="modal-wrap">

      <!-- Modal content-->

      <div class="modal-content">

        <div class="modal-header">

          <div class="model_head">

            <h4>Log in <?php echo $web['title']; ?></h4>

          </div>

          <button type="button" class="close crox_close" data-dismiss="modal"></button>

        </div>

        <div class="modal-body">

          <div class="modal_social">

          </div>

          <div class="login_form_wrp mar_t2">

          <?php

            if(isset($_POST['phps_login'])) {
              
               $phps_product = mysql_real_escape_string($_POST['phps_product']);

              $phps_usern = mysql_real_escape_string($_POST['phps_usern']);

              $phps_passwd = mysql_real_escape_string($_POST['phps_passwd']);

              $phps_passwd = md5($phps_passwd);

              $query = mysql_query("SELECT * FROM purchasify_users WHERE usern='$phps_usern' and passwd='$phps_passwd'");

              if(mysql_num_rows($query)) 
              {
                $fetch = mysql_fetch_array($query);
                $_SESSION['ps_usern'] = $fetch['usern'];
                if(!empty($phps_product))
                {  
                  header("Location: $web[url]i/$phps_product");
                }
                else
                {
                  header("Location: $web[url]dashboard"); 
                }
              } 
              else 
              {

                echo error('<p align="center">Oops! You have entered wrong username or password</p>');

              }
            }

          ?>

            <form action="" method="post"  class="login_form" accept-charset="utf-8">

              <div class="form-group">

                 <input type="hidden" name="phps_product" value="<?php if(!empty($id)){echo $id;} ?>">

              </div>

              <div class="form-group">

                 <input type="text" value="" placeholder="Username" name="phps_usern" autofocus="">

              </div>

              <div class="form-group">

                 <input name="phps_passwd" type="password" value="" placeholder="Password" autocomplete="off">

              </div>

              <div class="form-group">

                <span class="modal_check">

                  <input id="forget_check" type="checkbox">

                  <label for="forget_check">Remember me</label>

                </span>

                <span><a href="" class="forget_pass">forget password</a></span>

              </div>

              <div class="form-group">

                <div class="terms_condition text-center">

                  <span><a href="#">terms&condition</a></span>

                </div> 

              </div>

              <div class="form-group">

                  <div class="login_input">

                     <button type="submit" name="phps_login" class="ui green button fluid submit model_btn">Log in</button>

                  </div>

              </div>  

            </form>

          </div>

        </div>

        <div class="modal-footer">

          <div class="sign_up_link text-center">

              <span>not a member</span>

              <!--<a href="<?php //echo $web['url']; ?>account/register" id="register_form" class="auth-switch" data-location="signup">sign up<i class="fa fa-arrow-right"></i></a>-->

              <!-- <a href="<?php //echo $web['url']; ?>account/register" id="register_form" class="auth-switch" data-location="signup">sign up<i class="fa fa-arrow-right"></i></a>-->
              
              <a href="#" class="auth-switch" data-dismiss="modal" data-toggle="modal" data-target="#signin_model">sign up<i class="fa fa-arrow-right"></i></a>
            </div>

        </div>

      </div>

      

    </div>

  </div>



<!-- Modal singnin-->

<div class="modal signin_model fade" id="signin_model" role="dialog">

    <div class="modal-wrap">

      <!-- Modal content-->

      <div class="modal-content">

        <div class="modal-header">

          <div class="model_head">

            <h4>Sign in <?php echo $web['title']; ?></h4>

          </div>

          <button type="button" class="close crox_close " data-dismiss="modal" style="background-image: url('<?php echo $web['url']; ?>static/img/cancel.svg');"></button>

        </div>

        <div class="modal-body">

          <div class="modal_social">

          </div>

          <div class="signin_form_wrp mar_t2">

          <?php

 /* if(isset($_POST['phps_register'])) 
  {

     $usern = mysql_real_escape_string(protect($_POST['usern']));

    $passwd = mysql_real_escape_string(protect($_POST['passwd']));

    $cpasswd = mysql_real_escape_string(protect($_POST['cpasswd']));

    $email = mysql_real_escape_string(protect($_POST['email']));

    //print_r($_POST);

    $email_exists = mysql_query("SELECT * FROM purchasify_users WHERE email = '$email'");

    $emailchecker = mysql_fetch_array($email_exists);

    $usern_exists = mysql_query("SELECT * FROM purchasify_users WHERE usern = '$usern'");

    $usernchecker = mysql_fetch_array($usern_exists);



    if(empty($usern) or empty($passwd) or empty($cpasswd) or empty($email)) { echo error("Error! All fields are required."); }

    elseif(!isValidUsername($usern)) { echo error("Error! Please enter valid username."); }

    elseif(!isValidEmail($email)) { echo error("Error! Please enter valid e-mail address."); }

    elseif($usernchecker > 1) { echo error("Error! Username already taken."); }

    elseif($emailchecker > 1) { echo error("Error! Email already exists."); }

    elseif($passwd !== $cpasswd) { echo error('<p align="center">Your passwords does not match.</p>'); 
  }



    else 

    {

    $passwd = md5($passwd);
    $insert1 = "INSERT purchasify_users (usern,passwd,email,quotas,fname,lname,role,status,pname,facebook_url,website_url,twitter_name,user_desc,avatar,user_currency,user_paypal,user_banner,user_address,user_address_shipping) VALUES ('$usern','$passwd','$email','$web[reg_quota]','','','0','0','','','','','','','','','','','')";
    $insert = mysql_query($insert1) or die(mysql_error());

    $_SESSION['install_usern'] = $usern;

    $_SESSION['install_passwd'] = mysql_real_escape_string($_POST['passwd']);



    //header("Location: $web[url]account/login");

    }

  } */

  ?>
  <div id="message_s">
     </div>

            <form action="" class="signin_form" id="signin_form" >
             
              <div class="form-group">

                <input name="regquota" id="regquota" type="hidden" placeholder="Username" autocomplete="off" value="<?php echo $web['reg_quota']; ?>">
                <input name="regurl" id="regurl" type="hidden" placeholder="Username" autocomplete="off" value="<?php echo $web['url']; ?>dashboard">

              </div>
              <div class="form-group">

                <input name="usern" id="usern" type="text" placeholder="Username" autocomplete="off">

              </div>

              <div class="form-group">

                <input name="email" id="email" type="email" placeholder="Email address" autocomplete="off">

              </div>

              <div class="form-group">

                <input name="passwd" id="password" type="password" placeholder="Password" autocomplete="off">

              </div>

              <div class="form-group">

                <input name="cpassword" id="cpassword" type="password" placeholder="Confirm your password" autocomplete="off">

              </div>

              <div class="form-group">

                <span class="modal_check">

                  <input id="forget_check2" type="checkbox">

                  <label for="forget_check2">Remember me</label>

                </span>

                <span><a href="" class="forget_pass">forget password</a></span>

              </div>

              <div class="form-group">

                <div class="terms_condition text-center">

                  <span><a href="#">terms&condition</a></span>

                </div> 

              </div>
              
              <div class="form-group">

                  <button type="submit" name="phps_register" class="ui green button fluid submit model_btn" id="signup">Sign up</button>

              </div>  

            </form>
          </div>

        </div>

        <div class="modal-footer">

          <div class="login_link text-center">

              <span>Already a member</span>

              <a href="#" class="close" data-dismiss="modal" data-toggle="modal" data-target="#login_model" >login</a>

            </div>

        </div>

      </div>

    </div>

  </div>



