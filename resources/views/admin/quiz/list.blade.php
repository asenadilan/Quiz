<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route("quizzes.create")}}" class="btn btn-sm btn-primary"> Quiz oluştur</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş tarihi</th>
                    <th scope="col">İşlemler</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)

                    <tr>

                        <td>{{$quiz->title}}</td>
                        <td>{{$quiz->status}}</td>
                        <td>{{$quiz->finished_at}}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary">+</i></a>
                            <a href="#" class="btn btn-sm btn-danger">x</i></a>
                        </td>
                      </tr>

                    @endforeach
                </tbody>
              </table>
              {{$quizzes->links()}}
            </div>
    </div>

</x-app-layout>
