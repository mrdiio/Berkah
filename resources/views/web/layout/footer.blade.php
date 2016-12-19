<!-- Start footer -->
<footer id="mu-footer">
  <!-- start footer top -->
  <div class="mu-footer-top">
    <div class="container">
      <div class="mu-footer-top-area">
        <div class="row">
          <div class="col-md-4">
            <div class="mu-footer-widget">
              <div class="col-md-12">
                <h4>Kontak</h4>
                <address class="footer-contact text-justify">
                  <p>{{ $contact->alamat }}</p>
                  <p><a><span class="glyphicon glyphicon-envelope"></span></a> {{ $contact->email }}</p>
                  <p><a><span class="glyphicon glyphicon-phone-alt"></span></a> {{ $contact->phone }} </p>
                  <p><a><span class="glyphicon glyphicon-phone"></span></a> {{ $contact->bbm }} </p>
                </address>

                <div class="footer-social text-center">
                  <a class="facebook" href="{{ $contact->facebook }}" target="_blank"><span class="fa fa-facebook"></span></a>
                  <a class="twitter" href="{{ $contact->twitter }}" target="_blank"><span class="fa fa-twitter"></span></a>
                  <a class="google-plus" href="{{ $contact->gplus }}" target="_blank"><span class="fa fa-google-plus"></span></a>
                  <a class="youtube" href="{{ $contact->youtube }}" target="_blank"><span class="fa fa-youtube"></span></a>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="mu-footer-widget">
              <img src="{{ asset('img/img map.png') }}" alt="Berkah Pontianak" class="img-responsive" />
            </div>
          </div> -->
          <div class="col-md-8">
            <div class="mu-contact-right">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.816261674167!2d109.37450153300594!3d-0.05820420334878288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d59e22e07c4df%3A0x80ce59655e140a06!2sBERKAH+PROPERTI+-+Agen+Kavling+Tanah+Pontianak!5e0!3m2!1sid!2sid!4v1479958950437" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end footer top -->
  <!-- start footer bottom -->
  <div class="mu-footer-bottom">
    <div class="container">
      <div class="mu-footer-bottom-area">
        <p>2016 &copy; All Right Reserved. Developed by <b>Stein</b>.</p>
      </div>
    </div>
  </div>
  <!-- end footer bottom -->
</footer>
<!-- End footer -->
