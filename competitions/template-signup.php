<?php
/**
 * Template Name: signup
 */
get_header();
?>
<div class="container w-25 mt-5" style="background-color: #f1f1f1;">
    <h1 class="text-center">signup</h1>
    <form id="signup_form">
        <div class="row g-3">
            <div class="col">
                <input type="text" name="first_name" class="form-control" placeholder="First name" aria-label="First name">
            </div>
        </div>
        <div class="row g-3 mt-3">
            <div class="col">
                <input type="text" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name">
            </div>
        </div>
        <div class="row g-3 mt-3">
            <div class="col">
                <input type="text" name="user_name" class="form-control" placeholder="user name" aria-label="user name">
            </div>
        </div>
        <div class="row g-3 mt-3">
            <div class="col">
                <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
        </div>
        <div class="row g-3 mt-3">
            <div class="col">
                <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="password">
            </div>
        </div>
        <div class="row g-3 my-3 pb-3">
            <div class="col">
                <button id="signup_btn" class="btn btn-primary ">SIGNUP</button>
            </div>
        </div>
        <div class="row g-3 my-3 pb-3">
            <div class="col">
                <h5>Already user, <a href="login">login</a></h5>
            </div>
        </div>
    </form>
</div>
<?php
get_footer();