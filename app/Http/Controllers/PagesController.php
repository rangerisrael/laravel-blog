<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //return to the view function


    public function index(){

$title="MY FIRST APPLICATION TEST";
       return view('page.index', compact('title'));
    }


    public function about(){
        $test=0;
        return view('page.about')->with('test',$test);
    }

    public function contact(){

        $contact= array(
            'title' => 'CONTACT US',
            'name' => 'ISRAEL ALISOSO',
            'position' => ['WEB DEVELOPER','NETWORk ADMINISTRATOR','SYSTEM ANALYST'],
            'number' =>1
            
        
        );        

        return view('page.contact')->with($contact);
    }
}
