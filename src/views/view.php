<?php
   require 'header.php';
   ?>

<div class="container">
   <div class="row g-5">
      <div class="col-md-7 col-lg-8">
         <h4 class="mb-3 mt-4">View users</h4>
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">Email</th>
                  <th scope="col">First and last name</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Status</th>
                  <th scope="col"></th>
               </tr>
            </thead>
            <tbody>
               <?php
               foreach ($this->db->readTable('Data') as $value):
                   ?>
               <tr>
                  <td scope="row"><?php echo $value['email']; ?></td>
                  <td><?php echo $value['name']; ?></td>
                  <td><?php echo $value['gender'];?></td>
                  <td><?php echo $value['status'];?></td>
                  <td style="text-align: right;">
                     <a class="btn btn-primary btn-sm" href="/index.php?edit&id=<?php echo $value['id']; ?>">Edit</a>
                     <a class="btn btn-danger btn-sm"
                        href="/index.php?page=delete&id=<?php echo $value['id']; ?>">Delete</a>
                  </td>
               </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>

<?php
   require 'footer.php';
   ?>