@inject('header', 'App\Http\Controllers\WebController') <footer class="footer full-color"> <section id="bottom"> <div class="section-inner"> <div class="container"> <div class="row normal-sidebar"> <div class=" col-md-5 border  widget widget-text"> <div class=" widget-inner"> <h2 class="widget-title maincolor1"> <img alt="logo" src="{{$header->tampilans()->logo}}"> </h2> <div class="textwidget" style="text-align: justify;"> {{$header->tampilans()->kesbangpol}} </div> </div> </div> <div class=" col-md-4  widget widget-recent-entries"> <div class=" widget-inner"> <h2 class="widget-title maincolor1">Fakultas Kami</h2> <ul> @foreach($header->navbar_footer() as $navbar) <li> <a href="{{$navbar->link}}">{{$navbar->text}}</a> </li> @endforeach </ul> </div> </div> <div class=" col-md-3  widget widget-nav-menu"> <div class=" widget-inner"> <h2 class="widget-title maincolor1">Hubungi Kami</h2> <div class="menu-others-container"> <ul id="menu-others" class="menu"> <li> <a href="#">Alamat : {{$header->tampilans()->alamat}}</a> </li> <li> <a href="tel:{{$header->tampilans()->no_hp}}">Telp : {{$header->tampilans()->no_hp}}</a> </li> <li> <a href="mailto:{{$header->tampilans()->email}}">Email : {{$header->tampilans()->email}}</a> </li> <li> <a href="#">Jam Pelayanan : {{$header->tampilans()->jam_buka}} - {{$header->tampilans()->jam_tutup}}</a> </li> </ul> </div> </div> </div> </div> </div> </div> </section> <div id="bottom-nav"> <div class="container"> <div class="link-center"> <div class="line-under"></div> <a class="flat-button go-top-v1 style1" href="#top"> <span class="fa fa-chevron-circle-up"></span> KEMBALI KE ATAS</a> </div> <div class="row footer-content"> <div class="copyright col-md-6"> © {{date('Y')}} <a href="http://Itkonsultan.id">Itkonsultan.id</a> - {{$header->tampilans()->site_title}} </div> <nav class="col-md-6 footer-social"> <ul class="social-list"> <li> <a href="{{$header->tampilans()->facebook}}" class="btn btn-default social-icon"> <i class="fa fa-facebook"></i> </a> </li> <li> <a href="{{$header->tampilans()->instagram}}" class="btn btn-default social-icon"> <i class="fa fa-instagram"></i> </a> </li> <li> <a href="{{$header->tampilans()->twitter}}" class="btn btn-default social-icon"> <i class="fa fa-twitter"></i> </a> </li> </ul> </nav> </div><!--/row--> </div><!--/container--> </div> </footer>