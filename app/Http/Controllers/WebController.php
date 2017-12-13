<<<<<<< HEAD
<?php 
namespace App\Http\Controllers; use Illuminate\Http\Request; use Exception; use App\tampilans; use App\Gallery; use App\Slider; use App\posts; use App\pages; use App\categorys; use App\navbars; use App\sidebars; use App\comments; /* use App\pengikuts; */ use App\postcategorys; use App\organisasis; use App\homepage; use View; use URL; class WebController extends Controller {

	

	public function index(){
		$tampilans = tampilans::find(1); $sliders = Slider::all(); 
		$posts = posts::with('postcategory.category')->where('status',1)->orderBy('updated_at', 'desc')->take(4)->get();
		$berita = [];
		$agenda = [];

		foreach ($posts as $i => $value) {
		 	foreach ($value->postcategory as $j => $value) {
		 		if ($value->category->nama=='Berita') {$berita[] = $posts[$i]; }
		 	}
		}

		foreach ($posts as $i => $value) {
		 	foreach ($value->postcategory as $j => $value) {
		 		if ($value->category->nama=='Agenda') {
		 			$agenda[] = $posts[$i]; 
		 		} 
		 	} 
		}
		$sidebar = homepage::where('lokasi',0)->get();
		$footer = homepage::where('lokasi',1)->get();
		$data['tampilans'] = $tampilans;
		$data['sliders'] = $sliders;
		$data['beritas'] = $berita;
		$data['agendas'] = $agenda;
		$data['sidebars'] = $sidebar;
		$data['footers'] = $footer;
		// DD($data);
		return view('homes',['tampilans'=>$tampilans,'sliders'=>$sliders,'beritas'=>$berita,'agendas'=>$agenda,'sidebars'=>$sidebar,'footers'=>$footer]);
	} 

	public function posts($id){$posts = posts::with('postcategory.category') ->join('users', 'posts.author','=','users.id') ->where('posts.id',$id) ->select('posts.*','users.foto as avatar', 'users.name', 'users.deskripsi as desc') ->first(); $tampilans = tampilans::find(1); $comments = comments::where(['id_posts'=>$id,'parent'=>null])->orderby('updated_at','desc')->get(); return view('post',['posts'=>$posts,'tampilans'=>$tampilans,'comments'=>$comments]); } 

	

	public function ParentComment($id) {$comments = comments::where('parent', $id)->get(); return $comments; } 



	public function pages($id){$pages = pages::with('user')->where('id',$id)->first(); $tampilans = tampilans::find(1); $comments = comments::where(['id_pages'=>$id,'parent'=>null])->orderby('updated_at','desc')->get(); return view('pages',['pages'=>$pages,'tampilans'=>$tampilans,'comments'=>$comments]); } 

	public function categorys($id){$categorys = categorys::with('postcategorys.post.postcategory.category') ->where('categorys.id',$id)->first(); $postcategorys = postcategorys::with('post')->where('id_categorys',$id)->paginate(5); $tampilans = tampilans::find(1); return view('categorys',['categorys'=>$categorys,'tampilans'=>$tampilans,'postcategorys'=>$postcategorys]); } 

	public function CariKategori($id) {$postcategorys = postcategorys::with('category')->where('id_posts',$id)->get(); return $postcategorys; } 

	public function navbar() {$navbars = navbars::with('navbar')->where(['parent'=>null,'tipe'=>0])->get(); return $navbars; } 

	public function navbar_top() {$navbars = navbars::with('navbar')->where(['parent'=>null,'tipe'=>1])->get(); return $navbars; } 

	public function navbar_footer() {$navbars = navbars::with('navbar')->where(['parent'=>null,'tipe'=>2])->get(); return $navbars; } 

	public function search($id) {$parent = navbars::where('parent',$id)->get(); return $parent; } 

	public function tampilans() {$tampilans = tampilans::find(1); return $tampilans; } 

	public function DataKategori() {$kategori = categorys::all(); return $kategori; } 

	public function ArtikelTerbaru() {$posts = posts::with('postcategory.category')->where('status',1)->orderBy('updated_at', 'desc')->take(5)->get(); $berita = ''; foreach ($posts as $i => $value) {foreach ($value->postcategory as $j => $value) {if ($value->category->nama=='Berita') {$berita[] = $posts[$i]; } } } return $berita; } 

	public function AgendaTerbaru() {$posts = posts::with('postcategory.category')->where('status',1)->orderBy('updated_at', 'desc')->take(4)->get(); $agenda = ''; foreach ($posts as $i => $value) {foreach ($value->postcategory as $j => $value) {if ($value->category->nama=='Agenda') {$agenda[] = $posts[$i]; } } } return $agenda; } 

	public function CariArtikel(Request $request) {$keyword = $request->keyword; $posts = posts::with('postcategory.category')->where('judul','like', '%'.$keyword.'%')->orWhere('deskripsi','like', '%'.$keyword.'%')->orderBy('created_at', 'desc')->paginate(5); $tampilans = tampilans::find(1); return view('pencarian',['posts'=>$posts,'tampilans'=>$tampilans, 'keyword'=>$keyword]); } 

	public function DataSidebar() {$sidebars = sidebars::all(); $side = array(); foreach ($sidebars as $sidebar) {if ($sidebar->html=="about") {$data = View::make('layouts.sidebar.about'); array_push($side, $data); } else if ($sidebar->html=="recentpost") {$data = View::make('layouts.sidebar.recentpost'); array_push($side, $data); } else if ($sidebar->html=="recentagenda") {$data = View::make('layouts.sidebar.recentagenda'); array_push($side, $data); } else if ($sidebar->html=="category") {$data = View::make('layouts.sidebar.category'); array_push($side, $data); } else if ($sidebar->html=="search") {$data = View::make('layouts.sidebar.search'); array_push($side, $data); } else {array_push($side, $sidebar->html); } } return $side; } 

	public function TambahKomen(Request $request) {try{$comments = new comments; if (isset($request->id_posts)) {$comments->id_posts = $request->id_posts; } if (isset($request->id_pages)) {$comments->id_pages = $request->id_pages; } $comments->nama = $request->nama; $comments->email = $request->email; if ($request->judul!=null) {$comments->judul = $request->judul; } $comments->deskripsi = $request->deskripsi; $comments->read = 0; if ($request->parent!=null) {$comments->parent = $request->parent; } $comments->save(); return 0; } catch(Exception $e){return $e; } } 

	public function dataKomen() {try{$comments = comments::all(); return $comments; } catch(Exception $e){return $e; } } /* 

	public function tambahPengikut(Request $request) {try{$pengikuts = new pengikuts; $pengikuts->email = $request->email; $pengikuts->save(); $link = URL::previous(); return redirect($link); } catch(Exception $e){return $e; } }*/ 

	public function SearchKomen($id) {$comments = comments::where('id_posts',$id)->get(); return $comments; } 

	public function dataOrganisasi() {$organisasis = organisasis::all(); return $organisasis; } 

	public function organisasi() {$organisasis = organisasis::all(); $tampilans = tampilans::find(1); return view('organisasis',['organisasis'=>$organisasis,'tampilans'=>$tampilans]); } }