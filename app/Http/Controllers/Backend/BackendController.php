<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\model\Admin;
use App\model\auther;
use App\model\Book;
use App\model\BookAuthor;
use App\model\BookCategory;
use App\model\BookStudent;
use App\model\category;
use App\model\history;
use App\model\IssueBook;
use App\model\student;
use Illuminate\Http\Request;
use function PhpParser\filesInDir;
use Symfony\Component\CssSelector\Tests\Parser\ReaderTest;

class BackendController extends Controller
{
    private $_view = 'backend.pages';

    function index()
    {
        $data['BookItem'] = Book::all();
        $data['CategoryItem'] = category::all();
        $data['AuthorItem'] = auther::all();
        $data['IssueItem'] = IssueBook::all();
        $data['StudentItem'] = student::all();
        $data['AdminItem'] = Admin::all();
        $data['history']=history::all();

        return view($this->_view . '.dashboard', $data);
    }

    function view()
    {
        return view('backend.master');
    }

    function addBook()
    {
        $data['item'] = category::all();
        $item['data'] = auther::all();
        return view($this->_view . '.addBook', $data, $item);
    }

    function addCategory()
    {
        return view($this->_view . '.addCategory');
    }

    function addAuther()
    {
        return view($this->_view . '.addAuther');
    }


    function issueBook()
    {
        return view($this->_view . '.issueBook');
    }


    function issueBookCheck(Request $request)
    {

        $bookId = (int)$request->book_id;
        $studentId = (int)$request->student_id;

        if ($bookIds = Book::find($bookId)) {
            if ($studentIds = student::find($studentId)) {
                $check = IssueBook::where(['student_id' => $studentId])->get() ?? [];
                if (isset($check[0])) {
                    return redirect()->back()->with('fail', 'Book not returned');
                }
                $data = [
                    'date' => $request->date,
                    'book_id' => $request->book_id,
                    'student_id' => $request->student_id

                ];
                if ($bookIds->no_of_books === 0) {
                    return redirect()->back()->with('fail', 'no Books in stock');
                }
                $bookIds->no_of_books--;
                $bookIds->save();


                if (IssueBook::create($data)) {

                    return redirect()->back()->with('success', 'Book Issued');
                }


            }
            return redirect()->back()->with('fail', 'Invalid Student ID');

        }
        return redirect()->back()->with('fail', 'Invalid Book ID');

    }

    function insertBook(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'detail' => 'required',
            'no_of_books' => 'required',
        ]);

        $data = [
            'title' => $validated['title'],
            'detail' => $validated['detail'],
            'no_of_books' => $validated['no_of_books'],
        ];
        $categories = $request->categories;
        if ($book = Book::create($data)) {
            $bookId = $book->id;
            $count = 0;
            foreach ($categories as $category) {
                $item = [
                    'categories_id' => $category,
                    'books_id' => $bookId
                ];
                $count++;
                BookCategory::create($item);

            }

            $autherItem = [
                'book_id' => $bookId,
                'auther_id' => $request->authers
            ];
            BookAuthor::create($autherItem);

            return redirect()->back()->with('success', 'Book Added Successfully of ' . $count . ' category');
        }
        return redirect()->back()->with('fail', 'fail');

    }

    function insertAuther(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|unique:authers,name',
            'status' => 'required'
        ]);

        $data = [
            'name' => $validation['name'],
            'status' => $validation['status']
        ];
        if (auther::create($data)) {
            return redirect()->back()->with('success', 'Inserted New Auther');
        }
        return redirect()->back()->with('fail', 'Failed');

    }

    function insertCategory(Request $request)
    {


        $validated = $request->validate([
            'title' => 'required|min:3|unique:categories,title',
            'status' => 'required'
        ]);
        $data = [
            'title' => $validated['title'],
            'status' => $validated['status']
        ];
        if (category::create($data)) {
            return redirect()->back()->with('success', 'Inserted New category');
        }
        return redirect()->back()->with('fail', 'fail');
    }


    function manageAuther()
    {
        $data['item'] = auther::all();
        return view('backend.pages.manageAuther', $data);
    }

    function manageCategory()
    {
        $data['item'] = category::paginate(5);
        return view('backend.pages.manageCategory', $data);
    }

    function manageBook()
    {
        $data['item'] = Book::paginate(5);
        return view('backend.pages.manageBook', $data);
    }

    function manageIssue()
    {
        $data['item'] = IssueBook::all();
        return view('backend.pages.manageIssue', $data);
    }


//    delete

    function deleteCategory($id)
    {
        category::find($id)->delete();
        return redirect()->back();

    }

//    category status
    function categoryStatus(Request $request)
    {
        $id = (int)$request->id;

        $data = category::find($id);


        if (isset($request->_enable)) {
            $data->status = 1;
        } else {
            $data->status = 0;
        }
        $data->save();
        return redirect()->back();

    }


//    author status
    function autherStatus(Request $request)
    {
        $id = (int)$request->id;
        $auther = auther::find($id);
        if (isset($request->_enable)) {
            $auther->status = 1;
        } else {
            $auther->status = 0;
        }
        $auther->save();
        return redirect()->back();
    }


//      history
    function history(Request $request)
    {
        $data['studentName'] = $request->studentName;
        $data['bookTitle'] = $request->bookTitle;
        $data['createdAt'] = $request->createdAt;
        $data['date'] = $request->date;
        if (history::create($data)) {
            $id = (int)$request->id;
            IssueBook::findorfail($id)->delete();
            return redirect()->back()->with('success', 'Book Returned');
        }
        return redirect()->back()->with('fail', 'failed');
    }

    function historyList()
    {
        $data['item']=history::all();
        return view($this->_view.'.history',$data);
    }


    function checkStudent(Request $request){
        if(empty($request->student_id)){
            return response()->json(['status'=>false]);
        }
        $data=student::find($request->student_id);
        if(empty($data)){
            return response()->json(['status'=>false]);
        }
        return response()->json(['status'=>true,'name'=>$data]);
    }
}
