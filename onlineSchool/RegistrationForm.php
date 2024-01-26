<!--Start student Registration Modal -->
<!-- Modal -->
<div class="modal fade" id="stuRegModalCenter" tabindex="-1" aria-labelledby="stuRegModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuRegModalCenterLabel">Student Registration</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--  Start student registration Form code -->
        <form action="Student/adduser.php" method="post">
          <div class="mb-3">
            <i class="fas fa-user"></i><lable for="stuname" class="pl-2 font-weight-bold">Name</lable><input type="text" class="form-control" placeholder="Name" name="stuname" required >

          </div>
          <div class="mb-3">
            <i class="fas fa-envelope"></i><lable for="stuemail" class="pl-2 font-weight-bold">Email</lable><input type="email" class="form-control" placeholder="Email" name="stuemail" required >
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3"><i class="fas fa-key"></i>
      <label for="stupass" class="pl-2 font-weight-bold">New Password</label>
      <input type="password" class="form-control" name="stupass" required>
    </div>
    <i class="fa-solid fa-users"></i><label for="stupass" class="pl-2 font-weight-bold"> User</label>
      <select class="form-select mb-3"
		          name="role" 
		          aria-label="Default select example">
			  <option selected value="student">Student</option>
			  <option value="faculty">Faculty</option>
		  </select>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Sign UP</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
     
    </form>
 <!--  END student registration Form code -->
      </div>
       <!-- <div class="modal-footer">
         <button type="button" class="btn btn-primary" onclick="addStu()">Sign UP</button> 
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>  -->
    </div>
  </div>
</div>
  <!-- END student Registration Modal -->