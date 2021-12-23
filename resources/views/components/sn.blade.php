@props(['iteration'])

@php
    $serialNo = $iteration;
    if(request('page')){
        $pageNo = request('page');
        if($pageNo>1){
            $serialNo = ($pageNo*10)-1 + $serialNo;
        }
    }
@endphp

<td>{{ $serialNo }}</td>
