<div class="offcanvas offcanvas-collapse" id="vendor-sidebar">
   <div class="offcanvas-header align-items-center shadow-sm">
      <h2 class="h5 mb-0">Vendor</h2>
      <button class="btn-close ms-auto" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body">
      <!-- User avatar-->
      <div class="vendor-img d-lg-none d-block mb-4">
      	<img src="{{ $user->avatar??'/upload/images/general/author.png' }}" width="140" alt="Avatar">
      </div>
      <!-- User meta-->
      <div class="pb-2">
         <h3 class="mb-2 fs-lg fw-normal text-body">{{ $user->fullname }}</h3>
         <div class="d-flex align-items-center flex-wrap text-nowrap fs-sm">
            <div class="mb-2 me-sm-3 me-2 text-muted"><span class='fw-medium text-body'>766</span> theo dõi</div>
            <div class="mb-2 me-sm-3 me-2 ps-sm-3 ps-2 border-start text-muted"><span class='fw-medium text-body'>2K</span> đang theo dõi</div>
         </div>
         <!-- Follow-->
         <div class="d-flex flex-lg-row flex-column">
            <button class="btn btn-accent btn-sm">Theo dõi</button>
         </div>
      </div>
   </div>
   <div class="offcanvas-footer d-flex flex-column align-items-start p-lg-0">
      <!-- User bio-->
      <div class="mb-4 pb-2 fs-sm">
         <h6 class="mb-2 fs-md">Giới thiệu</h6>
         <div class="mb-0">{!! htmlspecialchars_decode($user->about_me) !!}</p>
      </div>
      <!-- Socials-->
      <div class="mt-n2"><a class="btn-social bs-twitter me-2 mt-2" href="#"><i class="ci-twitter"></i></a><a class="btn-social bs-facebook me-2 mt-2" href="#"><i class="ci-facebook"></i></a><a class="btn-social bs-instagram me-2 mt-2" href="#"><i class="ci-instagram"></i></a><a class="btn-social bs-youtube me-2 mt-2" href="#"><i class="ci-youtube"></i></a></div>
   </div>
</div>