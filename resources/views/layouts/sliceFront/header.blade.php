@inject('header', 'App\Http\Controllers\WebController') <div class="menu-hover"> <div class="btn-menu"> <span></span> </div><!-- //mobile menu button --> </div> <div class="header-inner-pages"> <div class="top"> <div class="container"> <div class="row"> <div class="col-md-12"> <nav class="navbar menu-top"> <ul class="menu"> @foreach($header->navbar_top() as $navbar) <?php $child = $header->search($navbar->id); ?> <li> <a href="{{$navbar->link}}">{{$navbar->text}} </a> @if(!$child->isEmpty()) <ul class="submenu"> @foreach($child as $chill) <li><a href="{{$chill->link}}">{{$chill->text}}</a></li> @endforeach </ul> @endif </li> @endforeach </ul><!-- /.menu --> </nav><!-- /.mainnav --> <a class="navbar-right search-toggle show-search" href="#"> <i class="fa fa-search"></i> </a> <div class="submenu top-search"> <form class="search-form" action="{{ url('/cari') }}" method="POST"> <input type="hidden" name="_token" value="{{ csrf_token() }}"> <div class="input-group"> <input type="search" class="search-field" placeholder="Tulis yang anda cari.." name="keyword" required=""> <span class="input-group-btn"> <button type="submit"><i class="fa fa-search fa-4x"></i></button> </span> </div> </form> </div> <div class="navbar-right topnav-sidebar"> <ul class="textwidget"> <li> <a href="{{$header->tampilans()->facebook}}"><i class="fa fa-facebook"></i></a> </li> <li> <a href="{{$header->tampilans()->instagram}}"><i class="fa fa-instagram"></i></a> </li> <li> <a href="{{$header->tampilans()->twitter}}"><i class="fa fa-twitter"></i></a> </li> </ul> </div> </div><!-- col-md-12 --> </div><!-- row --> </div><!-- container --> </div><!-- Top --> </div><!-- header-inner-pages --> <!-- Header --> <header id="header" class="header"> <div class="header-wrap"> <div class="container"> <div class="header-wrap clearfix"> <div id="logo" class="logo"> <a href="/" rel="home"> <img alt="logo" src="{{$header->tampilans()->logo}}"> </a> </div><!-- /.logo --> <div class="nav-wrap"> <nav id="mainnav" class="mainnav"> <ul class="menu"> @foreach($header->navbar() as $navbar) <?php $child = $header->search($navbar->id); ?> <li> <a href="{{$navbar->link}}">{{$navbar->text}}<span class="menu-description">Ikip Pontianak</span> </a> @if(!$child->isEmpty()) <ul class="submenu"> @foreach($child as $chill) <li><a href="{{$chill->link}}">{{$chill->text}}</a></li> @endforeach </ul> @endif </li> @endforeach </ul><!-- /.menu --> </nav><!-- /.mainnav --> </div><!-- /.nav-wrap --> </div><!-- /.header-wrap --> </div><!-- /.container--> </div><!-- /.header-wrap--> </header><!-- /.header -->