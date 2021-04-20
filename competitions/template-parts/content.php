<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package competitions
 */

?>
<div class="container w-25 mt-5" style="background-color: #f1f1f1;">
    <h1 class="text-center">Login</h1>
    <form id="login_form">
        <div class="row g-3 mt-3">
            <div class="col">
                <input type="text" class="form-control" name="user_name_l" id="inputEmail4" placeholder="User Name">
            </div>
        </div>
        <div class="row g-3 mt-3">
            <div class="col">
                <input type="password" name="password_l" class="form-control" id="inputPassword4" placeholder="password">
            </div>
        </div>
        <div class="row g-3 my-3 pb-3">
            <div class="col">
                <button id="login_btn" class="btn btn-primary ">LOGIN</button>
            </div>
        </div>
        <div class="row g-3 my-3 pb-3">
            <div class="col">
                <h5>New user, <a href="signup">signup</a></h5>
            </div>
        </div>
    </form>
</div>
		