  
  <!-- Start studnent login form Modal-->
  <!-- Modal -->

  <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" aria-labelledby="stuLoginModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModalCenterLabel">Student Login</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!--  Start student login Form code -->
        <form id="stuLoginForm" action="Student/checkuser_login.php" method="post">
      
          <div class="mb-3">
            <i class="fas fa-envelope"></i><lable for="stuLogemail" class="pl-2 font-weight-bold">Email</lable><input type="email" class="form-control" placeholder="Email" name="stuLogemail">
      </div>
      <div class="mb-3"><i class="fas fa-key"></i>
      <label for="stuLogpass" class="pl-2 font-weight-bold"> Password</label>
      <input type="password" class="form-control" name="stuLogpass" >
    </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="stuLoginBtn">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
 <!--  END student login Form code -->
      </div>
      <!-- <div class="modal-footer">
         <button type="button" class="btn btn-primary" id="stuLoginBtn">Login</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div> -->
    </div>
  </div>
</div>