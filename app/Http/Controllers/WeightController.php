<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeightRequest;
use App\Http\Requests\TargetRequest;
use App\Models\Log;
use App\Models\Target;

class WeightController extends Controller
{
    /**
     * 体重一覧を表示
     */
    public function index()
    {
        $target = Target::where('user_id', auth()->id())->latest()->first();
        $latest_weight = Log::latest()->first();
        $weight_difference = $latest_weight->weight - $target->weight_target;

        $logs = Log::simplePaginate(8)->where('user_id', auth()->id())->sortByDesc('created_at');

        return view('weight_logs.index', compact('logs', 'target', 'weight_difference', 'latest_weight'));
    }

    public function search(Request $request)
    {
        $target = Target::latest()->first();
        $latest_weight = Log::latest()->first();
        $weight_difference = $latest_weight->weight - $target->weight_target;

        $logs = Log::simplePaginate(8)->sortByDesc('created_at')->where('created_at', '>=', $request->firstdate)->where('created_at', '<=', $request->lastdate);

        return view('weight_logs.index', compact('logs', 'target', 'weight_difference', 'latest_weight'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('weight_logs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WeightRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        Log::create($validated);

        return redirect()->route('weight.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // 他のユーザーのタスクにはアクセスできない
        /*if ($id !== auth()->id()) {
            abort(403);
        }*/

        $log = Log::findOrFail($id);
        return view('weight_logs.show', compact('log'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WeightRequest $request, $id)
    {
        // 他のユーザーのタスクにはアクセスできない
        /*if ($id !== auth()->id()) {
            abort(403);
        }*/

        $log->update($request->validated());

        return redirect()->route('weight.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // 他のユーザーのタスクにはアクセスできない
        /*if ($id !== auth()->id()) {
            abort(403);
        }*/

        $log = Log::findOrFail($id)->delete();
        return redirect()->route('weight.index');
    }

    public function goal()
    {
        return view('weight_logs.change');
    }

    public function change(TargetRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();    

        Target::create($validated);

        return redirect()->route('weight.index');
    }
}
