<x-app-layout>
    <h3>Agent List:</h3>
    <x-alert />
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <form class="row" method="GET" action="{{ route('agents.index') }}">
                    <div class="col-8"><input type="search"
                        name="search"
                        value="{{ request('search') }}"
                        class="form-control"
                        placeholder="search here"></div>
                    <div class="col-4 px-0"><input type="submit" class="btn btn-dark" value="search"></div>
                </form>
                <div class="d-flex">
                    <a class="btn btn-primary mx-1" href="{{ route('agents.create') }}">Add New</a>
                    <button id="delete" class="btn btn-danger mx-1"
                        value="{{ route('agents.deleteMultiple') }}">Delete</button>
                </div>

            </div>
            <table class="table table-sm table-striped">
                <thead>
                    <tr class="bg-dark text-white">
                        <th width="5%">SN</th>
                        <th width="10%">Name</th>
                        <th width="10%">Mobile</th>
                        <th width="20%">Rate Of Interest</th>
                        <th width="30%">Address</th>
                        <th width="0%" class="text-center">Action </th>
                        <th width="5%"><input id="selectAll" type="checkbox" value="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agents as $agent)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $agent->name }}</td>
                            <td>{{ $agent->mobile }}</td>
                            <td>{{ $agent->rate_of_interest }}</td>
                            <td>{{ $agent->address }}</td>
                            <td class="text-center"><a class="btn btn-primary btn-sm" href="{{ route('agents.edit',$agent->_key) }}">Edit</a></td>
                            <td> <input type="checkbox" value="{{ $agent->_key }}"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $agents->links() }}

        </div>
    </div>
</x-app-layout>
