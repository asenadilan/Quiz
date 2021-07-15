<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
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
                                    @case("publish") Aktif  @break
                                    @case("passive") Pasif  @break
                                    @case("draft") Taslak @break

                                @endswitch
                            </td>
                            <td>{{ $quiz->questions_count }}</td>
                            <td>
                                <span title="{{$quiz->finished_at}}">
                                    {{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() :"-"}}
                                    </span></td>
                            <td>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}"
                                    class="btn btn-sm btn-primary">edit</i></a>
                                <a href="{{ route('questions.index', $quiz->id) }}"
                                    class="btn btn-sm btn-warning">+</i></a>
                                <a href="{{ route('quizzes.destroy', $quiz->id) }}"
                                    class="btn btn-sm btn-danger">x</i></a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
            {{ $quizzes->links() }}
        </div>
    </div>

</x-app-layout>
