<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\model\auther;
use App\model\Book;
use App\model\category;
use App\model\IssueBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class frontendController extends Controller
{
    private $_view = 'Frontend.pages';

    function index()
    {
        return view($this->_view . '.view');
    }

    function categoryList()
    {
        $data['item']=category::all();
        return view($this->_view . '.categoryList',$data);
    }


    function categoryBooks(Request $request){

    }






    function overview()
    {
        $data['itemBook'] = Book::all();
        $data['itemCategory'] = category::all();
        $data['itemAuthor'] = auther::all();
        $data['itemIssue'] = IssueBook::all();


        return view($this->_view . '.overview', $data);
    }

    function authorList()
    {
        $data['item']=auther::all();
        return view($this->_view . '.authorList',$data);


    }

    function bookList()
    {
        $data['item']=Book::all();
        return view($this->_view . '.bookList',$data);
    }

}
