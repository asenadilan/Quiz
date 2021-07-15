<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('questions.create',$quiz->id) }}" class="btn btn-sm btn-primary"> soru oluştur</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="row">Qestion</th>
                        <th scope="row">Photo</th>
                        <th scope="row">Answer1</th>
                        <th scope="row">Answer2</th>
                        <th scope="row">Answer3</th>
                        <th scope="row">Answer4</th>
                        <th scope="row">Correct_Answer</th>
                        <th scope="row">işlemler</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($quiz->questions  as $question )

                    <tr>
                        <td scope="col">{{$question->question}}</td>
                        <td scope="col">@if ($question->image)
                            <a href="{{asset($question->image)}}" target="_blank" class="btn btn-sm">Görüntüle</a>
                        @endif</td>
                        <td scope="col">{{$question->answer1}}</td>
                        <td scope="col">{{$question->answer2}}</td>
                        <td scope="col">{{$question->answer3}}</td>
                        <td scope="col">{{$question->answer4}}</td>
                        <td scope="col">{{$question->correct_answer}}</td>

                        <td>
                            <a href="{{route("questions.edit",[$quiz->id,$question->id])}}" class="btn btn-sm btn-primary">+</i></a>
                            <a href="{{route("questions.destroy",[$quiz->id,$question->id])}}" class="btn btn-sm btn-danger">x</i></a>
                        </td>
                      </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</x-app-layout>
