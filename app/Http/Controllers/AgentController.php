<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgentRequest;
use App\Http\Requests\UpdateAgentRequest;
use App\Models\Agent\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agent.index', [
            'agents' => Agent::latest()->paginate(10),
            'agents' => Agent::latest()->filter(request(['search']))->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgentRequest  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreAgentRequest $request)
    {

        try {
            $exception = DB::transaction(function () use ($request) {
                Agent::create($request->validated());
            });
            if ($exception === false) {
                throw new \Exception('Some thing went wrong, Please try again!!');
            }
            return redirect()->route('agents.index')->with('success', 'Successfully Agent created');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agent\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agent\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit($_key)
    {
        return view('agent.edit', [
            'agent' => Agent::where('_key', $_key)->firstOrFail(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgentRequest  $request
     * @param  \App\Models\Agent\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgentRequest $request, $_key)
    {
        try {
            Agent::where('_key', $_key)->update($request->validated());
            return redirect()->route('agents.index')->with('success', 'Successfully Updated an item');
        } catch (NotFoundHttpException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agent\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }

    public function deleteMultiple()
    {
        return true;
    }
}
