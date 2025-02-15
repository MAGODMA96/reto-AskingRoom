<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\movies;

class MovieController extends Controller
{
    public function index(){
       $movies = movies::get();

       return $movies;
    }
    public function show($id){
        $movie = movies::find($id);

        return $movie;
    }

    public function sync(Request $request){
        $term = $request->term;
        $year = $request->year;
        $url = "http://www.omdbapi.com/?apikey=a69b9960&s=".$term."&y=".$year."&type=movie";
        $dato[] = json_decode(file_get_contents($url));
        $page = ceil($dato["0"]->totalResults / 10);
        $g = 0;
        for($i=1;$i <= $page; $i++){
            $m[] = json_decode(file_get_contents($url."&page=$i"));
            foreach($m["0"]->Search as $v){
                $con = movies::where('title', '=', $v->Title)->first();
                $img_validate = @get_headers($v->Poster);
                if(!$img_validate || $img_validate[0] == 'HTTP/1.1 404 Not Found') {
                    $poster = "https://claroplay.com/images/carousel/noimage_poster.png";
                }
                else {
                    $poster = $v->Poster;
                }
                if(!isset($con)){
                    $s = new movies();
                    $s->title  = $v->Title;
                    $s->year   = $v->Year;
                    $s->imdbid = $v->imdbID;
                    $s->type   = $v->Type;
                    $s->poster = $poster;
                    $s->save();
                    $g++;
                }
            }
        $m = [];
        }

        return  $g . " movies were saved ";

    }
}
