<?php
/**
 * Template Name: Entries
 */
get_header();
?>
	<div class="container mt-5 p-5" style="background-color: #f1f1f1;">
		<div>
			<h1 class="text-center"> Submit Entry </h1>
		</div>
		<div>
			<form id="entry" >
			<div class="row">
				<div class="col">
					<input type="text" name="first_name" class="form-control mt-2" placeholder="First name" aria-label="First name">
				</div>
				<div class="col">
					<input type="text" name="last_name" class="form-control mt-2" placeholder="Last name" aria-label="Last name">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<input type="email" name="email" class="form-control mt-2" placeholder="Email" aria-label="Email">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<input type="text" name="phone" class="form-control mt-2" placeholder="Phone Number" aria-label="Phone">
				</div>
			</div>
			<div class="row">
				<div class="col">
					<label for="cars">Choose a Competition</label>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<select name="competition" >
						<option disabled selected >Select</option>
						<option value="Cricket">Cricket</option>
						<option value="Football">Football</option>
						<option value="Chess">Chess</option>
						<option value="Swimming">Swimming</option>
						<option value="Cycling">Cycling</option>
						</select>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<textarea name="description" class="form-control mt-2" placeholder="Description" cols="30" rows="5"></textarea>
				</div>
			</div>
			<div class="row">
				<button id="submit_entry" class="brn btn-primary w-25 mx-auto mt-3">SUBMIT</button>
			</div>
			</form>
		</div>
	</div>
<?php
get_footer();