@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bonuses</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Bonus</th>
                                <th scope="col">Received At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userBonusesData as $data)
                                <tr>
                                    <td>{{$data->daily_bonus}}</td>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div>TOTAL: <span class="badge bg-primary">{{$userBonusesTotal}}</span></div>

                        <div>NEXT BONUS TIME: <span class="badge bg-primary">{{$userNextBonusTime}}</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
