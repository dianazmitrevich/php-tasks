<?php
   require 'header.php';
   ?>
   
<div class="container">
   <div class="row g-5">
      <div class="col-md-7 col-lg-8">
         <h4 class="mb-3 mt-4">Add user</h4>
         <form class="needs-validation" action="/index.php?page=create" novalidate="" method="post">
            <div class="row g-3">
               <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-muted">(Required)</span></label>
                  <input type="email" class="form-control" id="email" name="email" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" placeholder="you@example.com">
                  <div class="invalid-feedback">
                     Please enter a valid email address.
                  </div>
               </div>

               <div class="col-12">
                  <label for="name" class="form-label">Your first and last name</label>
                  <input type="text" class="form-control" id="name" name="name" pattern="\p{L}{2,}$" placeholder="" value="" required="">
                  <div class="invalid-feedback">
                     Valid first and last name is required.
                  </div>
               </div>

               <div class="col-md-6">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select" id="gender" name="gender" required="">
                     <option value="">Choose...</option>
                     <option>Male</option>
                     <option>Female</option>
                  </select>
                  <div class="invalid-feedback">
                     Please select a valid gender.
                  </div>
               </div>

               <div class="col-md-6">
                  <label for="status" class="form-label">Status</label>
                  <select class="form-select" id="status" name="status" required="">
                     <option value="">Choose...</option>
                     <option>Active</option>
                     <option>Inactive</option>
                  </select>
                  <div class="invalid-feedback">
                     Please provide a valid status.
                  </div>
               </div>
            </div>

            <button class="w-100 btn btn-primary btn-lg mt-4" id="add-user" name="add-user" type="submit">Add</button>
         </form>
      </div>
   </div>
</div>

<?php
   require 'footer.php';
   ?>