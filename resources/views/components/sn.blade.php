@props(['iteration'])

@php
    $serialNo = $iteration;
    if(request('page')){
        $pageNo = request('page');
        if($pageNo>2){
            $serialNo = ($pageNo*10) + $serialNo;
        }elseif($pageNo == 2){
            $serialNo = 10+$serialNo;
        }
    }
@endphp

<td>{{ $serialNo }}</td>
