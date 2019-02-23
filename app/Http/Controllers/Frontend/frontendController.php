<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\model\auther;
use App\model\Book;
use App\model\BookAuthor;
use App\model\BookCategory;
use App\model\category;
use App\model\history;
use App\model\IssueBook;
use function GuzzleHttp\Promise\queue;
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
        $data['item'] = category::all();
        return view($this->_view . '.categoryList', $data);
    }


    function categoryBooks(Request $request)
    {
        $id=(int)$request->id;
        $data['categoryOnly']=category::find($id);
        $categoryId=BookCategory::where(['categories_id'=>$id])->first()??[];
        $data['category']=Book::where(['id'=>$categoryId->books_id])->first()??[];
        $autherId=BookAuthor::where(['book_id'=>$data['category']->id])->first()??[];
        $data['auther']=auther::where(['id'=>$autherId->auther_id])->first()??[];
        return view($this->_view.'.categorySearch',$data);

    }


    function overview()
    {
        $data['itemBook'] = Book::all();
        $data['itemCategory'] = category::all();
        $data['itemAuthor'] = auther::all();
        $student = Auth::guard('student')->user();
        $data['itemIssue'] = IssueBook::where(['student_id'=>$student->id])->get()??[];

        $data['history'] = history::where(['studentName' => $student->username])->get() ?? [];

        return view($this->_view . '.overview', $data);
    }

    function authorList()
    {
        $data['item'] = auther::all();
        return view($this->_view . '.authorList', $data);


    }

    function bookList()
    {
        $data['item'] = Book::all();
        return view($this->_view . '.bookList', $data);
    }

}
