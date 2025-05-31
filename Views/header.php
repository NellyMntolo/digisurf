<?php
$book_cancel = '';
error_reporting(0);

$header = '<!-- Login Modal -->
<div class="modal fade large-modal" id="myLogin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2>Happy to see you again!<!--'.$log_in_text1.'--></h2>
                </div>
                <form class="modal-cont" method="POST" id="loginForm">
                    <div class="form-group">
                        <input type="text" class="form-control" id="LoginNum" placeholder="'.$log_in_text2.'">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="LoginPass" placeholder="'.$log_in_text3.'">
                    </div>
                    <div class="modal-login ">
                       <!--<div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="#" style="padding-top:23px;" class="forgotBtn" data-toggle="modal" data-target="#myForgot">'.$log_in_text4.'</a>
                                </div>
                            </div>
                        </div> -->

                    <div class="row">
                        <div class="col-md-4" style="padding-left: 0px;">
                            <div class="form-group">
                                <img src="/custom-captcha.php" class="form-control" style="width: auto!important; border: 0px;" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" id="login_code" class="form-control cooperate-input" placeholder="Enter Code" required="required">
                            <p class="help-block text-danger"></p>
                          </div>
                        </div>
                    </div>

                        <div class="row log-btn-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-green login_submit" name="login_submit">'.$log_in_text5.'</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    

                </form>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="#" style="padding-top:23px;" class="forgotBtn" data-toggle="modal" data-target="#myForgot">'.$log_in_text4.'?</a>
                    </div>
                </div>
            </div>

            <div class="row sign-up-row-text">
                <div class="col-md-12" style="margin-top: 30px;">
                    <div class="form-group" style="height:30px">
                        <p class="no-pw-p">Don’t have Nothing is Garbage account?</p>
                        <a href="#" style="padding-top:23px;" class="sign-up-text" data-toggle="modal" data-target="#mySignUp">Sign Up</a>
                        <!--<button type="button" class="btn btn-green" data-toggle="modal" data-target="#mySignUp">Sign Up</button>-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>




<!-- Login Error -->
<div class="modal fade large-modal" id="myLoginError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Wrong Username, Password or Security Code，<br>
    Please try again.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>



<!-- forgotten password -->
<div class="modal fade large-modal" id="myForgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png"><span class="modal-span-icon"><img src="/assets/images/img-forget-password.png"></span>
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h3> <!-- '.$log_in_text6.' --> Enter Email</h3>
                </div>
                <form class="modal-cont" id="forgotten-password" method="post">
                    <div class="form-group">
                        <input type="text"  class="form-control forgotten-password" placeholder="Email"> <!-- placeholder'.$log_in_text7.' -->
                    </div>
                    <div class="modal-buttons">
                        <button type="submit" class="btn btn-green">Submit <!-- '.$log_in_text8.' --></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<!-- forgotten success -->
<div class="modal fade large-modal" id="myForgotSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png"><span class="modal-span-icon"><img src="/assets/images/img-confirm-email.png"></span>
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
    <h3>Please Enter The verification code<br>
    Sent to your Email</h3>
                </div>
                <form class="modal-cont" id="forgotten-reset" method="post">
                    <div class="form-group">
                        <input type="text"  class="form-control forgotten-reset" placeholder="Verification Code">
                        <input type="hidden"  class="forgotten-reset-number" value="'.$_SESSION['confirmed_email'].'">
                    </div>
                    <div class="modal-buttons">
                        <button type="submit" class="btn btn-green">Submit <!-- '.$log_in_text8.' --></button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<!-- New Password Modal -->
<div class="modal fade large-modal" id="newPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png"><span class="modal-span-icon"><img src="/assets/images/img-reset-password.png"></span>
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2>New Password</h2>
                </div>
                <form class="modal-cont" method="POST" id="newPass">
                    <input type="hidden" class="form-control" id="phone">
                    <div class="form-group">
                        <input type="password" class="form-control" id="newpass1" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="newpass2" placeholder="Confirm Password">
                    </div>
                    <div class="modal-login ">
                        <button type="submit" class="btn btn-green">'.$log_in_text5.'</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>



<!-- forgotten error -->
<div class="modal fade large-modal" id="myForgoterror" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->
            <div class="col-md-12">
                <div class="modal-title">
                    <h3 class="forgot-error">Account Or Password incorrect, <br>
    Please try again.</h3>
                </div>
            </div>

        </div>
    </div>
</div>
</div>




<!-- cancel booking -->
<div class="modal fade large-modal" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content mc2">
            <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-content-in">
            <!--<div class="col-md-4 large-modal-image">
                <img src="/assets/images/img-signup-bg.png">
            </div>-->

                <div class="col-md-12">
                    <div class="modal-title">
                        <h3>您確定要取消這堂課?</h3>
                    </div>
                    <div class="modal-buttons">
                        <form action="/ClassRecordCancel" method="POST">
                            <input value="" type="hidden" name="cancel_booking" class="the-class">
                            <input value="" type="hidden" name="the-user" class="the-user-id">
                            <button type="button" class="btn btn-default2" data-dismiss="modal">返回</button>
                            <button type="submit" class="btn btn-default submitCancel" data-dismiss="modal">確定</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- for second block if theres a conflict -->
<div class="modal fade large-modal" id="myConflict" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-cont">
                    <h4 class="text-center">同時段已有預約課程！<br>
    請選擇其他時間</h4>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<!-- not bought -->
<div class="modal fade large-modal" id="myNotBought" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->
            <div class="col-md-12">
                <div class="modal-cont">
                    <h4 class="text-center">您無法預約課程，<br>請洽櫃臺詢問。</h4>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


<!-- Cancelled -->
<div class="modal fade large-modal" id="myCancelled" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-cont">
                    <h4 class="text-center">You Cancelled This Class!<br> Please Try 7 Days From The Date Below</h4>
                    '.$_SESSION['bookingcancelled'].'
                </div>
            </div>

        </div>
    </div>
</div>
</div>


<!-- after confirmation from above modal -->
<div class="modal fade large-modal" id="myBookingAfter" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2>GOT IT</h2>
                    <h3>您已預約成功！</h3>
                </div>
                <div class="modal-cont">
                    <p class="text-center">請於預約時段<span class="green">15</span>分鐘前報到</p>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<!-- review -->
<div class="modal fade large-modal" id="myReview" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-dialog-review" role="document">        
        <div class="modal-content mc2 modal-review">
            <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
            <div class="modal-review-in">
                <h3>老師評鑑</h3>
                <!--<form method="post" action="/Rating">-->
                '.$class_rating.'
                <!--<div class="bottom text-center">
                    <button type="button" class="btn btn-green">送出</button>
                </div>
                </form>-->
            </div>
        </div>
    </div>
</div>






<!-- sign up email -->
<div class="modal fade large-modal" id="signupemail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">  
            <div class="col-md-12">
                <div class="modal-title">
                    <h6>An Email has been sent to you, <br>thank you for signing up.<br></h6>
                </div>
            </div>

        </div>
    </div>
</div>
</div>




<!-- join US -->
<div class="modal fade" id="myjoinus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2 small-modal">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        
            <div class="col-md-12">
                <div class="modal-title">
                    <h3 class="join-us-thank">Thank you!</h3>
                    
                </div>
            </div>

            <div class="modal-cont">
                <p class="text-center">we will contact you soon</p>
            </div>

            <!--<div class="form-group join-back-btn">
                <input type="button" class="form-control" placeholder="" value="Back to Home">
            </div>-->

        </div>
    </div>
</div>
</div>

<!-- Join Us Error -->
<div class="modal fade large-modal" id="myJoinUsError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Please Feel Out<br>
    All The info.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<!-- Cooperation -->
<div class="modal fade" id="mycooperation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2 small-modal">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        
            <div class="col-md-12">
                <div class="modal-title">
                    <h3 class="join-us-thank">Thank you</h3>
                    
                </div>
            </div>

            <div class="modal-cont">
                <p class="text-center">we will contact you soon</p>
            </div>

            <!--<div class="form-group join-back-btn">
                <input type="button" class="form-control" placeholder="" value="Back to Home">
            </div>-->

        </div>
    </div>
</div>
</div>

<!-- Cooperation Error -->
<div class="modal fade large-modal" id="myCooperationError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Please Feel Out<br>
    All The info.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>



<!-- SignUp Modal -->
<div class="modal fade large-modal signup" id="mySignUp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2>Sign Up</h2>
                </div>
                <form class="modal-cont" method="POST" id="SignUpForm">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="username" type="email" class="form-control" id="SignUpUser" placeholder="Email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="password" type="password" class="form-control" id="SignUpPass" placeholder="Password">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input name="SignUpPass_confirm" type="password" class="form-control" id="SignUpPass_confirm" placeholder="Repeat Password">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4" style="padding-left: 0px;">
                            <div class="form-group">
                                <img src="/custom-captcha.php" class="form-control" style="width: auto!important; border: 0px;" />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>

                        <div class="col-md-8">
                          <div class="form-group">
                            <input type="text" id="signup_code" name="signup_code" class="form-control cooperate-input" placeholder="Enter Code" required="required">
                            <p class="help-block text-danger"></p>
                          </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div>
                            <button type="submit" class="btn btn-green" name="SignUp_submit">Sign up <!-- '.$log_in_text5.'--></button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <div class="row">
                    <div class="col-md-12">
                        <label class="check-container">By signing up on Nothing Is Garbage, you agree to our <a href="/Terms" style="text-decoration: underline;">Terms & Conditions and Anti-Spam Policy</a>
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                        </label>                        
                    </div>
                </div>

                <!--<div class="row">
                    <label>Already have Nothing is Garbage account? <a data-toggle="modal" data-target="#myLogin">Login</a></label>
                </div>-->

            </div>

        </div>
    </div>
</div>
</div>

<!-- Sign Up Error -->
<div class="modal fade large-modal" id="mySignUpError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Please Feel Out<br>
    All The info.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<!-- Search Modal -->
<div class="modal fade large-modal" id="mySearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">

            <div class="col-md-12">
                <!--<div class="modal-title">
                    <h2>Search</h2>
                </div>-->
                <form class="modal-cont" method="POST" id="SearchForm" action="/Search_Site">
                    <div class="form-group">
                        <input type="search" class="form-control" id="Search" placeholder="Search" name="search">
                    </div>
                    <div class="modal-login">
                        <button type="submit" class="btn btn-green" name="search_submit">Go</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Subscribe Modal -->
<div class="modal fade large-modal" id="mySubscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">

            <div class="col-md-12">
                <div class="modal-title">
                    <h2>Subscribe Sent</h2>
                </div>                
            </div>
            
        </div>
    </div>
</div>
</div>

<!-- News Letter Error -->
<div class="modal fade large-modal" id="mynewletterError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Please Feel Out<br>
    All The info.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<!-- Newsletter Sent -->
<div class="modal fade large-modal" id="myNewsletterSent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Thanks For Your<br>
    Newsletter Subscription.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<!-- Newsletter Error -->
<div class="modal fade large-modal" id="myNewsletterError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Please Feel Out<br>
    All The info.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<!-- Quick Message Sent -->
<div class="modal fade large-modal" id="myQuickMessageSent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Your message<br>
    has been sent.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<!-- Quick Message Error -->
<div class="modal fade large-modal" id="myQuickMessageError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Please Feel Out<br>
    All The info.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>



<!-- Join Us Sent -->
<div class="modal fade large-modal" id="myJoinUsSent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Thanks for<br>
    Joining Us.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<!-- Join Us Error -->
<div class="modal fade large-modal" id="myJoinUsError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
    <div class="modal-content mc2">
        <button type="button" class="btn modal-close" data-dismiss="modal" aria-label="Close"></button>
        <div class="modal-content-in">
        <!--<div class="col-md-4 large-modal-image">
            <img src="/assets/images/img-signup-bg.png">
        </div>-->

            <div class="col-md-12">
                <div class="modal-title">
                    <h2></h2>
                </div>
                <form class="modal-cont" >
                    <div class="form-group">
                       <h3 class="login-error">Please Feel Out<br>
    All The info.</h3>
                    </div>
                    <div class="form-group">
                        
                    </div>
                    <div class="modal-login ">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>







<header class="" id="loggedin">
    <nav>
        <!--<div class="logo"><a href="/"><img src="/assets/images/img-logo-web@3x.png"></a></div>-->
        <div class="logo"><a href="/"><img src="/assets/images/nis_logo_140x32.png"></a></div>
        <!--<div class="logo"><a href="/"><img src="/assets/images/img-logo-web.png">城市修理站</a></div>-->
        <ul class="menu">
            '.$nominate_shop.'
            '.$menu_account_mobile.'
            <!-- <li><a href="/About" '.theUrl('/About').'> '.$menu_text1.'</a></li> -->
            <li><a href="/Search_Store" '.theUrl('/Search_Store').'> '.$menu_text1.'</a></li>
            <li><a href="/Location_Explore" '.theUrl('/Location_Explore').'> '.$menu_text2.'</a></li>
            <!--<li><a href="/FAQ" '.theUrl('/FAQ').'>'.$menu_text2.'</a></li>-->
            <li><a href="/Articles" '.theUrl('/Articles').'>'.$menu_text3.'</a></li>
            <!-- <li><a href="/JoinUs" '.theUrl('/JoinUs').'>'.$menu_text4.'</a></li>
            <li><a href="/#" '.theUrl('/#').'>'.$menu_text5.'</a></li>
            <li><a href="/Terms" '.theUrl('/Terms').'>'.$menu_text4.'</a></li>-->
            <li><a href="/Events" '.theUrl('/Events').'>'.$menu_text5.'</a></li>
            <li><a href="/Workshops" '.theUrl('/Workshops').'>'.$menu_text6.'</a></li>
            <!--<li id="type"><a href="#myLogin" class="btn btn-default2"  data-toggle="modal" data-target="#myLogin">'.$menu_text7.'</a></li>-->
            
            <!-- <li id="type"><a href="#myLogin" class="btn btn-default2">'.$menu_text7.'<span></span></a></li> -->
            <!--'.$menu_log.'-->



            <li class="language-selector">
                    <!-- <p>Language</p> -->
                    <!--<form action="?lang=en" method="GET"><button type="submit" name="lang" value="en" class="lang-nav">EN</button></form>
                    <form action="?lang=ch" method="GET"><button type="submit" value="ch" name="lang" class="">繁體中文</button></form>-->
                    
                
                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$lang_result.'<span class="caret"></span></a> -->

                        <button class="dropdown-toggle" data-toggle="dropdown">
                            <span><img src="/assets/images/language.svg"/></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            '.$active_language.'
                            <!-- <li><form method="GET" action="?lang=zh"><button type="submit" class="lang-btn">ch test</button><input type="hidden" value="zh" name="lang"></form></li>
                            <li><a href="?lang=zh" class="lang-btn">lang test zh</a></li>
                            <li><a href="?lang=en" class="lang-btn">lang test en</a></li>
                            <li><form method="GET" action="?zh"><button type="submit" class="lang-btn">Chinese</button><input type="hidden" value="zh" name="lang"></form></li>
                            <li><form method="GET" action="?kr"><button type="submit" class="lang-btn">Korean</button><input type="hidden" value="kr" name="lang"></form></li>
                            <li><form method="GET" action="?jp"><button type="submit" class="lang-btn">Japanese</button><input type="hidden" value="jp" name="lang"></form></li> -->
                          </ul>
                        </li>
                    </ul>
        </li>

        <!--<li class="searcher">-->
        <li>
            <!-- <button class="searchicon page-scroll" data-toggle="modal" data-target="#myModal">
                <span><img src="/assets/images/search.svg"/></span>
            </button> -->

            <button class="searchicon page-scroll" data-toggle="modal" data-target="#mySearch">
                <span><i class="glyphicon glyphicon-search"></i></span>
            </button>

            <!--<div class="navbar-right">
              <form class="search-form" role="search">
                <div class="search-group pull-right" id="search">
                  <input type="text" class="search-control" placeholder="Search">
                  <button type="submit" class="search-control search-control-submit">Submit</button>
                  <span class="search-label"><i class="glyphicon glyphicon-search"></i></span>
                </div>
              </form>
              </div>-->

        </li>

        '.$menu_account.'

        </ul>

        <!--<ul class="others">-->
        <ul class="">
            <li class="trigger">
                <div class="in"></div>
            </li>   
        </ul>
    </nav>
</header>


  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <div class="close1" data-dismiss="modal" aria-label="Close">
            <i class="fa fa-close fa-2x"></i>
        </div>
      </div>
      <div class="modal-body">
        <section>
            <div>
               <!-- <h1 class="text-center">Search</h1> -->
            </div>
        </section>

        <section class="modal-para">
            <div class="text-center">
                <div>
                  <form method="POST" action="/Search">
                    <input type="search" class="searchinput" name="search" placeholder="search..."><input type="submit" class="searchbtn btn-default" value="Go">
                  </form>
                </div>
            </div>
        </section>
      </div>
    </div>
  </div>
</div>';

$sideheader = '<div id="navigation-slide" class=" hidden-sm hidden-xs">
                    <div id="navigation-slide-inner">
                        <div class="profile">
                            <div class="profile-inner">
                                <h4>'.$side_user.'</h4>
                                <img src="/assets/images/membership_name.svg" alt="">
                            </div>
                        </div>
                        <ul id="member-nav">
                            <li><a href="/Class_Records" '.theUrl('/Class_Records').'>網路課程預約</a></li><!-- 課程記錄 -->
                            <li><a href="/Class_Records_Offline" '.theUrl('/Class_Records_Offline').'>現場課程預約</a></li>
                            <li><a href="/Sport_Records" '.theUrl('/Sport_Records').'>運動記錄</a></li>
                            <li><a href="/Body_Records" '.theUrl('/Body_Records').'>身體記錄</a></li>
                            <!--<li><a href="/Payment_Records" '.theUrl('/Payment_Records').'>購課記錄</a></li>-->
                            <li><a href="/Service&Rules" '.theUrl('/Service&Rules').'>服務條款</a></li>
                            <li><a href="/Personal_Settings" '.theUrl('/Personal_Settings').'>修改密碼</a></li>
                        </ul>
                    </div>
                </div>
                

                <div id="navigation-slide" class="visible-sm visible-xs">
                    <ul id="member-nav">
                        <div class="dropdown">
                            <button id="mobile-side-menu-button" type="button" class="btn btn-default2 mobile-side-menu-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                網路課程預約<!-- Echo Active -->
                                <!--<span class="caret"></span>-->
                            </button>
                            <span class="caret" style="border-top: 16px dashed;border-right: 12px solid transparent;border-left: 12px solid transparent;color: #00bab3;margin-left: -60px;" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></span>
                                
                            <ul class="dropdown-menu" aria-labelledby="mobile-side-menu-button">
                                <li class="mobile-side-menu mob-what"><a href="/Class_Records" '.theUrl('/Class_Records').'>網路課程預約</a></li>
                                <li class="mobile-side-menu mob-what"><a href="/Class_Records_Offline" '.theUrl('/Class_Records_Offline').'>現場課程預約</a></li>
                                <li class="mobile-side-menu mob-what"><a href="/Sport_Records" '.theUrl('/Sport_Records').'>運動記錄</a></li>
                                <li class="mobile-side-menu mob-what"><a href="/Body_Records" '.theUrl('/Body_Records').' >身體記錄</a></li>
                                <!--<li class="mobile-side-menu mob-what"><a href="">購課記錄</a></li>-->
                                <li class="mobile-side-menu mob-what"><a href="/Service&Rules" '.theUrl('/Service&Rules').'>服務條款</a></li>
                                <li class="mobile-side-menu mob-what"><a href="/Personal_Settings" '.theUrl('/Personal_Settings').'>修改密碼</a></li>
                            </ul>
                        </div>
                    </ul>
                </div>';
?>