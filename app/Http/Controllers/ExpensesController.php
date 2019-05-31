<?php namespace App\Http\Controllers;

use App\Http\Requests\ExpenseFormRequest;
use App\Invoicer\Repositories\Contracts\ExpenseInterface as Expense;

class ExpensesController extends Controller {

    private $expense;

    public function __construct(Expense $expense){
        $this->expense = $expense;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $expenses = $this->expense
            ->where('user_uuid',\Auth::user()->uuid)
            ->get()
        ;
		return view('expenses.index', compact('expenses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('expenses.create');
	}

    /**
     * Store a newly created resource in storage.
     * @param ExpenseFormRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(ExpenseFormRequest $request)
	{
        if($this->expense->create($request->all())){
            flash()->success('
Dépense a été ajoutée');
            return response()->json(array('Succès'=>true, 'msg' => 'Dépense créée'), 201);
        }
        return response()->json(array('échoué'=>false, 'msg' => 'dépense non ajoutée'), 422);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $expense = $this->expense->getById($id);
        return view('expenses.edit', compact('expense'));
	}

    /**
     *  Update the specified resource in storage.
     * @param ExpenseFormRequest $request
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(ExpenseFormRequest $request, $id)
	{
        if($this->expense->updateById($id,$request->all())){
            flash()->success('Dépense  a été mise à jour');
            return response()->json(array('Succès'=>true, 'msg' => 'Dépense mise à jour'), 201);
        }
        return response()->json(array('échoué'=>false, 'msg' => 'Dépense non mise à jour'), 422);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        if($this->expense->deleteById($id))
            flash()->success('Dépense supprimée');
        else
            flash()->error('La suppression des dépenses a échoué');

        return redirect('expenses');
	}

}
