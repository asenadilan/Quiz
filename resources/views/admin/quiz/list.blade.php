<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="GET">
                <div class="col-md-2">
                    <input type="text" value="{{request()->get("title")}}" name="title" placeholder="Quiz Adı" class="form-Control">
                </div>
                <div class="col-md-2">
                    <select name="status"  onchange="this.form.submit()" class="form-Control">
                        <option >Seciniz</option>
                        <option @if(request()->get("status")=="draft") selected  @endif value="draft">Taslak</option>
                        <option @if(request()->get("status")=="passive") selected @endif value="passive">Pasif</option>
                        <option @if(request()->get("status") =="active") selected @endif value="active">Aktif</option>
                    </select>
                </div>
                @if (request()->get("title") || request()->get("status"))
                     <div class="col-md-2">
                    <a href="{{ route('quizzes.index') }}" class="btn btn-sm btn-primary"> Sıfırla</a>
                </div>
                @endif

            </form><br>
            <h5 class="card-title">
                <a href="{{ route('quizzes.create') }}" class="btn btn-sm btn-primary"> Quiz oluştur</a>
            </h5>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Soru sayısı</th>
                        <th scope="col">Bitiş tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)

                        <tr>

                            <td>{{ $quiz->title }}</td>
                            <td>
                                @switch($quiz->status)
                                    @case("publish") Aktif @break
                                    @case("passive") Pasif @break
                                    @case("draft") Taslak @break

                                @endswitch
                            </td>
                            <td>{{ $quiz->questions_count }}</td>
                            <td>
                                <span title="{{ $quiz->finished_at }}">
                                    {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}"
                                    class="btn btn-sm btn-primary">edit</i></a>
                                <a href="{{ route('questions.index', $quiz->id) }}"
                                    class="btn btn-sm btn-warning">+</i></a>
                                <a href="{{ route('quizzes.destroy', $quiz->id) }}"
                                    class="btn btn-sm btn-danger">x</i></a>
                                    <a href="{{ route('quizzes.info', $quiz->id) }}"
                                    class="btn btn-sm btn-danger">i</i></a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            {{ $quizzes->withQueryString()->links() }}
        </div>
    </div>

</x-app-layout>
