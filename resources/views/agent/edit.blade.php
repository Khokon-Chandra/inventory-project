<x-app-layout>
    <h3>Create New Agent:</h3>
    <div class="mb-3">
        <a href="{{ route('agents.index') }}" class="btn btn-dark">Go To List</a>
    </div>
    <x-alert />
    <div class="card ">
        <div class="card-body">
            <form action="{{ route('agents.update',$agent->_key) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="_key" value="{{ Str::random(32) }}">

                <div class="row">
                    <div class="col-md-6">
                        <label for="type">Agent Type</label>
                        <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                            <option value="" disabled selected>Select Agent Type</option>
                            <option {{ $agent->type == 'agent'?'selected':'' }} value="agent">Agent</option>
                            <option {{ $agent->type == 'party'?'selected':'' }} value="party">Party</option>
                        </select>
                        <x-invalid-feedback attribute="type" />
                    </div>
                    <x-input-field :name="__('rate_of_interest')" :label="__('Rate Of Interest')" :data="$agent" type="number" class="col-md-6" />
                </div>

                <div class="row">
                    <x-input-field :name="__('name')" :label="__('Name')" :data="$agent" class="col-md-4" />
                    <x-input-field :name="__('fathers_name')" :label="__('Fathers Name')" :data="$agent" class="col-md-4" />
                    <x-input-field :name="__('mobile')" :label="__('Mobile')" :data="$agent" class="col-md-4" />
                </div>


                <div class="mb-3">
                    <label for="description">Agent Address</label>
                    <textarea name="address" id="description" rows="4" class="form-control @error('address') is-invalid @enderror" >{{ $agent->address }}</textarea>
                    <x-invalid-feedback attribute="address" />
                </div>
                <div class="mb-3 text-right">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>






            </form>
        </div>
    </div>
</x-app-layout>
