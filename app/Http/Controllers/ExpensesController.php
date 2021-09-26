<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Expense;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DataTables\ExpenseDataTable;

class ExpensesController extends Controller
{
    public function __construct()
    {
        // Apply for all the routes
        //$this->middleware('auth');

        // Apply for certain routes only
        //$this->middleware('auth')->only(['index', 'edit', 'delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExpenseDataTable $dataTable)
    {
        // $expenses = User::find(Auth::id())->expenses()->with(['type', 'departments']);
        //$models = Expense::with(['type', 'departments'])->where('user_id', Auth::id())->orderBy('id')->paginate(10);
        //return view('expenses.index', ["models" => $models, "title" => "Expenses List"]);


        return $dataTable->render('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session()->flash('info', ['body' => 'Please make sure you email the expense file']);
        $model = new Expense();
        return view('expenses.upsert', ["model" => $model])
            ->with("title", "Create Expense")
            ->with("types", Type::all())
            ->with("departments", Department::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate(
            [
                'amount' => 'required|numeric|min:10|max:150',
                'notes' => 'string|max:200',
                'type_id' => 'required',
                'departments' => 'required|array'
            ]
        );

        if ($request->has('id')) {
            $model = Expense::findOrFail($request->id);
        } else {
            $model = new Expense();
        }

        try {
            $model->fill($data);
            $model->user_id = Auth::id();
            $model->save();
            $model->departments()->sync($data['departments']);

            if (!empty($request->file('expense_file'))) {
                $pathToFile = $request->file('expense_file');
                $model->clearMediaCollection('Main');
                $model->addMedia($pathToFile)
                    ->toMediaCollection('Main');
            }

            session()->flash('success', ['body' => 'successfully saved']);
            return redirect()->route('expenses.index');
        } catch (\Exception $ex) {
            session()->flash('error', ['body' => $ex->getMessage()]);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Expense::with('departments')->findOrFail($id);
        //$model->departments()->attach([1, 2]);
        dd($model);
        //
        echo "show" . $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Expense::findOrFail($id);

        //echo "Model user id : " . $model->user_id . ", Loggedin user id : " . Auth::id();

        $this->authorizeOwner($model);

        return view('expenses.upsert', ["model" => $model])
            ->with("title", "Edit Expense")
            ->with("types", Type::all())
            ->with("departments", Department::all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Expense::findOrFail($id);

        $this->authorizeOwner($model);

        try {
            $model->delete();
            session()->flash('success', ['body' => 'successfully deleted']);
        } catch (\Exception $ex) {
            session()->flash('error', ['body' => $ex->getMessage()]);
        }

        return redirect()->route('expenses.index');
    }

    private function authorizeOwner($model)
    {
        if ($model->user_id != Auth::id()) abort(401);
    }
}
