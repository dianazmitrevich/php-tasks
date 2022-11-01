<?php
   require 'header.php';
   ?>

<div class="container">
   <div class="row g-5">
      <div class="col-md-7 col-lg-8">
         <h4 class="mb-3 mt-4">Editing user #<?php echo $user['id']?></h4>
         <form class="needs-validation" action="/edit?id=<?php echo $user['id']; ?>" novalidate="" method="">
            <div class="row g-3">
               <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-muted">(Required)</span></label>
                  <input type="hidden" name="method" value="PATCH" required="">
                  <input type="email" class="form-control" id="email" value="<?php echo $user['email']?>" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="you@example.com" required="">
                  <div class="invalid-feedback">
                     Please enter a valid email address.
                  </div>
               </div>

               <div class="col-12">
                  <label for="name" class="form-label">Your first and last name</label>
                  <input type="text" class="form-control" id="name" value="<?php echo $user['name']?>" name="name" pattern="^\pL+\s+\pL+$" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                     Valid first and last name is required.
                  </div>
               </div>
               <?php  $selected[$user['gender']] = 'selected="selected"';?>
               <div class="col-md-6">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select" id="gender" name="gender" required="">
                     <option value="">Choose...</option>
                     <option <?=$selected['Male'];?> value="Male">Male</option>
                     <option <?=$selected['Female'];?> value="Female">Female</option>
                  </select>
                  <div class="invalid-feedback">
                     Please select a valid gender.
                  </div>
               </div>
               <?php  $selected[$user['status']] = 'selected="selected"';?>
               <div class="col-md-6">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status" required="">
                     <option value="">Choose...</option>
                     <option <?=$selected['Active'];?> value="Active">Active</option>
                     <option <?=$selected['Inactive'];?> value="Inactive">Inactive</option>
                  </select>
                  <div class="invalid-feedback">
                     Please provide a valid status.
                  </div>
               </div>
            </div>

            <button class="w-100 btn btn-primary btn-lg mt-4" id="update-user" name="update-user" type="submit">Add</button>
         </form>
      </div>
   </div>
</div>

<?php
   require 'footer.php';
   ?>