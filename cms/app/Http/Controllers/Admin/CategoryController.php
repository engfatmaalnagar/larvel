<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Session;
class CategoryController extends BaseController
{
    public function index(Request $request)
    {
        $q = $request->q;
        $items = Category::whereRaw("deleted = 0");
        if($q){
            $items->whereRaw("(name like ?)", ["%$q%"]);
        }        
        $items =  $items->paginate(5)->appends([
            "q" => $q
        ]);
        return view("admin.category.index", compact("items"));
    }

    public function create()
    {
        return view("admin.category.create");
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        Session::flash("msg","s: تمت عملية الاضافة بنجاح");
        return redirect(route("category.create"));
    }

    public function edit($id)
    {
        $item = Category::find($id);
        if(!$item){
            Session::flash("msg", "e: الرجاء التأكد من الرابط");
            return redirect(route("category.index"));
        }
        return view("admin.category.edit", compact("item", "id"));
    }
    
    public function update(AccountRequest $request, $id)
    {
        /*Account::find($id)->update($request->all());

        Session::flash("msg","s: Account updated successfully");
        return redirect(route("accountrq.index"));*/
    }

    public function destroy($id)
    {
        /*$account = Account::find($id);
        $account->delete();
        Session::flash("msg","w: Account deleted successfully");
        return redirect(route("accountrq.index"));*/
    }
}