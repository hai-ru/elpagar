@extends('layouts.single') <?php  $tanggal=date("d", StrtoTime($posts->updated_at)); $bulan=date("F", StrtoTime($posts->updated_at)); $tahun=date("Y", StrtoTime($posts->updated_at)); ?> @push('css') <link rel="shortcut icon" href="{{$tampilans->favicon}}"> <style type="text/css"> .komen{height: 150px; } </style> @endpush @section('title') @if($posts->SEOtitle==null) {{$tampilans->site_title}} @else {{$posts->SEOtitle}} @endif @stop @section('description') @if($posts->SEOdesc==null) {{$tampilans->site_desc}} @else {{$posts->SEOdesc}} @endif @stop @section('keywords') {{$tampilans->site_keyword}} @stop @section('penulis') {{$posts->name}} @stop @section('gambar') <a href="{{Request::url()}}"> <img src="{{$posts->foto}}" alt="{{$posts->judul}}"> </a> @stop @section('breadcrumbs') @if(strpos(Request::url(), 'berita') !== false) <li class="home"><a href="\kategori\1\Berita"> \ Berita</a></li> @elseif(strpos(Request::url(), 'agenda') !== false) <li class="home"><a href="\kategori\2\Agenda"> \ Agenda</a></li> @endif <li class="home"><a href="{{Request::url()}}"> \ {{$posts->judul}}</a></li> @stop @section('judul') {{$posts->judul}} @stop @section('isi') {!!$posts->deskripsi!!} @stop @section('author') <div class="about-author" id="author"> <div class="row"> <div class="col-md-2"> <div class="author-avatar"> @if($posts->avatar!=null) <img src="{{$posts->avatar}}" alt="image"> @else <img class="avatar" alt="" src="/images/member/2.png"> @endif </div> </div> <div class="col-md-10"> <div class="author-info"> <h4>{{$posts->name}}</h4> <p>{!!$posts->desc!!}</p> </div> </div> </div> <div class="clearfix"></div> </div> @stop @section('ket') <div class="content-pad"> <div class="item-content"> <div class="item-meta blog-item-meta"> <span>By {{$posts->name}}<span class="sep">|</span> </span> <span>{{$bulan}} {{$tanggal}}, {{$tahun}} <span class="sep">|</span> </span> <span> @foreach($posts->postcategory as $postcat) <a href="/kategori/{{$postcat->category->id}}/{{$postcat->category->nama}}">{{$postcat->category->nama}} <span class="dot">.</span></a> @endforeach </span> <span><a href="#author"> {{ ($posts->comment==null) ? 0 : $posts->comment->count()}} KOMENTAR </a><span class="sep">|</span></span> </div> </div> </div> @stop @section('comment') @inject('childs', 'App\Http\Controllers\WebController') <div class="comments-area"> <div class="comment-form-tm"> @foreach($comments as $comment) <div class="author-current"> @if($comment->foto!=null) <img class="avatar" alt="" src="{{$comment->foto}}"> @else <img class="avatar" alt="" src="/images/member/2.png"> @endif </div> <fieldset class="style message"> <textarea id="comment-message" name="comment" readonly class="komen">Nama : {{$comment->nama}} Tanggal : {{date("F", StrtoTime($comment->created_at)).' '.date("d", StrtoTime($comment->created_at)).' , '. date("Y", StrtoTime($comment->created_at)).' - '. date("H:i", StrtoTime($comment->created_at))}} Komentar : {{$comment->deskripsi}} </textarea> </fieldset> @foreach($childs->ParentComment($comment->id) as $child) <div class="author-current"> @if($child->foto!=null) <img class="avatar" alt="" src="{{$child->foto}}"> @else <img class="avatar" alt="" src="/img/no-user-image.gif"> @endif </div> <fieldset class="style message"> <textarea id="comment-message" name="comment" readonly class="komen">Nama : {{$child->nama}} Tanggal : {{date("F", StrtoTime($child->created_at)).' '.date("d", StrtoTime($child->created_at)).' , '. date("Y", StrtoTime($child->created_at)).' - '. date("H:i", StrtoTime($child->created_at))}} Komentar : {{$child->deskripsi}} </textarea> </fieldset> @endforeach @endforeach </div> <div class="comment-form-tm"> <div class="comment-respond"> <div class="author-current"> <img class="avatar" alt="" src="/images/member/2.png"> </div> <form action="#" id="commentform" class="comment-form" onsubmit="return tambahkomen(this, 0)"> <input type="hidden" name="id_posts" value="{{$posts->id}}"> {{csrf_field()}} <fieldset class="style name-container"> <input type="text" id="name" placeholder="Nama Lengkap *" class="tb-my-input" name="nama" tabindex="1" value="" size="32" aria-required="true"> </fieldset> <fieldset class="style email-container"> <input type="email" id="email" placeholder="Email *" class="tb-my-input" name="email" tabindex="2" value="" size="32" aria-required="true"> </fieldset> <fieldset class="style website-container"> <input type="text" id="website" placeholder="Judul *" class="tb-my-input" name="judul" tabindex="2" value="" size="32" aria-required="true"> </fieldset> <fieldset class="style message"> <textarea id="comment-message" name="deskripsi" rows="8" tabindex="4"></textarea> </fieldset> <div class="submit-wrap"> <button class="flat-button button-style">SUBMIT</button> </div> </form> <div class="row"> <div class="col-md-12"> <div id="berhasil" class="alert alert-success fade in" style="margin-top: 10px; display: none;"> <button data-dismiss="alert" class="close close-sm" type="button"> <i class="fa fa-times"></i> </button> <strong>Komentar anda berhasil di tambahkan !</strong> </div> <div id="gagal" class="alert alert-danger fade in" style="margin-top: 10px; display: none;"> <button data-dismiss="alert" class="close close-sm" type="button"> <i class="fa fa-times"></i> </button> <strong>Periksa Kembali Komentar Anda !</strong> </div> </div> </div> </div> </div> </div> @stop @push('js') <script type="text/javascript"> function tambahkomen(data, id) {console.log($(data).serialize()); $.ajax({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }, type:"POST", url:'/komen', data:$(data).serialize(), dataType: 'json', success: function(hasil){console.log("sukses"); $('#berhasil').show('slow'); window.setTimeout(location.reload(), 5000); return false; }, error: function(e) {console.log(e); $('#gagal').show('slow'); return false; } }); return false; } </script> @endpush